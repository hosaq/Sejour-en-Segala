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
    
}



