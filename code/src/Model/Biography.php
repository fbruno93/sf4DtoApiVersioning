<?php
namespace App\Model;

class Biography
{
    private string $content;

    private string $lng;

    /**
     * Get the value of content
     */ 
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @param string $content
     * @return  self
     */
    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of lng
     */ 
    public function getLng(): string
    {
        return $this->lng;
    }

    /**
     * Set the value of lng
     *
     * @param string $lng
     * @return  self
     */
    public function setLng(string $lng): static
    {
        $this->lng = $lng;

        return $this;
    }
}
