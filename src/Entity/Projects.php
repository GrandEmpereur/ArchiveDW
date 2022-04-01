<?php

namespace App\Entity;


use App\Repository\ProjectsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ProjectsRepository::class)
 * @Vich\Uploadable
 */
class Projects
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $img;

    /**
     * @Vich\UploadableField(mapping="imageproject", fileNameProperty="img")
     * @var File
     */

    public $imageFile;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="array")
     * @var string[]
     */
    private $technos = [];

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $urlType;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg( $img): self
    {
        $this->img = $img;

        return $this;
    }

    /**
     * @return File/null
     */
    public function getImgFile(): ?File
    {
        return $this->imageFile;
    }

    /**
     * @param File/null $imgFile
     */
    public function setImgFile(?File $imageFile = null)
    {
        $this->imageFile = $imageFile;

    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTechnos(): ?array
    {
        return $this->technos;
    }

    public function setTechnos(array $technos): self
    {
        $this->technos = $technos;

        return $this;
    }

    public function getUrlType(): ?string
    {
        return $this->urlType;
    }

    public function setUrlType(?string $urlType): self
    {
        $this->urlType = $urlType;

        return $this;
    }
}
