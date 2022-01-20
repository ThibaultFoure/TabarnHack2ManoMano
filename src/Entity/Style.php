<?php

namespace App\Entity;

use App\Repository\StyleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StyleRepository::class)
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
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="styles")
     */
    private $categorie;

    /**
     * @ORM\OneToMany(targetEntity=DetailProduct::class, mappedBy="style")
     */
    private $detailProducts;

    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->detailProducts = new ArrayCollection();
    
    
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
     * @return Collection|DetailProduct[]
     */
    public function getDetailProducts(): Collection
    {
        return $this->detailProducts;
    }

    public function addDetailProduct(DetailProduct $detailProduct): self
    {
        if (!$this->detailProducts->contains($detailProduct)) {
            $this->detailProducts[] = $detailProduct;
            $detailProduct->setStyle($this);
        }

        return $this;
    }

    public function removeDetailProduct(DetailProduct $detailProduct): self
    {
        if ($this->detailProducts->removeElement($detailProduct)) {
            // set the owning side to null (unless already changed)
            if ($detailProduct->getStyle() === $this) {
                $detailProduct->setStyle(null);
            }
        }

        return $this;
    }

}
