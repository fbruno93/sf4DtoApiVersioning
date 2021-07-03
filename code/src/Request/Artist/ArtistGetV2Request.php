<?php

namespace App\Request\Artist;

use Symfony\Component\HttpFoundation\Request;

class ArtistGetV2Request implements ArtistGetRequestInterface
{
    private int $artistId;

    public function __construct(Request $request)
    {
        $this->artistId = (int) $request->get('artist_id');
    }

    public function getArtistId(): int
    {
        return $this->artistId;
    }
}
