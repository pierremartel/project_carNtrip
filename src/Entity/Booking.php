<?php

namespace App\Entity;

use App\Repository\BookingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BookingRepository::class)
 */
class Booking
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
    private $pickupDate;

    /**
     * @ORM\Column(type="date")
     */
    private $dropoffDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pickupLocation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dropoffLocation;

    /**
     * @ORM\Column(type="time")
     */
    private $pickupTime;

    /**
     * @ORM\Column(type="time")
     */
    private $dropoffTime;

    /**
     * @ORM\ManyToOne(targetEntity=Car::class, inversedBy="bookings")
     */
    private $car;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="bookings")
     */
    private $user;

    // /**
    //  * @ORM\OneToMany(targetEntity=User::class, mappedBy="booking")
    //  */
    // private $user;

    // public function __construct()
    // {
    //     $this->user = new ArrayCollection();
    // }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPickupDate(): ?\DateTimeInterface
    {
        return $this->pickupDate;
    }

    public function setPickupDate(\DateTimeInterface $pickupDate): self
    {
        $this->pickupDate = $pickupDate;

        return $this;
    }

    public function getDropoffDate(): ?\DateTimeInterface
    {
        return $this->dropoffDate;
    }

    public function setDropoffDate(\DateTimeInterface $dropoffDate): self
    {
        $this->dropoffDate = $dropoffDate;

        return $this;
    }

    public function getPickupLocation(): ?string
    {
        return $this->pickupLocation;
    }

    public function setPickupLocation(string $pickupLocation): self
    {
        $this->pickupLocation = $pickupLocation;

        return $this;
    }

    public function getDropoffLocation(): ?string
    {
        return $this->dropoffLocation;
    }

    public function setDropoffLocation(string $dropoffLocation): self
    {
        $this->dropoffLocation = $dropoffLocation;

        return $this;
    }

    public function getPickupTime(): ?\DateTimeInterface
    {
        return $this->pickupTime;
    }

    public function setPickupTime(\DateTimeInterface $pickupTime): self
    {
        $this->pickupTime = $pickupTime;

        return $this;
    }

    public function getDropoffTime(): ?\DateTimeInterface
    {
        return $this->dropoffTime;
    }

    public function setDropoffTime(\DateTimeInterface $dropoffTime): self
    {
        $this->dropoffTime = $dropoffTime;

        return $this;
    }

    public function getCar(): ?Car
    {
        return $this->car;
    }

    public function setCar(?Car $car): self
    {
        $this->car = $car;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    // /**
    //  * @return Collection<int, User>
    //  */
    // public function getUser(): Collection
    // {
    //     return $this->user;
    // }

    // public function addUser(User $user): self
    // {
    //     if (!$this->user->contains($user)) {
    //         $this->user[] = $user;
    //         $user->setBooking($this);
    //     }

    //     return $this;
    // }

    // public function removeUser(User $user): self
    // {
    //     if ($this->user->removeElement($user)) {
    //         // set the owning side to null (unless already changed)
    //         if ($user->getBooking() === $this) {
    //             $user->setBooking(null);
    //         }
    //     }

    //     return $this;
    // }
}
