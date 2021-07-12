<?php 

namespace App\Transformer;

abstract class AbstractResponseTransformer implements ResponseTransformerInterface
{
    public function transformFromObjects(array $objects): array
    {
        $dto = [];

        foreach ($objects as $object) {
            $dto[] = $this->transformFromObject($object);
        }

        return $dto;
    }
}
