<?php

namespace App\Entity;

use App\Repository\ReservationFlightRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationFlightRepository::class)
 */
class ReservationFlight
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDepart;

    /**
     * @ORM\Column(type="date")
     */
    private $dateArrivee;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbrPersonne;

    /**
     * @ORM\ManyToOne(targetEntity=Flight::class, inversedBy="flight")
     * @ORM\JoinColumn(nullable=false)
     */
    private $flight;

    /**
     * @ORM\OneToOne(targetEntity=Payement::class, mappedBy="payementFlight", cascade={"persist", "remove"})
     */
    private $payement;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="flightReservation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $clientId;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDepart(): ?\DateTimeInterface
    {
        return $this->dateDepart;
    }

    public function setDateDepart(\DateTimeInterface $dateDepart): self
    {
        $this->dateDepart = $dateDepart;

        return $this;
    }

    public function getDateArrivee(): ?\DateTimeInterface
    {
        return $this->dateArrivee;
    }

    public function setDateArrivee(\DateTimeInterface $dateArrivee): self
    {
        $this->dateArrivee = $dateArrivee;

        return $this;
    }

    public function getNbrPersonne(): ?int
    {
        return $this->nbrPersonne;
    }

    public function setNbrPersonne(int $nbrPersonne): self
    {
        $this->nbrPersonne = $nbrPersonne;

        return $this;
    }

    public function getFlight(): ?Flight
    {
        return $this->flight;
    }

    public function setFlight(?Flight $flight): self
    {
        $this->flight = $flight;

        return $this;
    }

    public function getPayement(): ?Payement
    {
        return $this->payement;
    }

    public function setPayement(Payement $payement): self
    {
        // set the owning side of the relation if necessary
        if ($payement->getPayementFlight() !== $this) {
            $payement->setPayementFlight($this);
        }

        $this->payement = $payement;

        return $this;
    }

    public function getClientId(): ?User
    {
        return $this->clientId;
    }

    public function setClientId(?User $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }

}
