<?php
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class BienRecherche {
    
    /**
     * @Assert\Range(min=10000, max=10000000)
     */
    private $prixmax;
    
    /**
     * @Assert\Range(min=10, max=1000)
     */
    private $surfacemin;
    /**
     * @var integer|null
     */
    private $distance;

    /**
     * @var float|null
     */
    private $lat;

    /**
     * @var string|null
     */
    private $address;

    /**
     * @var float|null
     */
    private $lng;
    private $ville;
    
    public function getPrixmax(): ?int
    {
        return $this->prixmax;
    }

    public function setPrixmax(?int $prixmax): self
    {
        $this->prixmax = $prixmax;

        return $this;
    }

    public function getSurfacemin(): ?int
    {
        return $this->surfacemin;
    }

    public function setSurfacemin(?int $surfacemin): self
    {
        $this->surfacemin = $surfacemin;

        return $this;
    }
    
     public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }
    
    
        /**
     * @return int|null
     */
    public function getDistance(): ?int
    {
        return $this->distance;
    }

    /**
     * @param int|null $distance
     * @return PropertySearch
     */
    public function setDistance(?int $distance): self
    {
        $this->distance = $distance;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getLat(): ?float
    {
        return $this->lat;
    }

    /**
     * @param float|null $lat
     * @return PropertySearch
     */
    public function setLat(?float $lat): self
    {
        $this->lat = $lat;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getLng(): ?float
    {
        return $this->lng;
    }

    /**
     * @param float|null $lng
     * @return PropertySearch
     */
    public function setLng(?float $lng): self
    {
        $this->lng = $lng;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param null|string $address
     * @return PropertySearch
     */
    public function setAddress(?string $address): self
    {
        $this->address = $address;
        return $this;
    }
}



