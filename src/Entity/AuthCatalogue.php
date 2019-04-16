<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AuthCatalogue
 *
 * @ORM\Table(name="auth_catalogue", indexes={@ORM\Index(name="id_catalogue", columns={"id_catalogue"}), @ORM\Index(name="id_authority", columns={"id_authority"})})
 * @ORM\Entity
 */
class AuthCatalogue
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_author_catalogue", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAuthorCatalogue;

    /**
     * @var bool
     *
     * @ORM\Column(name="translator", type="boolean", nullable=false)
     */
    private $translator;

    /**
     * @var bool
     *
     * @ORM\Column(name="author", type="boolean", nullable=false)
     */
    private $author;

    /**
     * @var \Catalogue
     *
     * @ORM\ManyToOne(targetEntity="Catalogue")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_catalogue", referencedColumnName="id")
     * })
     */
    private $idCatalogue;

    /**
     * @var \Authorities
     *
     * @ORM\ManyToOne(targetEntity="Authorities")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_authority", referencedColumnName="id")
     * })
     */
    private $idAuthority;

    public function getIdAuthorCatalogue(): int
    {
        return $this->idAuthorCatalogue;
    }

    public function getTranslator(): ?bool
    {
        return $this->translator;
    }

    public function setTranslator(bool $translator): self
    {
        $this->translator = $translator;

        return $this;
    }

    public function getAuthor(): ?bool
    {
        return $this->author;
    }

    public function setAuthor(bool $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getIdCatalogue(): ?Catalogue
    {
        return $this->idCatalogue;
    }

    public function setIdCatalogue(?Catalogue $idCatalogue): self
    {
        $this->idCatalogue = $idCatalogue;

        return $this;
    }

    public function getIdAuthority(): ?Authorities
    {
        return $this->idAuthority;
    }

    public function setIdAuthority(?Authorities $idAuthority): self
    {
        $this->idAuthority = $idAuthority;

        return $this;
    }


}
