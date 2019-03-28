<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Cocur\Slugify\Slugify;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InteretsRepository")
 * @UniqueEntity("nom")
 * @Vich\Uploadable()
 */
class Interets
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lien;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $type1;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $type2;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $presentation;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $region;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $lat;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $lng;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $photo1;
    
    /**
     * @var File|null
     * @Assert\Image( mimeTypes={"image/png", "image/jpeg", "image/jpg", "image/svg+xml", "image/gif"})
     * @Vich\UploadableField(mapping="interets_photo1", fileNameProperty="photo1")
     */
    private $photo1File;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $photo2;
    
     /**
     * @var File|null
     * @Assert\Image( mimeTypes={"image/png", "image/jpeg", "image/jpg", "image/svg+xml", "image/gif"})
     * @Vich\UploadableField(mapping="interets_photo2", fileNameProperty="photo2")
     */
    private $photo2File;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $photo3;
    
     /**
     * @var File|null
     * @Assert\Image( mimeTypes={"image/png", "image/jpeg", "image/jpg", "image/svg+xml", "image/gif"})
     * @Vich\UploadableField(mapping="interets_photo3", fileNameProperty="photo3")
     */
    private $photo3File;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $pays;

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
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;
    
    public function  __construct()
    {
        $this->date=new \DateTime();
    }

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }
    
    public function getSlug(): string
    {
        return (new Slugify())->slugify($this->nom);        
    }

    public function getLien(): ?string
    {
        return $this->lien;
    }

    public function setLien(?string $lien): self
    {
        $this->lien = $lien;

        return $this;
    }

    public function getType1(): ?string
    {
        return $this->type1;
    }

    public function setType1(string $type1): self
    {
        $this->type1 = $type1;

        return $this;
    }

    public function getType2(): ?string
    {
        return $this->type2;
    }

    public function setType2(?string $type2): self
    {
        $this->type2 = $type2;

        return $this;
    }

    public function getPresentation(): ?string
    {
        return $this->presentation;
    }

    public function setPresentation(?string $presentation): self
    {
        $this->presentation = $presentation;

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

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(?string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getLat(): ?float
    {
        return $this->lat;
    }

    public function setLat(?float $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLng(): ?float
    {
        return $this->lng;
    }

    public function setLng(?float $lng): self
    {
        $this->lng = $lng;

        return $this;
    }
    
    /**
     * @return null|string
     */
    public function getPhoto1(): ?string
    {
        return $this->photo1;
    }
    
     /**
     * @param null|string $photo1
     * @return Interets
     */
    public function setPhoto1(?string $photo1): Interets
    {
        $this->photo1 = $photo1;

        return $this;
    }
    
    /**
     * @return null|File
     */ 
    public function getPhoto1File(): ?File
    {
        return $this->photo1File;
    }

    /**
     * @param null|File $photo1File
     * @return Interets
     */
    public function setPhoto1File(?File $photo1File): Interets
    {
        $this->photo1File = $photo1File;
        if ($this->photo1File instanceof UploadedFile) {
            $this->updated_at = new \DateTime('now');
        }
        return $this;
    }
    
    /**
     * @return null|string
     */
    public function getPhoto2(): ?string
    {
        return $this->photo2;
    }
    
    /**
     * @param null|string $photo2
     * @return Interets
     */
    public function setPhoto2(?string $photo2): Interets
    {
        $this->photo2 = $photo2;

        return $this;
    }
    
    /**
     * @return null|File
     */
 
    public function getPhoto2File(): ?File
    {
        return $this->photo2File;
    }

    /**
     * @param null|File $photo2File
     * @return Interets
     */
    public function setPhoto2File(?File $photo2File): Interets
    {
        $this->photo2File = $photo2File;
        if ($this->photo2File instanceof UploadedFile) {
            $this->updated_at = new \DateTime('now');
        }
        return $this;
    }
    
    /**
     * @return null|string
     */
    public function getPhoto3(): ?string
    {
        return $this->photo3;
    }
    
    /**
     * @param null|string $photo3
     * @return Interets
     */
    public function setPhoto3(?string $photo3): Interets
    {
        $this->photo3 = $photo3;

        return $this;
    }

     /**
     * @return null|File
     */
 
    public function getPhoto3File(): ?File
    {
        return $this->photo3File;
    }

    /**
     * @param null|File $photo3File
     * @return Interets
     */
    public function setPhoto3File(?File $photo3File): Interets
    {
        $this->photo3File = $photo3File;
        if ($this->photo3File instanceof UploadedFile) {
            $this->updated_at = new \DateTime('now');
        }
        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

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

    public function getCodePostal(): ?int
    {
        return $this->code_postal;
    }

    public function setCodePostal(?int $code_postal): self
    {
        $this->code_postal = $code_postal;

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

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
