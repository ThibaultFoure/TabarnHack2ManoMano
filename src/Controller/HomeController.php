<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use App\Repository\StyleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Style;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(CategorieRepository $categorieRepository, StyleRepository $styleRepository): Response
    {
        $styles = $styleRepository->findAll();

        return $this->render(
            'home/index.html.twig',
            [
                'categorie' => $categorieRepository,
                'styles' => $styles,
            ]
        );
    }


    /**
     * @Route("product/show/{id<^[0-9]+$>}", name="show")
     */
    public function show(Style $style): Response
    {
        return $this->render('home/show.html.twig', ['style' => $style]);
    }

}
