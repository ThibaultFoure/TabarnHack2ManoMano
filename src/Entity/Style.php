<?php

namespace App\Entity;

use App\Repository\StyleRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * @ORM\Entity(repositoryClass=StyleRepository::class)
 * @Vich\Uploadable
 */
class Style
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
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="style")
     */
    private $products;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="styles")
     */
    private $categorie;

    /**
      * @Vich\UploadableField(mapping="style_file", fileNameProperty="image")
      * @var File
      */
      private $styleFile;

      /**
       * @ORM\Column(type="datetime")
       */
      private $updatedAt;

    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->updatedAt = new DateTimeImmutable();
    
    
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

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
            $product->setStyle($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getStyle() === $this) {
                $product->setStyle(null);
            }
        }

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

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

      public function getUpdatedAt(): ?\DateTimeInterface
      {
          return $this->updatedAt;
      }

      public function setUpdatedAt(\DateTimeInterface $updatedAt): self
      {
          $this->updatedAt = $updatedAt;

          return $this;
      }
}
