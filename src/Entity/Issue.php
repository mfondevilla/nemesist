<?php

namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Doctrine\ORM\Mapping as ORM;

/**
 * Issue
 *
 * @ORM\Table(name="issue", indexes={@ORM\Index(name="id_catalogue", columns={"catalogue_id"})})
 * @ORM\Entity
 */
class Issue
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
     * @ORM\Column(name="title", type="string", length=200, nullable=true)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="subtitle", type="string", length=250, nullable=true)
     */
    private $subtitle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="other_title", type="string", length=250, nullable=true)
     */
    private $otherTitle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="signature_decimal", type="string", length=100, nullable=true)
     */
    private $signatureDecimal;

    /**
     * @var string
     *
     * @ORM\Column(name="signature_text", type="string", length=100, nullable=true)
     */
    private $signatureText;

    /**
     * @var string|null
     *
     * @ORM\Column(name="signature_head", type="string", length=100, nullable=true)
     */
    private $signatureHead;

    /**
     * @var string|null
     *
     * @ORM\Column(name="year", type="string", length=50, nullable=true)
     */
    private $year;

    /**
     * @var string|null
     *
     * @ORM\Column(name="month", type="string", length=50, nullable=true)
     */
    private $month;

    /**
     * @var string|null
     *
     * @ORM\Column(name="day", type="string", length=50, nullable=true)
     */
    private $day;

    /**
     * @var string|null
     *
     * @ORM\Column(name="volume", type="string", length=50, nullable=true)
     */
    private $volume;

    /**
     * @var string|null
     *
     * @ORM\Column(name="number", type="string", length=50, nullable=true)
     */
    private $number;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pages", type="string", length=50, nullable=true)
     */
    private $pages;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="text", length=65535, nullable=true)
     */
    private $notes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cover", type="string", length=200, nullable=true)
     */
    private $cover;

    /**
     * @var string|null
     *
     * @ORM\Column(name="summary", type="text", length=0, nullable=true)
     */
    private $summary;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reference", type="text", length=65535, nullable=true)
     */
    private $reference;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cite", type="string", length=250, nullable=true)
     */
    private $cite;

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
     * @ORM\ManyToOne(targetEntity="Catalogue")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="catalogue_id", referencedColumnName="id")
     * })
     */
    private $catalogue;
    
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Item", mappedBy="issue")
     */
    
    private $items;
    
    public function __construct(){
        $this->items = new ArrayCollection();
    } 
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    public function setSubtitle(?string $subtitle): self
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    public function getOtherTitle(): ?string
    {
        return $this->otherTitle;
    }

    public function setOtherTitle(?string $otherTitle): self
    {
        $this->otherTitle = $otherTitle;

        return $this;
    }

    public function getSignatureDecimal(): ?string
    {
        return $this->signatureDecimal;
    }

    public function setSignatureDecimal(?string $signatureDecimal): self
    {
        $this->signatureDecimal = $signatureDecimal;

        return $this;
    }

    public function getSignatureText(): ?string
    {
        return $this->signatureText;
    }

    public function setSignatureText(string $signatureText): self
    {
        $this->signatureText = $signatureText;

        return $this;
    }

    public function getSignatureHead(): ?string
    {
        return $this->signatureHead;
    }

    public function setSignatureHead(?string $signatureHead): self
    {
        $this->signatureHead = $signatureHead;

        return $this;
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(?string $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getMonth(): ?string
    {
        return $this->month;
    }

    public function setMonth(?string $month): self
    {
        $this->month = $month;

        return $this;
    }

    public function getDay(): ?string
    {
        return $this->day;
    }

    public function setDay(?string $day): self
    {
        $this->day = $day;

        return $this;
    }

    public function getVolume(): ?string
    {
        return $this->volume;
    }

    public function setVolume(?string $volume): self
    {
        $this->volume = $volume;

        return $this;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(?string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getPages(): ?string
    {
        return $this->pages;
    }

    public function setPages(?string $pages): self
    {
        $this->pages = $pages;

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

    public function getCover(): ?string
    {
        return $this->cover;
    }

    public function setCover(?string $cover): self
    {
        $this->cover = $cover;

        return $this;
    }

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(?string $summary): self
    {
        $this->summary = $summary;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getCite(): ?string
    {
        return $this->cite;
    }

    public function setCite(?string $cite): self
    {
        $this->cite = $cite;

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

    public function getItems():Collection{
        return $this->items;
    }
    
}
