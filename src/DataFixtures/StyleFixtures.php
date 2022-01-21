<?php

namespace App\DataFixtures;

use App\Entity\Style;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class StyleFixtures extends Fixture implements DependentFixtureInterface
{

    const STYLES = [
        [
            'name' => 'Épuré',
            'image' => 'salledebain3.jpg',
            'categorie' => 'categorie_0',
            'description' => 'Envie de design dans votre salle de bain ? Le style épuré conviendra à vos attentes. Il apportera à votre pièce une touche de sérénité et de détente sans aucun superflu.'
        ],
        [
            'name' => 'Luxe',
            'image' => 'salledebain1.jpg',
            'categorie' => 'categorie_0',
            'description' => "L’or brossé est véritablement la matière tendance pour décorer votre salle de bain. La robinetterie dorée, il fallait y penser ! Pourtant, là réside tout le charme d’une salle de bain décorée avec style."
        ],
        [
            'name' => 'Moderne',
            'image' => 'salledebain2.jpg',
            'categorie' => 'categorie_0',
            'description' => "Améliorez le standing de votre salle de bains tout en délicatesse en choisissant le style moderne : un usage subtil de matières et textures contemporaines qui donnent à la pièce un cachet intemporel."
        ],
        [
            'name' => 'Zen',
            'image' => 'salledebain4.jpg',
            'categorie' => 'categorie_0',
            'description' => 'Réaménagez votre salle de bain pour créer un espace de détente parfaite aussi bien pour votre esprit que votre corps. La simplicité et le charme du style zen transformeront votre salle de bain en havre de repos et de rafraîchissement.'
        ],
        [
            'name' => 'Cocoon',
            'image' => 'salledebain6.jpg',
            'categorie' => 'categorie_0',
            'description' => 'Le confort d\'une salle de bain cocoon apporte une touche chaleureuse et confortable, sans oublier de donner un caractère unique à cet espace, notamment avec le mélange des textures et des matériaux comme le bois, la pierre et le métal.'
        ],
        [
            'name' => 'Bohème',
            'image' => 'salledebain5.jpg',
            'categorie' => 'categorie_0',
            'description' => 'Si vous cherchez à mettre à jour votre salle de bain, pourquoi ne pas envisager un look bohème ? Ce style est idéal pour ceux qui recherchent une salle de bain avec beaucoup de charme et appelant à l\'évasion.'
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 3; $i++) {
            $style = new Style();
            $style->setName(self::STYLES[$i]['name']);
            $style->setImage(self::STYLES[$i]['image']);
            $style->setDescription(self::STYLES[$i]['description']);
            copy(
                __DIR__ . '/' . self::STYLES[$i]['image'],
                __DIR__ . '/../../public/uploads/styles/' . self::STYLES[$i]['image']
            );
            $this->addReference('style_' . $i, $style);
            $style->setCategorie($this->getReference('categorie_0'));
            $manager->persist($style);
        }

        for ($i = 3; $i < 6; $i++) {
            $style = new Style();
            $style->setName(self::STYLES[$i]['name']);
            $style->setImage(self::STYLES[$i]['image']);
            $style->setDescription(self::STYLES[$i]['description']);
            copy(
                __DIR__ . '/' . self::STYLES[$i]['image'],
                __DIR__ . '/../../public/uploads/styles/' . self::STYLES[$i]['image']
            );
            $this->addReference('style_'. $i, $style);
            $style->setCategorie($this->getReference('categorie_0'));
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
