<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\LevelRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LevelRepository::class)]
#[ApiResource]
class Level
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $number;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $background;

    #[ORM\ManyToOne(targetEntity: Character::class)]
    private $monster;

    #[ORM\Column(type: 'integer')]
    private $multiplier;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(?int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getBackground(): ?string
    {
        return $this->background;
    }

    public function setBackground(?string $background): self
    {
        $this->background = $background;

        return $this;
    }

    public function getMonster(): ?Character
    {
        return $this->monster;
    }

    public function setMonster(?Character $monster): self
    {
        $this->monster = $monster;

        return $this;
    }

    public function getMultiplier(): ?int
    {
        return $this->multiplier;
    }

    public function setMultiplier(int $multiplier): self
    {
        $this->multiplier = $multiplier;

        return $this;
    }
}
