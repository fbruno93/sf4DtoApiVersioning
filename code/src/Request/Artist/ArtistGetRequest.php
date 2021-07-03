<?php

namespace App\Request\Artist;

use App\Request\ApiRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

class ArtistGetRequest extends ApiRequest
{
    private ArtistGetRequestInterface $artistGetRequest;

    public function __construct(Request $request)
    {
        parent::__construct($request);

        $this->artistGetRequest = $this->isApiV2()
            ? new ArtistGetV2Request($request)
            : new ArtistGetV3Request($request)
        ;
    }

    #[Assert\NotBlank(message: 'PARAMETER_ARTIST_ID_REQUIRED')]
    #[Assert\Positive(message: 'PARAMETER_ARTIST_ID_POSITIVE_NUMBER')]
    public function getArtistId(): ?int
    {
        return $this->artistGetRequest->getArtistId();
    }
}
