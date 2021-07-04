<?php

namespace App\Transformer\Document\Album;

use App\Document\AlbumDescriptionDocument;
use App\Exception\UnexpectedTypeException;
use App\Transformer\AbstractResponseTransformer;

use MongoDB\Model\BSONDocument;

class AlbumDescriptionTransformer extends AbstractResponseTransformer
{

    public function transformFromObject($object): AlbumDescriptionDocument
    {
        if (!$object instanceof BSONDocument) {
            throw new UnexpectedTypeException('Expected type of BSONDocument but got ' . get_class($object));
        }

        return (new AlbumDescriptionDocument())
            ->setLng($object['lng'])
            ->setContent($object['content'])
        ;
    }
}
