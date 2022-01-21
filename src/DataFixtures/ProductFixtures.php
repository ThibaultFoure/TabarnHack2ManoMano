<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Product;

class ProductFixtures extends Fixture
{
    const PRODUCTS = [
        [
            'name' => 'Baignoire',
            'image' => 'objet1Standard.png',
            'price' => 499,
            'description' => 'baignoire en cuivre',
        ],
        [
            'name' => 'Lavabo',
            'image' => 'objet2Standard.png',
            'price' => 174,
            'description' => 'Lavabo en pierre',
        ],
        [
            'name' => 'Miroir',
            'image' => 'objet3Standard.png',
            'price' => 89,
            'description' => 'Miroire en bronze',
        ],
        [
            'name' => 'Porte serviettes',
            'image' => 'objet4Standard.png',
            'price' => 115,
            'description' => 'Porte serviettes en bronze',
        ],  
        [
            'name' => 'Lavabo',
            'image' => 'objet1.png',
            'price' => 189,
            'description' => 'Lavabo en résine',
        ],
        [
            'name' => 'Corbeille',
            'image' => 'objet2.png',
            'price' => 71,
            'description' => 'Corbeille en métal',
        ],
        [
            'name' => 'Bougies',
            'image' => 'objet3.png',
            'price' => 36,
            'description' => 'bougies parfumées',
        ],
        [
            'name' => 'Robinet',
            'image' => 'objet4.png',
            'price' => 184,
            'description' => 'Robinet en or',
        ],  
    ];

    public function load(ObjectManager $manager): void
    {        foreach (self::PRODUCTS as $key => $productName) {
            $product = new Product();
            $product->setName($productName['name']);
            $product->setImage($productName['image']);
            $product->setPrice($productName['price']);
            $product->setDescription($productName['description']);
            copy(
                __DIR__ . '/' . $productName['image'],
                __DIR__ . '/../../public/uploads/styles/' . $productName['image']
            );
            $manager->persist($product);
        }
        $manager->flush();
    }
}