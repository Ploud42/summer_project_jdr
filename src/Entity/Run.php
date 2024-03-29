<?php

namespace App\Entity;

use App\Repository\RunRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RunRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['runs']],
    itemOperations: [
        'get'
    ],
    collectionOperations:[
        'get',
        'post'
    ]
)]
#[ApiFilter(SearchFilter::class, properties: ['date' => 'exact', 'user' => 'exact'])]
class Run
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(["runs"])]
    private $id;

    #[ORM\Column(type: 'date')]
    #[Groups(["runs"])]
    private $date;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(["runs"])]
    private $score;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'runs')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["runs"])]
    private $user;

    #[ORM\ManyToOne(targetEntity: Character::class, inversedBy: 'runs')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["runs"])]
    private $charac;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getScore(): ?string
    {
        return $this->score;
    }

    public function setScore(?string $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getCharac(): ?Character
    {
        return $this->charac;
    }

    public function setCharac(?Character $charac): self
    {
        $this->charac = $charac;

        return $this;
    }
}
