<?php


namespace App\Mongo;


use App\Document\AlbumDocument;
use App\Transformer\Document\Album\AlbumTransformer;

class AlbumDocumentRepository extends AbstractDocumentRepository
{
    private const DOCTYPE = 'album';

    public function __construct(AlbumTransformer $albumTransformer)
    {
        parent::__construct(self::DOCTYPE, self::DOCTYPE, $albumTransformer);
    }

    public function getAlbum($id): AlbumDocument
    {
        return $this->fineOneBy(['album_id' => $id]);
    }
}