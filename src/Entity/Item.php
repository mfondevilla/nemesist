<?php

namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Doctrine\ORM\Mapping as ORM;

/**
 * Item
 *
 * @ORM\Table(name="item", indexes={@ORM\Index(name="id_catalogue", columns={"catalogue_id"}), @ORM\Index(name="id_issue", columns={"issue_id"})})
 * @ORM\Entity
 */

class Item
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
     * @var string|null
     *
     * @ORM\Column(name="status", type="string", length=200, nullable=true)
     */
    private $status;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="purchase_date", type="date", nullable=true)
     */
    private $purchaseDate;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="sale_date", type="date", nullable=true)
     */
    private $saleDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="purchase_value", type="decimal", precision=5, scale=2, nullable=true)
     */
    private $purchaseValue;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sale_value", type="decimal", precision=5, scale=2, nullable=true)
     */
    private $saleValue;

    /**
     * @var string|null
     *
     * @ORM\Column(name="estimated_value", type="decimal", precision=5, scale=2, nullable=true)
     */
    private $estimatedValue;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cover", type="string", length=200, nullable=true)
     */
    private $cover;

    /**
     * @var string|null
     *
     * @ORM\Column(name="origin", type="text", length=0, nullable=true)
     */
    private $origin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tracking", type="text", length=0, nullable=true)
     */
    private $tracking;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="text", length=65535, nullable=true)
     */
    private $notes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="creation_id_user", type="string", length=100, nullable=true)
     */
    private $creationIdUser;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="creation_date", type="datetime", nullable=true)
     */
    private $creationDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="editing_id_user", type="string", length=100, nullable=true)
     */
    private $editingIdUser;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="editing_date", type="datetime", nullable=true)
     */
    private $editingDate;


    /**
     * @var \Catalogue
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Catalogue", inversedBy="items")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="catalogue_id", referencedColumnName="id")
     * })
     */
    private $catalogue;

    /**
     * @var \Issue
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Issue", inversedBy="items")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="issue_id", referencedColumnName="id")
     * })
     */
    private $issue;
    
    
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Historic", mappedBy="item")
     * 
     */
    private $historics;
    
    public function __construct(){
        $this->historics = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getPurchaseDate(): ?\DateTimeInterface
    {
        return $this->purchaseDate;
    }

    public function setPurchaseDate(?\DateTimeInterface $purchaseDate): self
    {
        $this->purchaseDate = $purchaseDate;

        return $this;
    }

    public function getSaleDate(): ?\DateTimeInterface
    {
        return $this->saleDate;
    }

    public function setSaleDate(?\DateTimeInterface $saleDate): self
    {
        $this->saleDate = $saleDate;

        return $this;
    }

    public function getPurchaseValue()
    {
        return $this->purchaseValue;
    }

    public function setPurchaseValue($purchaseValue): self
    {
        $this->purchaseValue = $purchaseValue;

        return $this;
    }

    public function getSaleValue()
    {
        return $this->saleValue;
    }

    public function setSaleValue($saleValue): self
    {
        $this->saleValue = $saleValue;

        return $this;
    }

    public function getEstimatedValue()
    {
        return $this->estimatedValue;
    }

    public function setEstimatedValue($estimatedValue): self
    {
        $this->estimatedValue = $estimatedValue;

        return $this;
    }

    public function getCover(): ?string
    {
        return $this->cover;
    }

    public function setCover(?string $cover): self
    {
        $this->cover = $cover;

        return $this;
    }

    public function getOrigin(): ?string
    {
        return $this->origin;
    }

    public function setOrigin(?string $origin): self
    {
        $this->origin = $origin;

        return $this;
    }

    public function getTracking(): ?string
    {
        return $this->tracking;
    }

    public function setTracking(?string $tracking): self
    {
        $this->tracking = $tracking;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getCreationIdUser(): ?string
    {
        return $this->creationIdUser;
    }

    public function setCreationIdUser(?string $creationIdUser): self
    {
        $this->creationIdUser = $creationIdUser;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    public function setCreationDate(?\DateTimeInterface $creationDate): self
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getEditingIdUser(): ?string
    {
        return $this->editingIdUser;
    }

    public function setEditingIdUser(?string $editingIdUser): self
    {
        $this->editingIdUser = $editingIdUser;

        return $this;
    }

    public function getEditingDate(): ?\DateTimeInterface
    {
        return $this->editingDate;
    }

    public function setEditingDate(?\DateTimeInterface $editingDate): self
    {
        $this->editingDate = $editingDate;

        return $this;
    }

    public function getCatalogue(): ?Catalogue
    {
        return $this->catalogue;
    }

    public function setCatalogue(?Catalogue $catalogue): self
    {
        $this->catalogue = $catalogue;

        return $this;
    }

    public function getIssue(): ?Issue
    {
        return $this->issue;
    }

    public function setIssue(?Issue $issue): self
    {
        $this->issue = $issue;

        return $this;
    }

    /**
     * @return Collection|Historic[]
     */
    public function getHistorics(): Collection
    {
        return $this->historics;
    }

    public function addHistoric(Historic $historic): self
    {
        if (!$this->historics->contains($historic)) {
            $this->historics[] = $historic;
            $historic->setItem($this);
        }

        return $this;
    }

    public function removeHistoric(Historic $historic): self
    {
        if ($this->historics->contains($historic)) {
            $this->historics->removeElement($historic);
            // set the owning side to null (unless already changed)
            if ($historic->getItem() === $this) {
                $historic->setItem(null);
            }
        }

        return $this;
    }


}