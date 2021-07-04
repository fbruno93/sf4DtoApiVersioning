<?php

namespace App\Entity;

use App\Repository\AlbumRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass:AlbumRepository::class), ORM\Table(name: 'album2')]
class AlbumRow
{
    #[ORM\Id,
      ORM\GeneratedValue,
      ORM\Column(type:"integer")]
    private ?int $id;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $title;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }
}
