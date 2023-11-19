<?php

namespace App\Entity;

use App\DoctrineExtensions\DBAL\Types\UTCDateTimeType;
use App\Repository\TldRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: TldRepository::class)]
class Tld
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $extension = null;

    #[ORM\OneToMany(mappedBy: 'extension', targetEntity: Domain::class)]
    private Collection $domains;

    #[ORM\Column()]
    #[Gedmo\Timestampable(on: 'create')]
    private ?\DateTimeImmutable $created = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updated = null;

    #[ORM\Column(nullable: true)]
    #[Gedmo\Timestampable]
    private ?\DateTimeImmutable $deleted = null;

    #[ORM\Column(nullable: true)]
    #[Gedmo\Timestampable(on: 'change', field: ['extension'])]
    private ?\DateTimeImmutable $contentChanged = null;

    public function __construct()
    {
        $this->domains = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExtension(): ?string
    {
        return $this->extension;
    }

    public function setExtension(string $extension): static
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * @return Collection<int, Domain>
     */
    public function getDomains(): Collection
    {
        return $this->domains;
    }

    public function addDomain(Domain $domain): static
    {
        if (!$this->domains->contains($domain)) {
            $this->domains->add($domain);
            $domain->setExtension($this);
        }

        return $this;
    }

    public function removeDomain(Domain $domain): static
    {
        if ($this->domains->removeElement($domain)) {
            // set the owning side to null (unless already changed)
            if ($domain->getExtension() === $this) {
                $domain->setExtension(null);
            }
        }

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
