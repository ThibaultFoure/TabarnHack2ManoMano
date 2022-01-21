<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Product;

class AppFixtures extends Fixture
{
    const PRODUCTS = [
        [
            'name' => 'Scie circulaire',
            'image' => 'scie.jpg',
            'price' => 200,
            'description' => 'une scie circulaire',
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
            $manager->persist($product);
        }
        $manager->flush();
    }
}
