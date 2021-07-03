<?php 

namespace App\Model;

class Artist
{
    private int $artistId;

    private string $name;

    private ?Biography $biography = null;

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

    /**
     * Get the value of biography
     */ 
    public function getBiography(): ?Biography
    {
        return $this->biography;
    }

    /**
     * Set the value of biography
     *
     * @param Biography $biography
     * @return  self
     */
    public function setBiography(Biography $biography): static
    {
        $this->biography = $biography;

        return $this;
    }
}
