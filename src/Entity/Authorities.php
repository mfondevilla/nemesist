<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Authorities
 *
 * @ORM\Table(name="authorities")
 * @ORM\Entity
 */
class Authorities
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
     * @ORM\Column(name="surname_1", type="string", length=250, nullable=false)
     */
    private $surname1;

    /**
     * @var string
     *
     * @ORM\Column(name="surname_2", type="string", length=250, nullable=false)
     */
    private $surname2;

    /**
     * @var string
     *
     * @ORM\Column(name="uri", type="string", length=200, nullable=false)
     */
    private $uri;

    public function getId(): int
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

    public function getSurname1(): ?string
    {
        return $this->surname1;
    }

    public function setSurname1(string $surname1): self
    {
        $this->surname1 = $surname1;

        return $this;
    }

    public function getSurname2(): ?string
    {
        return $this->surname2;
    }

    public function setSurname2(string $surname2): self
    {
        $this->surname2 = $surname2;

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


}
