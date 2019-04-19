<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Historic
 *
 * @ORM\Table(name="historic", indexes={@ORM\Index(name="id_item", columns={"item_id"})})
 * @ORM\Entity
 */
class Historic
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
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=200, nullable=false)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="purchase_value", type="decimal", precision=5, scale=2, nullable=false)
     */
    private $purchaseValue;

    /**
     * @var string
     *
     * @ORM\Column(name="sale_value", type="decimal", precision=5, scale=2, nullable=false)
     */
    private $saleValue;

    /**
     * @var string
     *
     * @ORM\Column(name="estimated_value", type="decimal", precision=5, scale=2, nullable=false)
     */
    private $estimatedValue;

    /**
     * @var \Item
     *
     * @ORM\ManyToOne(targetEntity="Item")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="item_id", referencedColumnName="id")
     * })
     */
    private $item;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

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

    public function getItem(): ?Item
    {
        return $this->item;
    }

    public function setItem(?Item $item): self
    {
        $this->item = $item;

        return $this;
    }


}
