<?php

namespace App\Service;

use App\Loader\AlbumLoader;
use App\Document\AlbumDocument;
use App\Entity\AlbumRow;
use App\Model\Album;
use App\Mongo\AlbumDocumentRepository;
use App\Repository\AlbumRepository as AlbumRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AlbumService
{
    private AlbumLoader $albumBuilder;

    public function __construct(AlbumLoader $albumBuilder)
    {
        $this->albumBuilder = $albumBuilder;
    }

    /**
     * @throws NotFoundHttpException
     */
    public function getAlbum(int $id, string $forCountry): Album
    {
        return $this->albumBuilder->getAlbum($id, $forCountry);
    }
}