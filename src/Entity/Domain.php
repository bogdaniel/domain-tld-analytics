<?php

namespace App\Entity;

use App\Repository\DomainRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: DomainRepository::class)]
class Domain
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 500)]
    private ?string $name = null;

    #[ORM\Column]
    private ?bool $isUsedForPhishing = null;

    #[ORM\Column(nullable: true)]
    private ?array $phishingHistory = null;

    #[ORM\ManyToOne(inversedBy: 'domains')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Tld $extension = null;

    #[ORM\Column()]
    #[Gedmo\Timestampable(on: 'create')]
    private ?\DateTimeImmutable $created = null;

    #[ORM\Column(nullable: true)]
    #[Gedmo\Timestampable]
    private ?\DateTimeImmutable $updated = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $deleted = null;

    #[ORM\Column(nullable: true)]
    #[Gedmo\Timestampable(on: 'change', field: ['name', 'phishingHistory', 'isUsedForPhishing'])]
    private ?\DateTimeImmutable $contentChanged = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }


    public function isIsUsedForPhishing(): ?bool
    {
        return $this->isUsedForPhishing;
    }

    public function setIsUsedForPhishing(bool $isUsedForPhishing): static
    {
        $this->isUsedForPhishing = $isUsedForPhishing;

        return $this;
    }

    public function getPhishingHistory(): ?array
    {
        return $this->phishingHistory;
    }

    public function setPhishingHistory(?array $phishingHistory): static
    {
        $this->phishingHistory = $phishingHistory;

        return $this;
    }

    public function getExtension(): ?Tld
    {
        return $this->extension;
    }

    public function setExtension(?Tld $extension): static
    {
        $this->extension = $extension;

        return $this;
    }

    public function getcreated(): ?\DateTimeImmutable
    {
        return $this->created;
    }

    public function setcreated(\DateTimeImmutable $created): static
    {
        $this->created = $created;

        return $this;
    }

    public function getupdated(): ?\DateTimeImmutable
    {
        return $this->updated;
    }

    public function setupdated(?\DateTimeImmutable $updated): static
    {
        $this->updated = $updated;

        return $this;
    }

    public function getdeleted(): ?\DateTimeImmutable
    {
        return $this->deleted;
    }

    public function setdeleted(?\DateTimeImmutable $deleted): static
    {
        $this->deleted = $deleted;

        return $this;
    }

    public function getContentChanged(): ?\DateTimeImmutable
    {
        return $this->contentChanged;
    }

    public function setContentChanged(?\DateTimeImmutable $contentChanged): static
    {
        $this->contentChanged = $contentChanged;

        return $this;
    }
}
