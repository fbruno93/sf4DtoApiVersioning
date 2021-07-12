<?php

namespace App\Request;

use ReflectionClass;
use ReflectionException;

use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class RequestParameterResolver implements ArgumentValueResolverInterface
{
    private ValidatorInterface $validator;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    public function supports(Request $request, ArgumentMetadata $argument): bool
    {
        try {
            $reflection = new ReflectionClass($argument->getType());
            return $reflection->isSubclassOf(ApiRequest::class);
        } catch (ReflectionException) {
            return false;
        }
    }

    /**
     * @throws BadRequestException
     */
    public function resolve(Request $request, ArgumentMetadata $argument): iterable
    {
        $class = $argument->getType();
        $requestClass = new $class($request);

        $errors = $this->validator->validate($requestClass);
        if (count($errors) > 0) {
            throw new BadRequestException($errors->get(0)->getMessage(), Response::HTTP_BAD_REQUEST);
        }

        yield $requestClass;
    }
}
