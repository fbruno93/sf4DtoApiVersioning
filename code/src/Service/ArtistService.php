<?php

namespace App\Service;

use App\Model\Artist;

class ArtistService 
{
    private BiographyService $biographyService;

    public function __construct(BiographyService $biographyService)
    {
        $this->biographyService = $biographyService;
    }

    public function get(int $artistId): Artist
    {
        return (new Artist())
            ->setArtistId($artistId)
            ->setName('Bruno')
            ->setBiography($this->biographyService->getBiography());
    }
}
