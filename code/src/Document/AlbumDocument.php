<?php


namespace App\Document;

class AlbumDocument
{
    public string $id;
    public int $albumId;

    /** @var AlbumDescriptionDocument[]  */
    public array $description;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return AlbumDocument
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param int $albumId
     * @return AlbumDocument
     */
    public function setAlbumId(int $albumId): self
    {
        $this->albumId = $albumId;

        return $this;
    }

    /**
     * @return AlbumDescriptionDocument[]
     */
    public function getDescription(): array
    {
        return $this->description;
    }

    /**
     * @param AlbumDescriptionDocument[] $description
     * @return AlbumDocument
     */
    public function setDescription(array $description): self
    {
        $this->description = $description;

        return $this;
    }
}