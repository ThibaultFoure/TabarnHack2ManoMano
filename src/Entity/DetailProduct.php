<?php

namespace App\Entity;

use App\Repository\DetailProductRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DetailProductRepository::class)
 */
class DetailProduct
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cheapProduct;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $averageProduct;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $expensiveProduct;

    /**
     * @ORM\ManyToOne(targetEntity=Style::class, inversedBy="detailProducts")
     */
    private $style;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="detailProducts")
     */
    private $product;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getCheapProduct(): ?string
    {
        return $this->cheapProduct;
    }

    public function setCheapProduct(string $cheapProduct): self
    {
        $this->cheapProduct = $cheapProduct;

        return $this;
    }

    public function getAverageProduct(): ?string
    {
        return $this->averageProduct;
    }

    public function setAverageProduct(string $averageProduct): self
    {
        $this->averageProduct = $averageProduct;

        return $this;
    }

    public function getExpensiveProduct(): ?string
    {
        return $this->expensiveProduct;
    }

    public function setExpensiveProduct(string $expensiveProduct): self
    {
        $this->expensiveProduct = $expensiveProduct;

        return $this;
    }

    public function getStyle(): ?Style
    {
        return $this->style;
    }

    public function setStyle(?Style $style): self
    {
        $this->style = $style;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }
}
