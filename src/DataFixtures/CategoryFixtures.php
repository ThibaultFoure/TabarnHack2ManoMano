<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
  
       public function load(ObjectManager $manager): void
        {
                $category = new Categorie();
                $category->setName('salle de bain');
                $manager->persist($category);
                $this->addReference('categorie_0',$category);
            

        $manager->flush();
    }
}
