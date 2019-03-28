<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Cocur\Slugify\Slugify;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
 

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImmoRepository")
 * @UniqueEntity("titre")
 * @Vich\Uploadable()
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
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fond;

    /**
     * @var File|null
     * @Assert\Image( mimeTypes={"image/png", "image/jpeg", "image/jpg", "image/svg+xml", "image/gif"})
     * @Vich\UploadableField(mapping="biens_fonds", fileNameProperty="fond")
     */
    private $fondFile;
  
    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $logos;

    /**
     * @var File|null
     * @Assert\Image( mimeTypes={"image/png", "image/jpeg", "image/jpg", "image/svg+xml", "image/gif"})
     * @Vich\UploadableField(mapping="biens_logos", fileNameProperty="logos")
     */
    private $logosFile;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $regions;

    /**
     * @var File|null
     * @Assert\Image( mimeTypes={"image/png", "image/jpeg", "image/jpg", "image/svg+xml", "image/gif"})
     * @Vich\UploadableField(mapping="biens_regions", fileNameProperty="regions")
     */
    private $regionsFile;
    
    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $rappelfonds;

    /**
     * @var File|null
     * @Assert\Image( mimeTypes={"image/png", "image/jpeg", "image/jpg", "image/svg+xml", "image/gif"})
     * @Vich\UploadableField(mapping="biens_rappelfonds", fileNameProperty="rappelfonds")
     */
    private $rappelfondsFile;

     /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $larges;

    /**
     * @var File|null
     * @Assert\Image( mimeTypes={"image/png", "image/jpeg", "image/jpg", "image/svg+xml", "image/gif"})
     * @Vich\UploadableField(mapping="biens_larges", fileNameProperty="larges")
     */
    private $largesFile;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $chambres;

    /**
     * @var File|null
     * @Assert\Image( mimeTypes={"image/png", "image/jpeg", "image/jpg", "image/svg+xml", "image/gif"})
     * @Vich\UploadableField(mapping="biens_chambres", fileNameProperty="chambres")
     */
    private $chambresFile;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $communs;

    /**
     * @var File|null
     * @Assert\Image( mimeTypes={"image/png", "image/jpeg", "image/jpg", "image/svg+xml", "image/gif"})
     * @Vich\UploadableField(mapping="biens_communs", fileNameProperty="communs")
     */
    private $communsFile;
    
    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $proprios;

    /**
     * @var File|null
     * @Assert\Image( mimeTypes={"image/png", "image/jpeg", "image/jpg", "image/svg+xml", "image/gif"})
     * @Vich\UploadableField(mapping="biens_proprios", fileNameProperty="proprios")
     */
    private $propriosFile;
    
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
     *     @Assert\Image( mimeTypes={"image/png", "image/jpeg", "image/jpg", "image/svg+xml", "image/gif"})
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

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;

    /**
     * @ORM\Column(type="float", scale=4, precision=6)
     */
    private $lat;

    /**
     * @ORM\Column(type="float", scale=4, precision=7)
     */
    private $lng;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $region;
    
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
    
    /**
     * @return null|string
     */
    public function getFond(): ?string
    {
        return $this->fond;
    }

    /**
     * @param null|string $fond
     * @return Immo
     */
    public function setFond(?string $fond): Immo
    {
        $this->fond = $fond;
        return $this;
    }

    /**
     * @return null|File
     */
    public function getFondFile(): ?File
    {
        return $this->fondFile;
    }

    /**
     * @param null|File $fondFile
     * @return Immo
     */
    public function setFondFile(?File $fondFile): Immo
    {
        $this->fondFile = $fondFile;
        if ($this->fondFile instanceof UploadedFile) {
            $this->updated_at = new \DateTime('now');
        }
        return $this;
    }

        
    /**
     * @return null|string
     */
    public function getLogos(): ?string
    {
        return $this->logos;
    }

    /**
     * @param null|string $logos
     * @return Immo
     */
    public function setLogos(?string $logos): Immo
    {
        $this->logos = $logos;
        return $this;
    }

    /**
     * @return null|File
     */
    public function getLogosFile(): ?File
    {
        return $this->logosFile;
    }

    /**
     * @param null|File $logosFile
     * @return Immo
     */
    public function setLogosFile(?File $logosFile): Immo
    {
        $this->logosFile = $logosFile;
        if ($this->logosFile instanceof UploadedFile) {
            $this->updated_at = new \DateTime('now');
        }
        return $this;
    }
    
    
     /**
     * @return null|string
     */
    public function getLarges(): ?string
    {
        return $this->larges;
    }

    /**
     * @param null|string $larges
     * @return Immo
     */
    public function setLarges(?string $larges): Immo
    {
        $this->larges = $larges;
        return $this;
    }

    /**
     * @return null|File
     */
    public function getLargesFile(): ?File
    {
        return $this->largesFile;
    }

    /**
     * @param null|File $largesFile
     * @return Immo
     */
    public function setLargesFile(?File $largesFile): Immo
    {
        $this->largesFile = $largesFile;
        if ($this->largesFile instanceof UploadedFile) {
            $this->updated_at = new \DateTime('now');
        }
        return $this;
    }
 
    
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getRappelfonds(): ?string
    {
        return $this->rappelfonds;
    }

    public function setRappelfonds(?string $rappelfonds): self
    {
        $this->rappelfonds = $rappelfonds;

        return $this;
    }
    
     /**
     * @return null|File
     */
 
    public function getRappelfondsFile(): ?File
    {
        return $this->rappelfondsFile;
    }

    /**
     * @param null|File $rappelfondsFile
     * @return Immo
     */
    public function setRappelfondsFile(?File $rappelfondsFile): Immo
    {
        $this->rappelfondsFile = $rappelfondsFile;
        if ($this->rappelfondsFile instanceof UploadedFile) {
            $this->updated_at = new \DateTime('now');
        }
        return $this;
    }

    public function getRegions(): ?string
    {
        return $this->regions;
    }

    public function setRegions(?string $regions): self
    {
        $this->regions = $regions;

        return $this;
    }
     /**
     * @return null|File
     */
 
    public function getRegionsFile(): ?File
    {
        return $this->regionsFile;
    }

    /**
     * @param null|File $regionsFile
     * @return Immo
     */
    public function setRegionsFile(?File $regionsFile): Immo
    {
        $this->regionsFile = $regionsFile;
        if ($this->regionsFile instanceof UploadedFile) {
            $this->updated_at = new \DateTime('now');
        }
        return $this;
    }

    
    
    public function getChambres(): ?string
    {
        return $this->chambres;
    }

    public function setChambres(?string $chambres): self
    {
        $this->chambres = $chambres;

        return $this;
    }
     /**
     * @return null|File
     */
 
    public function getChambresFile(): ?File
    {
        return $this->chambresFile;
    }

    /**
     * @param null|File $chambresFile
     * @return Immo
     */
    public function setChambresFile(?File $chambresFile): Immo
    {
        $this->chambresFile = $chambresFile;
        if ($this->chambresFile instanceof UploadedFile) {
            $this->updated_at = new \DateTime('now');
        }
        return $this;
    }

    public function getCommuns(): ?string
    {
        return $this->communs;
    }

    public function setCommuns(?string $communs): self
    {
        $this->communs = $communs;

        return $this;
    }
     /**
     * @return null|File
     */
 
    public function getCommunsFile(): ?File
    {
        return $this->communsFile;
    }

    /**
     * @param null|File $communsFile
     * @return Immo
     */
    public function setCommunsFile(?File $communsFile): Immo
    {
        $this->communsFile = $communsFile;
        if ($this->communsFile instanceof UploadedFile) {
            $this->updated_at = new \DateTime('now');
        }
        return $this;
    }

    public function getProprios(): ?string
    {
        return $this->proprios;
    }

    public function setProprios(?string $proprios): self
    {
        $this->proprios = $proprios;

        return $this;
    }
     /**
     * @return null|File
     */
 
    public function getPropriosFile(): ?File
    {
        return $this->propriosFile;
    }

    /**
     * @param null|File $propriosFile
     * @return Immo
     */
    public function setPropriosFile(?File $propriosFile): Immo
    {
        $this->propriosFile = $propriosFile;
        if ($this->propriosFile instanceof UploadedFile) {
            $this->updated_at = new \DateTime('now');
        }
        return $this;
    }

    public function getLat(): ?float
    {
        return $this->lat;
    }

    public function setLat(float $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLng(): ?float
    {
        return $this->lng;
    }

    public function setLng(float $lng): self
    {
        $this->lng = $lng;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

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

}
