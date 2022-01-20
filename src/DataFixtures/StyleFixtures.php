<?php

namespace App\DataFixtures;

use App\Entity\Style;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StyleFixtures extends Fixture
{
    
       CONST STYLES = [
        [
            'name' => 'Moderne',
            'image' => 'salledebain1.jpg',
            'categorie' => 'categorie_0',
        ],
        [
            'name' => 'Bohéme',
            'image' => 'salledebain2.jpg',
            'categorie' => 'categorie_0',
        ],
        [
            'name' => 'Rustique',
            'image' => 'salledebain3.jpg',
            'categorie' => 'categorie_0',
        ],
        [
            'name' => 'Bois',
            'image' => 'salledebain4.jpg',
            'categorie' => 'categorie_0',
        ],
        [
            'name' => 'Classic',
            'image' => 'salledebain5.jpg',
            'categorie' => 'categorie_0',
        ],
        [
            'name' => 'Vinatge',
            'image' => 'salledebain6.jpg',
            'categorie' => 'categorie_0',
        ],
    ];
       public function load(ObjectManager $manager): void
        {
            foreach (self::STYLES as $key => $styleName) {
                $style = new Style();
                $style->setName($styleName['name']);
                $style->setImage($styleName['image']);
                $style->SetCategorie($this->getReference('categorie_0'));
                $manager->persist($style);
    
            }
    
            $manager->flush();
        }

    public function getDependencies()

    {
        return [


            CategoryFixtures::class,

        ];
    }
    }