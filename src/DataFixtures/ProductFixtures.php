<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Product;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ProductFixtures extends Fixture implements DependentFixtureInterface
{
    const PRODUCTS = [
        [
            'name' => 'Baignoire',
            'image' => 'objet1Standard.png',
            'price' => 499,
            'description' => 'Baignoire en cuivre',
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
            'description' => 'Miroir en bronze',
        ],
        [
            'name' => 'Porte-serviette',
            'image' => 'objet4Standard.png',
            'price' => 115,
            'description' => 'Porte-serviette en bronze',
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
            'description' => 'Bougies parfumées',
        ],
        [
            'name' => 'Robinet',
            'image' => 'objet4.png',
            'price' => 184,
            'description' => 'Robinet en or',
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::PRODUCTS as $key => $productName) {
            $product = new Product();
            $product->setName($productName['name']);
            $product->setImage($productName['image']);
            $product->setPrice($productName['price']);
            $product->setDescription($productName['description']);
            copy(
                __DIR__ . '/' . $productName['image'],
                __DIR__ . '/../../public/uploads/styles/' . $productName['image']
            );
            $product->setCategory($this->getReference('categorie_0'));
            $product->setStyle($this->getReference('style_' . rand(0,5)));
            $manager->persist($product);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
            StyleFixtures::class,
        ];
    }
}
