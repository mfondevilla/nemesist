<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\NotBlank
     * @Assert\Regex(
     * pattern = "/[a-zA-Z]+/",
     * message = "El título debe tener al menos un carácter alfabético"
     * )
     */
    private $subtitle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="uniform_title", type="string", length=200, nullable=true)
     */
    private $uniformTitle;

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
     * @ORM\Column(name="document_type", type="string", length=100, nullable=true)
     */
    private $documentType;

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
     * @var int|null
     *
     * @ORM\Column(name="pages", type="integer", nullable=true)
     */
    private $pages;

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
     * @ORM\Column(name="serie", type="string", length=100, nullable=true)
     */
    private $serie;

    /**
     * @var string|null
     *
     * @ORM\Column(name="language", type="string", length=250, nullable=true)
     */
    private $language;

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
     * @ORM\Column(name="CDU_2", type="string", length=200, nullable=true)
     */
    private $cdu2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CDU_1", type="string", length=200, nullable=true)
     */
    private $cdu1;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSubtitle(): string
    {
        return $this->subtitle;
    }

    public function setSubtitle(string $subtitle): self
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    public function getUniformTitle(): string
    {
        return $this->uniformTitle;
    }

    public function setUniformTitle(string $uniformTitle): self
    {
        $this->uniformTitle = $uniformTitle;

        return $this;
    }

    public function getPublisher(): string
    {
        return $this->publisher;
    }

    public function setPublisher(string $publisher): self
    {
        $this->publisher = $publisher;

        return $this;
    }

    public function getYearPublication(): string
    {
        return $this->yearPublication;
    }

    public function setYearPublication(string $yearPublication): self
    {
        $this->yearPublication = $yearPublication;

        return $this;
    }

    public function getPlacePublication(): string
    {
        return $this->placePublication;
    }

    public function setPlacePublication(string $placePublication): self
    {
        $this->placePublication = $placePublication;

        return $this;
    }

    public function getDocumentType(): string
    {
        return $this->documentType;
    }

    public function setDocumentType(string $documentType): self
    {
        $this->documentType = $documentType;

        return $this;
    }

    public function getCopyright(): string
    {
        return $this->copyright;
    }

    public function setCopyright(string $copyright): self
    {
        $this->copyright = $copyright;

        return $this;
    }

    public function getSubjectHeading1(): int
    {
        return $this->subjectHeading1;
    }

    public function setSubjectHeading1(int $subjectHeading1): self
    {
        $this->subjectHeading1 = $subjectHeading1;

        return $this;
    }

    public function getSubjectHeading2(): int
    {
        return $this->subjectHeading2;
    }

    public function setSubjectHeading2(int $subjectHeading2): self
    {
        $this->subjectHeading2 = $subjectHeading2;

        return $this;
    }

    public function getPhysicalDescription(): string
    {
        return $this->physicalDescription;
    }

    public function setPhysicalDescription(string $physicalDescription): self
    {
        $this->physicalDescription = $physicalDescription;

        return $this;
    }

    public function getPages(): int
    {
        return $this->pages;
    }

    public function setPages(int $pages): self
    {
        $this->pages = $pages;

        return $this;
    }

    public function getPeriodicity(): string
    {
        return $this->periodicity;
    }

    public function setPeriodicity(string $periodicity): self
    {
        $this->periodicity = $periodicity;

        return $this;
    }

    public function getVol(): string
    {
        return $this->vol;
    }

    public function setVol(string $vol): self
    {
        $this->vol = $vol;

        return $this;
    }

    public function getSerie(): string
    {
        return $this->serie;
    }

    public function setSerie(string $serie): self
    {
        $this->serie = $serie;

        return $this;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function setLanguage(string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getIsbn(): string
    {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): self
    {
        $this->isbn = $isbn;

        return $this;
    }

    public function getIssn(): string
    {
        return $this->issn;
    }

    public function setIssn(string $issn): self
    {
        $this->issn = $issn;

        return $this;
    }

    public function getDl(): string
    {
        return $this->dl;
    }

    public function setDl(string $dl): self
    {
        $this->dl = $dl;

        return $this;
    }

    public function getCdu2(): string
    {
        return $this->cdu2;
    }

    public function setCdu2(string $cdu2): self
    {
        $this->cdu2 = $cdu2;

        return $this;
    }

    public function getCdu1(): string
    {
        return $this->cdu1;
    }

    public function setCdu1(string $cdu1): self
    {
        $this->cdu1 = $cdu1;

        return $this;
    }


}
