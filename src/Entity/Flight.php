<?php

namespace App\Entity;

use App\Repository\FlightRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FlightRepository::class)
 */
class Flight
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
    private $destination;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $airline;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $prix;

    /**
     * @ORM\OneToMany(targetEntity=ReservationFlight::class, mappedBy="flight")
     */
    private $flight;

    public function __construct()
    {
        $this->flight = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDestination(): ?string
    {
        return $this->destination;
    }

    public function setDestination(string $destination): self
    {
        $this->destination = $destination;

        return $this;
    }

    public function getAirline(): ?string
    {
        return $this->airline;
    }

    public function setAirline(string $airline): self
    {
        $this->airline = $airline;

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
     * @return Collection<int, ReservationFlight>
     */
    public function getFlight(): Collection
    {
        return $this->flight;
    }

    public function addFlight(ReservationFlight $flight): self
    {
        if (!$this->flight->contains($flight)) {
            $this->flight[] = $flight;
            $flight->setFlight($this);
        }

        return $this;
    }

    public function removeFlight(ReservationFlight $flight): self
    {
        if ($this->flight->removeElement($flight)) {
            // set the owning side to null (unless already changed)
            if ($flight->getFlight() === $this) {
                $flight->setFlight(null);
            }
        }

        return $this;
    }
}
