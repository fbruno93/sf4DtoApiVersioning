<?php 

namespace App\Response\Transformer;

use App\Exception\UnexpectedTypeException;
use App\Model\Artist;
use App\Response\ArtistResponse;

class ArtistResponseTransformer extends AbstractResponseTransformer
{
    private BiographyResponseTransformer $biographyTransformer;

    public function __construct(BiographyResponseTransformer $biographyTransformer)
    {
        $this->biographyTransformer = $biographyTransformer;
    }

    /**
     * @throws UnexpectedTypeException
     */
    public function transformFromObject($object): ArtistResponse
    {
        if (!$object instanceof Artist) {
            throw new UnexpectedTypeException('Expected type of Customer but got ' . get_class($object));
        }

        $biographyResponse = $this->biographyTransformer->transformFromObject($object->getBiography());

        return (new ArtistResponse())
            ->setArtistId($object->getArtistId())
            ->setName($object->getName())
            ->setBiography($biographyResponse);
    }
}
