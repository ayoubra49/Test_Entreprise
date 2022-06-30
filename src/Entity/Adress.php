<?php

namespace App\Entity;

use App\Repository\AdressRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdressRepository::class)]
class Adress
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /**
   * @ORM\OneToOne(targetEntity="App\Entity\Entreprises", cascade={"persist"})
   */
    public $entr_id;

    #[ORM\Column(type: 'string', length: 255)]
    private $adress;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEntrId(): ?int
    {
        return $this->entr_id;
    }

    public function setEntrId(int $entr_id): self
    {
        $this->entr_id = $entr_id;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }
}
