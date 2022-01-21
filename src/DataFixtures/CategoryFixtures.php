<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    const CATEGORIES = [
        [
            'name' => 'Salle de bain',
            'image' => 'salledebain.jpg',
        
        ],

        [
            'name' => 'Cuisine',
            'image' => 'cuisine.jpg',
        
        ],

        [
            'name' => 'Chambre',
            'image' => 'chambre.jpg',
        
        ],
        [
            'name' => 'Salon',
            'image' => 'sejour.jpg',
        
        ],
        [
            'name' => 'Bureau',
            'image' => 'bureau.jpg',
        
        ],
        [
            'name' => 'Terrasse',
            'image' => 'terrasse.jpg',
        
        ],
      
    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::CATEGORIES as $key => $data) {
        $category = new Categorie();
        $category->setName($data['name']);
        $category->setImage($data['image']);
            copy(
                __DIR__ . '/' . $data['image'],
                __DIR__ . '/../../public/uploads/categories/' . $data['image']
            );
        $manager->persist($category);
        $this->addReference('categorie_'. $key,$category);
        }

        $manager->flush();
    }
}
