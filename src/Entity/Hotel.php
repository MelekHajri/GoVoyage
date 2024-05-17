<?php

namespace App\Entity;

use App\Repository\HotelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HotelRepository::class)
 */
class Hotel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Adresse;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $prix;

    /**
     * @ORM\OneToMany(targetEntity=ReservationHotel::class, mappedBy="hotel")
     */
    private $Hotel;

    public function __construct()
    {
        $this->Hotel = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * @return Collection<int, ReservationHotel>
     */
    public function getHotel(): Collection
    {
        return $this->Hotel;
    }

    public function addHotel(ReservationHotel $hotel): self
    {
        if (!$this->Hotel->contains($hotel)) {
            $this->Hotel[] = $hotel;
            $hotel->setHotel($this);
        }

        return $this;
    }

    public function removeHotel(ReservationHotel $hotel): self
    {
        if ($this->Hotel->removeElement($hotel)) {
            // set the owning side to null (unless already changed)
            if ($hotel->getHotel() === $this) {
                $hotel->setHotel(null);
            }
        }

        return $this;
    }
}
