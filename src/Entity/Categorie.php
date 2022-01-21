<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 * @Vich\Uploadable
 */
class Categorie
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Style::class, mappedBy="categorie")
     */
    private $styles;

    /**
     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="category")
     */
    private $products;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @Vich\UploadableField(mapping="category_file", fileNameProperty="image")
     * @var File
     */
    private $styleFile;

    public function __construct()
    {
        $this->styles = new ArrayCollection();
        $this->products = new ArrayCollection();
        $this->createdAt = new DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Style[]
     */
    public function getStyles(): Collection
    {
        return $this->styles;
    }

    public function addStyle(Style $style): self
    {
        if (!$this->styles->contains($style)) {
            $this->styles[] = $style;
            $style->setCategorie($this);
        }

        return $this;
    }

    public function removeStyle(Style $style): self
    {
        if ($this->styles->removeElement($style)) {
            // set the owning side to null (unless already changed)
            if ($style->getCategorie() === $this) {
                $style->setCategorie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->setCategory($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getCategory() === $this) {
                $product->setCategory(null);
            }
        }

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get the value of styleFile
     *
     * @return  File
     */ 
    public function getStyleFile()
    {
        return $this->styleFile;
    }

    /**
     * Set the value of styleFile
     *
     * @param  File  $styleFile
     *
     * @return  self
     */ 
    public function setStyleFile(File $styleFile)
    {
        $this->styleFile = $styleFile;

        return $this;
    }
}
