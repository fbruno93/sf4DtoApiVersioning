<?php

namespace App\Loader;

use App\Model\Album;
use App\Mongo\AbstractDocumentRepository;
use App\Mongo\AlbumDocumentRepository;
use App\Repository\AlbumRepository;
use Doctrine\ORM\EntityRepository;

class AlbumLoader
{
    private array $albums = [];

    private Album $albumCreating;

    private EntityRepository $albumRepository;
    private AbstractDocumentRepository $documentRepository;

    public function __construct(AlbumRepository $albumRepository, AlbumDocumentRepository $docRepository)
    {
        $this->albumRepository = $albumRepository;
        $this->documentRepository = $docRepository;
    }

    /**
     *
     * @param int $id
     * @param string $country
     *
     * @return Album
     */
    public function getAlbum(int $id, string $country): Album
    {
        if (isset($this->albums[$id])) {
            return $this->albums[$id];
        }

        $this->albumCreating = new Album();

        $this->getRow($id);
        $this->getDocument($id, $country);

        $this->albums[$id] = $this->albumCreating;

        return $this->albums[$id];
    }

    /**
     * Fill album object from database
     *
     * @param $id
     */
    private function getRow($id)
    {
        $row = $this->albumRepository->find($id);

        $this->albumCreating->setId($row->getId());
        $this->albumCreating->setTitle($row->getTitle());
    }

    /**
     * Fill album object from noSQL
     *
     * @param int $id
     * @param string $lng
     */
    private function getDocument(int $id, string $lng)
    {
        $albumDocument = $this->documentRepository->getAlbum($id);

        $countryDescription = array_filter($albumDocument->getDescription(), function ($el) use ($lng) {
            return $el->getLng() === $lng;
        });

        $countryDescription = array_shift($countryDescription);

        $this->albumCreating->setDescription($countryDescription?->getContent());
    }
}