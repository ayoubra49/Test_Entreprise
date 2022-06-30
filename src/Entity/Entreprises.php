<?php

namespace App\Entity;

use App\Repository\EntreprisesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntreprisesRepository::class)]
class Entreprises
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $villeimm;

    #[ORM\Column(type: 'integer')]
    private $numsiren;

    #[ORM\Column(type: 'datetime')]
    public $date_creation;

    #[ORM\Column(type: 'datetime')]
    public $date_imm;

    #[ORM\Column(type: 'decimal', precision: 10, scale: '0')]
    private $capitale;

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

    public function getVilleimm(): ?string
    {
        return $this->villeimm;
    }

    public function setVilleimm(string $villeimm): self
    {
        $this->villeimm = $villeimm;

        return $this;
    }

    public function getNumsiren(): ?int
    {
        return $this->numsiren;
    }

    public function setNumsiren(int $numsiren): self
    {
        $this->numsiren = $numsiren;

        return $this;
    }

    public function getDateCreation(): ?\DateTime
    {
        return $this->date_creation;
    }

    public function setDateCreation(\DateTime $date_creation): self
    {
        $this->date_creation = $date_creation;

        return $this;
    }

    public function getDateImm(): ?\DateTime
    {
        return $this->date_imm;
    }

    public function setDateImm(\DateTime $date_imm): self
    {
        $this->date_imm = $date_imm;

        return $this;
    }

    public function getCapitale(): ?string
    {
        return $this->capitale;
    }

    public function setCapitale(string $capitale): self
    {
        $this->capitale = $capitale;

        return $this;
    }
}
