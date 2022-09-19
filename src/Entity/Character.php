<?php

namespace App\Entity;

use App\Repository\CharacterRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['read']],
    denormalizationContext: ['groups' => ['write']],
)]
#[ORM\Table(name: '`character`')]
class Character
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["read"])]
    private $name;

    #[ORM\Column(type: 'integer')]
    #[Groups(["read"])]
    private $hp;

    #[ORM\Column(type: 'integer')]
    #[Groups(["read"])]
    private $atk;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(["read"])]
    private $image;

    #[ORM\OneToMany(mappedBy: 'charac', targetEntity: Run::class)]
    private $runs;

    #[ORM\Column(type: 'boolean')]
    #[Groups(["read"])]
    private $playable;

    public function __construct()
    {
        $this->runs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getHp(): ?int
    {
        return $this->hp;
    }

    public function setHp(int $hp): self
    {
        $this->hp = $hp;

        return $this;
    }

    public function getAtk(): ?int
    {
        return $this->atk;
    }

    public function setAtk(int $atk): self
    {
        $this->atk = $atk;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, Run>
     */
    public function getRuns(): Collection
    {
        return $this->runs;
    }

    public function addRun(Run $run): self
    {
        if (!$this->runs->contains($run)) {
            $this->runs[] = $run;
            $run->setCharac($this);
        }

        return $this;
    }

    public function removeRun(Run $run): self
    {
        if ($this->runs->removeElement($run)) {
            // set the owning side to null (unless already changed)
            if ($run->getCharac() === $this) {
                $run->setCharac(null);
            }
        }

        return $this;
    }

    public function isPlayable(): ?bool
    {
        return $this->playable;
    }

    public function setPlayable(bool $playable): self
    {
        $this->playable = $playable;

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
