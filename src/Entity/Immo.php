<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Cocur\Slugify\Slugify;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/*use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
 */

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImmoRepository")
 * @UniqueEntity("titre")
 * 
 */
class Immo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    
  
    
  

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=5, max=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Range(min=1000, max=10000000)
     */
    private $prix;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Range(min=10, max=1000)
     */
    private $surface;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Range(min=1, max=100000)
     */
    private $surface_terrain;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pays;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ville;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Regex(
     *     pattern="/^[0-9]{5}$/",
     *     match=true,
     *     message="code postal invalide"
     * )
     */
    private $code_postal;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $vendu;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Photos", mappedBy="immo", orphanRemoval=true, 
     * cascade={"persist"})
     */
    private $photos;
    
    /**
     * @Assert\All({
     *     @Assert\Image(mimeTypes="image/jpeg")
     * })
     */
    private $photoFiles;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description_region;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description_precise;
    
    public function  __construct()
    {
        $this->date=new \DateTime();
        $this->photos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }
    
    public function getSlug(): string
    {
        return (new Slugify())->slugify($this->titre);        
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(?int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(?int $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getSurfaceTerrain(): ?int
    {
        return $this->surface_terrain;
    }

    public function setSurfaceTerrain(?int $surface_terrain): self
    {
        $this->surface_terrain = $surface_terrain;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(?string $pays): self
    {
        $this->pays = $pays;

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

    public function getCodePostal(): ?int
    {
        return $this->code_postal;
    }

    public function setCodePostal(?int $code_postal): self
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    public function getVendu(): ?string
    {
        return $this->vendu;
    }

    public function setVendu(?string $vendu): self
    {
        $this->vendu = $vendu;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
    
   

    /**
     * @return Collection|Photos[]
     */
    public function getPhotos(): Collection
    {
        return $this->photos;
    }

    public function addPhoto(Photos $photo): self
    {
        if (!$this->photos->contains($photo)) {
            $this->photos[] = $photo;
            $photo->setImmo($this);
        }

        return $this;
    }

    public function removePhoto(Photos $photo): self
    {
        if ($this->photos->contains($photo)) {
            $this->photos->removeElement($photo);
            // set the owning side to null (unless already changed)
            if ($photo->getImmo() === $this) {
                $photo->setImmo(null);
            }
        }

        return $this;
    }
    
    public function getPhotoFiles()
    {
        return $this->photoFiles;
    }

    public function setPhotoFiles($photoFiles): self
    {
        foreach($photoFiles as $photoFile){
            $photo= new Photos();
            $photo->setImageFile($photoFile);
            $this->addPhoto($photo);
        }
        $this->photoFiles = $photoFiles;

        return $this;
    }

    public function getDescriptionRegion(): ?string
    {
        return $this->description_region;
    }

    public function setDescriptionRegion(?string $description_region): self
    {
        $this->description_region = $description_region;

        return $this;
    }

    public function getDescriptionPrecise(): ?string
    {
        return $this->description_precise;
    }

    public function setDescriptionPrecise(?string $description_precise): self
    {
        $this->description_precise = $description_precise;

        return $this;
    }
}
