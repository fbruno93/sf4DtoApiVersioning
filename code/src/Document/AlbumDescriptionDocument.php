<?php

namespace App\Document;

class AlbumDescriptionDocument
{
    public string $lng;
    public string $content;

    /**
     * @return string
     */
    public function getLng(): string
    {
        return $this->lng;
    }

    /**
     * @param string $lng
     * @return AlbumDescriptionDocument
     */
    public function setLng(string $lng): self
    {
        $this->lng = $lng;

        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return AlbumDescriptionDocument
     */
    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }
}