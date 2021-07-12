<?php


namespace App\Command;


use App\Util\MyPrinter;
use App\Util\PhpClassBuilder;
use cebe\openapi\Reader;
use Nette\PhpGenerator\ClassType;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddApiRequest extends Command
{
    protected static $defaultName = 'zz:api';

    private array $methods = ['get', 'put', 'post', 'delete', 'options', 'head', 'patch', 'trace'];

    private const OA_PHP_TYPE = [
        'integer' => 'int',
        'number' => 'float',
        'string' => 'string',
        'array' => 'array',
    ];

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $openapi = Reader::readFromYamlFile('https://raw.githubusercontent.com/OAI/OpenAPI-Specification/3.0.2/examples/v3.0/petstore-expanded.yaml');
        foreach ($openapi->paths as $baseUrl => $path) {

            $phpClassBuilder = new PhpClassBuilder();
            $baseClass = explode('/', $baseUrl)[1];

            foreach ($this->methods as $method) {

                if (null === $path->$method) {
                    continue;
                }

                $className = $method.ucfirst($baseClass);

                $phpClassBuilder->createClass($className, 'App\\Request\\'.ucfirst($className));

                foreach ($path->$method->parameters as $parameter) {
                    dump($parameter->name);
                    $phpClassBuilder->addGetterMethod($parameter->name, self::OA_PHP_TYPE[$parameter->schema->type]);
                }
                $phpClassBuilder->build();
                $phpClassBuilder->write();
            }
        }

        return Command::SUCCESS;
    }


}
