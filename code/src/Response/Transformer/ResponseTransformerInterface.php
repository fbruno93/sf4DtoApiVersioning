<?php

namespace App\Response\Transformer;

interface ResponseTransformerInterface
{
    public function transformFromObject($object);
    public function transformFromObjects(iterable $objects): iterable;
}
