<?php 

namespace App\Response\Transformer;

use App\Exception\UnexpectedTypeException;
use App\Model\Biography;
use App\Response\BiographyResponse;

class BiographyResponseTransformer extends AbstractResponseTransformer
{
    /**
     * @throws UnexpectedTypeException
     */
    public function transformFromObject($object): ?BiographyResponse
    {
        if (!$object) {
            return null;
        }

        if (!$object instanceof Biography) {
            throw new UnexpectedTypeException('Expected type of Customer but got ' . get_class($object));
        }

        return (new BiographyResponse())
            ->setContent($object->getContent())
            ->setLng($object->getLng());
    }
}
