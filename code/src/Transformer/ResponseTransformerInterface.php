<?php

namespace App\Transformer;

interface ResponseTransformerInterface
{
    public function transformFromObject($object);
    public function transformFromObjects(array $objects);
}
