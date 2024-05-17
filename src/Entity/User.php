<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $uuid;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="date")
     */
    private $DateNaissance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Numtel;

    /**
     * @ORM\OneToMany(targetEntity=Reviews::class, mappedBy="Client")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=ReservationFlight::class, mappedBy="clientId", orphanRemoval=true)
     */
    private $flightReservation;

    /**
     * @ORM\OneToMany(targetEntity=ReservationHotel::class, mappedBy="client", orphanRemoval=true)
     */
    private $hotelReservation;

    /**
     * @ORM\OneToMany(targetEntity=ReservationTour::class, mappedBy="client", orphanRemoval=true)
     */
    private $tourReservation;

    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->flightReservation = new ArrayCollection();
        $this->hotelReservation = new ArrayCollection();
        $this->tourReservation = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): self
    {
        $this->uuid = $uuid;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->uuid;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string)$this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->DateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $DateNaissance): self
    {
        $this->DateNaissance = $DateNaissance;

        return $this;
    }

    public function getNumtel(): ?string
    {
        return $this->Numtel;
    }

    public function setNumtel(string $Numtel): self
    {
        $this->Numtel = $Numtel;

        return $this;
    }

    /**
     * @return Collection<int, reviews>
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(reviews $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
            $user->setClient($this);
        }

        return $this;
    }

    public function removeUser(reviews $user): self
    {
        if ($this->user->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getClient() === $this) {
                $user->setClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ReservationFlight>
     */
    public function getFlightReservation(): Collection
    {
        return $this->flightReservation;
    }

    public function addFlightReservation(ReservationFlight $flightReservation): self
    {
        if (!$this->flightReservation->contains($flightReservation)) {
            $this->flightReservation[] = $flightReservation;
            $flightReservation->setClientId($this);
        }

        return $this;
    }

    public function removeFlightReservation(ReservationFlight $flightReservation): self
    {
        if ($this->flightReservation->removeElement($flightReservation)) {
            // set the owning side to null (unless already changed)
            if ($flightReservation->getClientId() === $this) {
                $flightReservation->setClientId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ReservationHotel>
     */
    public function getHotelReservation(): Collection
    {
        return $this->hotelReservation;
    }

    public function addHotelReservation(ReservationHotel $hotelReservation): self
    {
        if (!$this->hotelReservation->contains($hotelReservation)) {
            $this->hotelReservation[] = $hotelReservation;
            $hotelReservation->setClient($this);
        }

        return $this;
    }

    public function removeHotelReservation(ReservationHotel $hotelReservation): self
    {
        if ($this->hotelReservation->removeElement($hotelReservation)) {
            // set the owning side to null (unless already changed)
            if ($hotelReservation->getClient() === $this) {
                $hotelReservation->setClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ReservationTour>
     */
    public function getTourReservation(): Collection
    {
        return $this->tourReservation;
    }

    public function addTourReservation(ReservationTour $tourReservation): self
    {
        if (!$this->tourReservation->contains($tourReservation)) {
            $this->tourReservation[] = $tourReservation;
            $tourReservation->setClient($this);
        }

        return $this;
    }

    public function removeTourReservation(ReservationTour $tourReservation): self
    {
        if ($this->tourReservation->removeElement($tourReservation)) {
            // set the owning side to null (unless already changed)
            if ($tourReservation->getClient() === $this) {
                $tourReservation->setClient(null);
            }
        }

        return $this;
    }
}
