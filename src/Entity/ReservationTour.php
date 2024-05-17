<?php

namespace App\Entity;

use App\Repository\ReservationTourRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationTourRepository::class)
 */
class ReservationTour
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
    private $dateFin;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbrPersonne;

    /**
     * @ORM\ManyToOne(targetEntity=TourPackage::class, inversedBy="TourPackage")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tourPackage;

    /**
     * @ORM\OneToOne(targetEntity=Payement::class, mappedBy="peyementTour", cascade={"persist", "remove"})
     */
    private $payement;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="tourReservation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

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

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

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

    public function getTourPackage(): ?TourPackage
    {
        return $this->tourPackage;
    }

    public function setTourPackage(?TourPackage $tourPackage): self
    {
        $this->tourPackage = $tourPackage;

        return $this;
    }

    public function getPayement(): ?Payement
    {
        return $this->payement;
    }

    public function setPayement(Payement $payement): self
    {
        // set the owning side of the relation if necessary
        if ($payement->getPeyementTour() !== $this) {
            $payement->setPeyementTour($this);
        }

        $this->payement = $payement;

        return $this;
    }

    public function getClient(): ?User
    {
        return $this->client;
    }

    public function setClient(?User $client): self
    {
        $this->client = $client;

        return $this;
    }
}
