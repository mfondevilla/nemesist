<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Catalogue
 *
 * @ORM\Table(name="catalogue")
 * @ORM\Entity
 */
class Catalogue
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
     * @ORM\Column(name="title", type="string", length=250, nullable=false)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="subtitle", type="string", length=200, nullable=true)
     */
    private $subtitle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="other_title", type="string", length=200, nullable=true)
     */
    private $otherTitle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="translate_title", type="string", length=200, nullable=true)
     */
    private $translateTitle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="signature_decimal", type="string", length=50, nullable=true)
     */
    private $signatureDecimal;

    /**
     * @var string|null
     *
     * @ORM\Column(name="signature_text", type="string", length=20, nullable=true)
     */
    private $signatureText;

    /**
     * @var string|null
     *
     * @ORM\Column(name="signature_head", type="string", length=20, nullable=true)
     */
    private $signatureHead;

    /**
     * @var string|null
     *
     * @ORM\Column(name="uniform_title", type="string", length=200, nullable=true)
     */
    private $uniformTitle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="edition", type="string", length=100, nullable=true)
     */
    private $edition;

    /**
     * @var string|null
     *
     * @ORM\Column(name="publisher", type="string", length=200, nullable=true)
     */
    private $publisher;

    /**
     * @var string|null
     *
     * @ORM\Column(name="year_publication", type="string", length=100, nullable=true)
     */
    private $yearPublication;

    /**
     * @var string|null
     *
     * @ORM\Column(name="place_publication", type="string", length=200, nullable=true)
     */
    private $placePublication;

    /**
     * @var string|null
     *
     * @ORM\Column(name="document_type", type="string", length=200, nullable=true)
     */
    private $documentType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="subdoc_type", type="string", length=200, nullable=true)
     */
    private $subdocType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="copyright", type="string", length=50, nullable=true)
     */
    private $copyright;

    /**
     * @var int|null
     *
     * @ORM\Column(name="subject_heading_1", type="integer", nullable=true)
     */
    private $subjectHeading1;

    /**
     * @var int|null
     *
     * @ORM\Column(name="subject_heading_2", type="integer", nullable=true)
     */
    private $subjectHeading2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="physical_description", type="string", length=200, nullable=true)
     */
    private $physicalDescription;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pages", type="string", length=50, nullable=true)
     */
    private $pages;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cms", type="string", length=50, nullable=true)
     */
    private $cms;

    /**
     * @var string|null
     *
     * @ORM\Column(name="periodicity", type="string", length=200, nullable=true)
     */
    private $periodicity;

    /**
     * @var string|null
     *
     * @ORM\Column(name="vol", type="string", length=100, nullable=true)
     */
    private $vol;

    /**
     * @var string|null
     *
     * @ORM\Column(name="serie", type="string", length=200, nullable=true)
     */
    private $serie;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nserie", type="string", length=50, nullable=true)
     */
    private $nserie;

    /**
     * @var string|null
     *
     * @ORM\Column(name="language", type="string", length=250, nullable=true)
     */
    private $language;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="text", length=65535, nullable=true)
     */
    private $notes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="summary", type="text", length=0, nullable=true)
     */
    private $summary;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numb_copies", type="integer", nullable=true)
     */
    private $numbCopies;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISBN", type="string", length=100, nullable=true)
     */
    private $isbn;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISSN", type="string", length=100, nullable=true)
     */
    private $issn;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DL", type="string", length=100, nullable=true)
     */
    private $dl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CDU_1", type="string", length=200, nullable=true)
     */
    private $cdu1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cdu1_text", type="string", length=200, nullable=true)
     */
    private $cdu1Text;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CDU_2", type="string", length=200, nullable=true)
     */
    private $cdu2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cdu2_text", type="string", length=200, nullable=true)
     */
    private $cdu2Text;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cover", type="string", length=200, nullable=true)
     */
    private $cover;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Authority", mappedBy="catalogue")
     */
    private $authority;

  
        
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Item", mappedBy="catalogue")
     */
    
    private $items;
    
     /**
     * @ORM\OneToMany(targetEntity="App\Entity\Issue", mappedBy="catalogue")
     */
    
    private $issues;
    
    public function __construct(){
        $this->items = new ArrayCollection();
        $this->issues = new ArrayCollection();
        $this->authority = new ArrayCollection();
    }
   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
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

    public function getTranslateTitle(): ?string
    {
        return $this->translateTitle;
    }

    public function setTranslateTitle(?string $translateTitle): self
    {
        $this->translateTitle = $translateTitle;

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

    public function setSignatureText(?string $signatureText): self
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

    public function getUniformTitle(): ?string
    {
        return $this->uniformTitle;
    }

    public function setUniformTitle(?string $uniformTitle): self
    {
        $this->uniformTitle = $uniformTitle;

        return $this;
    }

    public function getEdition(): ?string
    {
        return $this->edition;
    }

    public function setEdition(?string $edition): self
    {
        $this->edition = $edition;

        return $this;
    }

    public function getPublisher(): ?string
    {
        return $this->publisher;
    }

    public function setPublisher(?string $publisher): self
    {
        $this->publisher = $publisher;

        return $this;
    }

    public function getYearPublication(): ?string
    {
        return $this->yearPublication;
    }

    public function setYearPublication(?string $yearPublication): self
    {
        $this->yearPublication = $yearPublication;

        return $this;
    }

    public function getPlacePublication(): ?string
    {
        return $this->placePublication;
    }

    public function setPlacePublication(?string $placePublication): self
    {
        $this->placePublication = $placePublication;

        return $this;
    }

    public function getDocumentType(): ?string
    {
        return $this->documentType;
    }

    public function setDocumentType(?string $documentType): self
    {
        $this->documentType = $documentType;

        return $this;
    }

    public function getSubdocType(): ?string
    {
        return $this->subdocType;
    }

    public function setSubdocType(?string $subdocType): self
    {
        $this->subdocType = $subdocType;

        return $this;
    }

    public function getCopyright(): ?string
    {
        return $this->copyright;
    }

    public function setCopyright(?string $copyright): self
    {
        $this->copyright = $copyright;

        return $this;
    }

    public function getSubjectHeading1(): ?int
    {
        return $this->subjectHeading1;
    }

    public function setSubjectHeading1(?int $subjectHeading1): self
    {
        $this->subjectHeading1 = $subjectHeading1;

        return $this;
    }

    public function getSubjectHeading2(): ?int
    {
        return $this->subjectHeading2;
    }

    public function setSubjectHeading2(?int $subjectHeading2): self
    {
        $this->subjectHeading2 = $subjectHeading2;

        return $this;
    }

    public function getPhysicalDescription(): ?string
    {
        return $this->physicalDescription;
    }

    public function setPhysicalDescription(?string $physicalDescription): self
    {
        $this->physicalDescription = $physicalDescription;

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

    public function getCms(): ?string
    {
        return $this->cms;
    }

    public function setCms(?string $cms): self
    {
        $this->cms = $cms;

        return $this;
    }

    public function getPeriodicity(): ?string
    {
        return $this->periodicity;
    }

    public function setPeriodicity(?string $periodicity): self
    {
        $this->periodicity = $periodicity;

        return $this;
    }

    public function getVol(): ?string
    {
        return $this->vol;
    }

    public function setVol(?string $vol): self
    {
        $this->vol = $vol;

        return $this;
    }

    public function getSerie(): ?string
    {
        return $this->serie;
    }

    public function setSerie(?string $serie): self
    {
        $this->serie = $serie;

        return $this;
    }

    public function getNserie(): ?string
    {
        return $this->nserie;
    }

    public function setNserie(?string $nserie): self
    {
        $this->nserie = $nserie;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $language): self
    {
        $this->language = $language;

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

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(?string $summary): self
    {
        $this->summary = $summary;

        return $this;
    }

    public function getNumbCopies(): ?int
    {
        return $this->numbCopies;
    }

    public function setNumbCopies(?int $numbCopies): self
    {
        $this->numbCopies = $numbCopies;

        return $this;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(?string $isbn): self
    {
        $this->isbn = $isbn;

        return $this;
    }

    public function getIssn(): ?string
    {
        return $this->issn;
    }

    public function setIssn(?string $issn): self
    {
        $this->issn = $issn;

        return $this;
    }

    public function getDl(): ?string
    {
        return $this->dl;
    }

    public function setDl(?string $dl): self
    {
        $this->dl = $dl;

        return $this;
    }

    public function getCdu1(): ?string
    {
        return $this->cdu1;
    }

    public function setCdu1(?string $cdu1): self
    {
        $this->cdu1 = $cdu1;

        return $this;
    }

    public function getCdu1Text(): ?string
    {
        return $this->cdu1Text;
    }

    public function setCdu1Text(?string $cdu1Text): self
    {
        $this->cdu1Text = $cdu1Text;

        return $this;
    }

    public function getCdu2(): ?string
    {
        return $this->cdu2;
    }

    public function setCdu2(?string $cdu2): self
    {
        $this->cdu2 = $cdu2;

        return $this;
    }

    public function getCdu2Text(): ?string
    {
        return $this->cdu2Text;
    }

    public function setCdu2Text(?string $cdu2Text): self
    {
        $this->cdu2Text = $cdu2Text;

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

    /**
     * @return Collection|Authority[]
     */
    public function getAuthority(): Collection
    {
        return $this->authority;
    }

    public function addAuthority(Authority $authority): self
    {
        if (!$this->authority->contains($authority)) {
            $this->authority[] = $authority;
            $authority->addCatalogue($this);
        }

        return $this;
    }

    public function removeAuthority(Authority $authority): self
    {
        if ($this->authority->contains($authority)) {
            $this->authority->removeElement($authority);
            $authority->removeCatalogue($this);
        }

        return $this;
    }
    
        
    /**
     * @return Collection|Item[]
     */
    public function getItems():Collection{
        return $this->items;
    }
    
    /**
     * @return Collection|Issue[]
     */
    public function getIssues():Collection{
        return $this->issues;
    }

}
