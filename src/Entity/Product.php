<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
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
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=DetailProduct::class, mappedBy="product")
     */
    private $detailProducts;

    public function __construct()
    {
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

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
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
            $detailProduct->setProduct($this);
        }

        return $this;
    }

    public function removeDetailProduct(DetailProduct $detailProduct): self
    {
        if ($this->detailProducts->removeElement($detailProduct)) {
            // set the owning side to null (unless already changed)
            if ($detailProduct->getProduct() === $this) {
                $detailProduct->setProduct(null);
            }
        }

        return $this;
    }

}
