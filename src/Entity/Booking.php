<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BookingRepository")
 */
class Booking
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="bookings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Booker;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Immo", inversedBy="bookings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bien;

    /**
     * @ORM\Column(type="datetime")
     */
    private $entreDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $sortieDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creele;

    /**
     * @ORM\Column(type="float")
     */
    private $montant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBooker(): ?User
    {
        return $this->Booker;
    }

    public function setBooker(?User $Booker): self
    {
        $this->Booker = $Booker;

        return $this;
    }

    public function getBien(): ?Immo
    {
        return $this->bien;
    }

    public function setBien(?Immo $bien): self
    {
        $this->bien = $bien;

        return $this;
    }

    public function getEntreDate(): ?\DateTimeInterface
    {
        return $this->entreDate;
    }

    public function setEntreDate(\DateTimeInterface $entreDate): self
    {
        $this->entreDate = $entreDate;

        return $this;
    }

    public function getSortieDate(): ?\DateTimeInterface
    {
        return $this->sortieDate;
    }

    public function setSortieDate(\DateTimeInterface $sortieDate): self
    {
        $this->sortieDate = $sortieDate;

        return $this;
    }

    public function getCreele(): ?\DateTimeInterface
    {
        return $this->creele;
    }

    public function setCreele(\DateTimeInterface $creele): self
    {
        $this->creele = $creele;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }
}
