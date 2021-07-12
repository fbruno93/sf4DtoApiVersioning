<?php

namespace App\Transformer\Document\Album;

use App\Document\AlbumDocument;
use App\Exception\UnexpectedTypeException;
use App\Transformer\AbstractResponseTransformer;

use MongoDB\Model\BSONDocument;

class AlbumTransformer extends AbstractResponseTransformer
{
    private AlbumDescriptionTransformer $albumDescriptionTransformer;

    public function __construct(AlbumDescriptionTransformer $albumDescriptionTransformer)
    {
        $this->albumDescriptionTransformer = $albumDescriptionTransformer;
    }

    public function transformFromObject($object): AlbumDocument
    {
        if (!$object instanceof BSONDocument) {
            throw new UnexpectedTypeException('Expected type of BSONDocument but got ' . get_class($object));
        }

        $description = $this->albumDescriptionTransformer->transformFromObjects($object['description']);

        return (new AlbumDocument())
            ->setAlbumId($object['album_id'])
            ->setDescription($description)
        ;
    }
}
