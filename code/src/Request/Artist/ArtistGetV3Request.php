<?php

namespace App\Request\Artist;

use Symfony\Component\HttpFoundation\Request;

class ArtistGetV3Request implements ArtistGetRequestInterface
{
    private int $artistId;

    public function __construct(Request $request)
    {
        $this->artistId = (int) $request->attributes->get('artistId');
    }

    public function getArtistId(): int
    {
        return $this->artistId;
    }
}
