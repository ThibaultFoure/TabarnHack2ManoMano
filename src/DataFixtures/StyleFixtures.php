<?php

namespace App\DataFixtures;

use App\Entity\Style;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StyleFixtures extends Fixture
{

    const STYLES = [
        [
            'name' => 'Moderne',
            'image' => 'salledebain3.jpg',
            'categorie' => 'categorie_0',
            'description' => 'Envie de design dans votre salle de bain ? Le style moderne conviendra à vos attentes. Il apportera à votre pièce une touche de sérénité et de détente.'
        ],
        [
            'name' => 'Palais royal',
            'image' => 'salledebain1.jpg',
            'categorie' => 'categorie_0',
            'description' => "L’or brossé est véritablement la matière tendance pour décorer votre salle de bain. La robinetterie dorée, il fallait y penser ! Pourtant, là réside tout le charme d’une salle de bain décorée avec style."
        ],
        [
            'name' => 'rustique',
            'image' => 'salledebain2.jpg',
            'categorie' => 'categorie_0',
            'description' => 'Le charme du rustique dans la salle de bain apporte une touche chaleureuse et confortable, sans oublier de donner un caractère unique à cet espace, notamment avec le mélange des textures et des matériaux comme le bois, la pierre, le métal.'
        ],
        [
            'name' => 'Bois',
            'image' => 'salledebain4.jpg',
            'categorie' => 'categorie_0',
            'description' => 'Réaménagez et redynamisez votre salle de bain pour une évasion estivale à la campagne. La simplicité et le charme du style champêtre transformera votre salle de bain en havre de repos et de rafraîchissement.'
        ],
        [
            'name' => 'Classique',
            'image' => 'salledebain6.jpg',
            'categorie' => 'categorie_0',
            'description' => "Améliorez le standing de votre salle de bains tout en délicatesse en choisissant le style classique chic : un subtil mélange entre l’ancien et le contemporain qui donne à la pièce un cachet intemporel."
        ],
        [
            'name' => 'Vintage',
            'image' => 'salledebain5.jpg',
            'categorie' => 'categorie_0',
            'description' => 'Si vous cherchez à mettre à jour votre salle de bain, pourquoi ne pas envisager un look vintage? Ce style est idéal pour ceux qui recherchent une salle de bain avec beaucoup de charme et de caractère.'
        ],
    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::STYLES as $key => $styleName) {
            $style = new Style();
            $style->setName($styleName['name']);
            $style->setImage($styleName['image']);
            $style->setDescription($styleName['description']);
            copy(
                __DIR__ . '/' . $styleName['image'],
                __DIR__ . '/../../public/uploads/styles/' . $styleName['image']
            );
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
