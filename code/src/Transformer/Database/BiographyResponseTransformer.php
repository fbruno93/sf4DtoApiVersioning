<?php 

namespace App\Transformer\Database;

use App\Exception\UnexpectedTypeException;
use App\Model\Biography;
use App\Response\BiographyResponse;
use App\Transformer\AbstractResponseTransformer;

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
            throw new UnexpectedTypeException('Expected type of Biography but got ' . get_class($object));
        }

        return (new BiographyResponse())
            ->setContent($object->getContent())
            ->setLng($object->getLng());
    }
}
