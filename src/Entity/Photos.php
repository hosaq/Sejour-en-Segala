<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
#use Symfony\Component\Validator\Constraints as Assert;
#use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PhotosRepository")
 * @Vich\Uploadable()
 */
class Photos
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
    private $filename;
    
      /**
     * @var File
     * @Vich\UploadableField(mapping="biens_image", fileNameProperty="filename")
     */
    private $imageFile;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Immo", inversedBy="photos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $immo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(?string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }

    public function getImmo(): ?Immo
    {
        return $this->immo;
    }

    public function setImmo(?Immo $immo): self
    {
        $this->immo = $immo;

        return $this;
    }
     public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageFile(?File $imageFile): self
    {
        $this->imageFile = $imageFile;

        return $this;
    }
}
