<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Book
 *
 * @ORM\Table(name="book", indexes={@ORM\Index(name="id_catalogue", columns={"id_catalogue"})})
 * @ORM\Entity
 */
class Book
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
     * @ORM\Column(name="status", type="string", length=200, nullable=false)
     */
    private $status;

    /**
     * @var string|null
     *
     * @ORM\Column(name="real_value", type="decimal", precision=5, scale=2, nullable=true)
     */
    private $realValue;

    /**
     * @var string
     *
     * @ORM\Column(name="estimated_value", type="decimal", precision=5, scale=2, nullable=false)
     */
    private $estimatedValue;

    /**
     * @var string
     *
     * @ORM\Column(name="cover", type="string", length=200, nullable=false)
     */
    private $cover;

    /**
     * @var \Catalogue
     *
     * @ORM\ManyToOne(targetEntity="Catalogue")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_catalogue", referencedColumnName="id")
     * })
     */
    private $idCatalogue;

    public function getId(): int
    {
        return $this->id;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getRealValue()
    {
        return $this->realValue;
    }

    public function setRealValue($realValue): self
    {
        $this->realValue = $realValue;

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

    public function getCover(): string
    {
        return $this->cover;
    }

    public function setCover(string $cover): self
    {
        $this->cover = $cover;

        return $this;
    }

    public function getIdCatalogue(): Catalogue
    {
        return $this->idCatalogue;
    }

    public function setIdCatalogue(Catalogue $idCatalogue): self
    {
        $this->idCatalogue = $idCatalogue;

        return $this;
    }


}
