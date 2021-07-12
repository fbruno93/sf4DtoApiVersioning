<?php

namespace App\Util;

use App\Helper\StringHelper;
use LogicException;
use Nette\PhpGenerator\Attribute;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\Method;
use Nette\PhpGenerator\Parameter;
use Nette\PhpGenerator\PhpFile;
use Nette\PhpGenerator\PhpNamespace;
use Nette\PhpGenerator\Property;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;

class PhpClassBuilder
{
    private ?PhpNamespace $namespace;
    private ?ClassType $class;

    /** @var Method[]  */
    private array $methods = [];

    public function createClass(string $name, string $namespace)
    {
        $this->namespace = (new PhpNamespace($namespace))
            ->addUse(Request::class);

        $this->class = new ClassType(StringHelper::upperCamelCase($name));
        $this->class->addProperty('request')
            ->setPrivate()
            ->setType(Request::class);

        $requestParamConstruct = (new Parameter('request'))
            ->setType(Request::class);

        $this->methods[] = (new Method('__construct'))
            ->setVisibility(ClassType::VISIBILITY_PUBLIC)
            ->setParameters([$requestParamConstruct])
            ->setBody('$this->request = $request;');
        ;
    }

    public function addGetterMethod($name, $returnType): self
    {
        if (null === $this->class) {
            throw new LogicException('Create class before adding property');
        }

        $name = StringHelper::toCamelCase($name);

        $getterNameMethod = 'get'. StringHelper::upperCamelCase($name);
        $this->methods[] = (new Method($getterNameMethod))
            ->setReturnType($returnType)
            ->setBody('return $this->request->get(\''.$name.'\');')
        ;

        return $this;
    }

    public function build()
    {
        $this->class->setMethods($this->methods);
        $this->namespace->add($this->class);
    }

    public function write()
    {
        $phpFile = (new PhpFile());
        $phpFile->addNamespace($this->namespace);
        $content = (new MyPrinter())->printFile($phpFile);

        $filepath = $this->namespace->getName();

        $filepath = explode('\\', $filepath);
        $filename = array_pop($filepath).'.php';

        $filepath = "./var/cache/$filename";

        $filesystem = new Filesystem();
        $filesystem->touch($filepath);
        $filesystem->dumpFile($filepath, $content);

        $this->namespace = null;
        $this->class = null;
        $this->methods = [];
    }
}
