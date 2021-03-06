<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Authority
 *
 * @ORM\Table(name="authority")
 * @ORM\Entity
 */
class Authority
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=250, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="typeauth", type="string", length=100, nullable=false)
     */
    private $typeauth;

    /**
     * @var string
     *
     * @ORM\Column(name="uri", type="string", length=200, nullable=false)
     */
    private $uri;

    /**
     * @var string
     *
     * @ORM\Column(name="creation_id_user", type="string", length=100, nullable=false)
     */
    private $creationIdUser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creation_date", type="datetime", nullable=false)
     */
    private $creationDate;

    /**
     * @var string
     *
     * @ORM\Column(name="editing_id_user", type="string", length=100, nullable=false)
     */
    private $editingIdUser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="editing_date", type="datetime", nullable=false)
     */
    private $editingDate;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Catalogue", inversedBy="authority", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="authority_catalogue",
     *   joinColumns={
     *     @ORM\JoinColumn(name="authority_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="catalogue_id", referencedColumnName="id")
     *   }
     * )
     */
    private $catalogue;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->catalogue = new \Doctrine\Common\Collections\ArrayCollection();
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

    public function getTypeauth(): ?string
    {
        return $this->typeauth;
    }

    public function setTypeauth(string $typeauth): self
    {
        $this->typeauth = $typeauth;

        return $this;
    }

    public function getUri(): ?string
    {
        return $this->uri;
    }

    public function setUri(string $uri): self
    {
        $this->uri = $uri;

        return $this;
    }

    public function getCreationIdUser(): ?string
    {
        return $this->creationIdUser;
    }

    public function setCreationIdUser(string $creationIdUser): self
    {
        $this->creationIdUser = $creationIdUser;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    public function setCreationDate(\DateTimeInterface $creationDate): self
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getEditingIdUser(): ?string
    {
        return $this->editingIdUser;
    }

    public function setEditingIdUser(string $editingIdUser): self
    {
        $this->editingIdUser = $editingIdUser;

        return $this;
    }

    public function getEditingDate(): ?\DateTimeInterface
    {
        return $this->editingDate;
    }

    public function setEditingDate(\DateTimeInterface $editingDate): self
    {
        $this->editingDate = $editingDate;

        return $this;
    }

    /**
     * @return Collection|Catalogue[]
     */
    public function getCatalogue(): Collection
    {
        return $this->catalogue;
    }

    public function addCatalogue(Catalogue $catalogue): self
    {
        if (!$this->catalogue->contains($catalogue)) {
            $this->catalogue[] = $catalogue;
        }

        return $this;
    }

    public function removeCatalogue(Catalogue $catalogue): self
    {
        if ($this->catalogue->contains($catalogue)) {
            $this->catalogue->removeElement($catalogue);
        }

        return $this;
    }

}
