<?php 

namespace App\Response;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\Ignore;
use Symfony\Component\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation as Serializer;

class ArtistResponse
{
    #[Groups(['api_v2', 'api_v3'])]
    private int $artistId;
    
    #[Groups(['api_v3'])]
    private string $name;

    #[Ignore]
    private ?BiographyResponse $biography;

    /**
     * Get the value of artistId
     */ 
    public function getArtistId(): int
    {
        return $this->artistId;
    }

    /**
     * Set the value of artistId
     *
     * @param int $artistId
     * @return  self
     */
    public function setArtistId(int $artistId): static
    {
        $this->artistId = $artistId;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param string $name
     * @return  self
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    #[Groups(['api_v2'])]
    #[Serializer\VirtualProperty([])]
    #[SerializedName('biography')]
    public function getBiographyV2(): ?string
    {
        return $this->biography?->getContent();
    }

    #[Serializer\VirtualProperty([])]
    #[SerializedName('biography')]
    #[Groups(['api_v3'])]
    public function getBiographyV3(): BiographyResponse
    {
        return $this->biography;
    }


    /**
     * Set the value of biography
     *
     * @param BiographyResponse|null $biography
     * @return  self
     */
    public function setBiography(?BiographyResponse $biography): static
    {
        $this->biography = $biography;

        return $this;
    }
}
