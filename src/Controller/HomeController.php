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
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(CategorieRepository $categorieRepository): Response
    {
        $categories = $categorieRepository->findAll();


        return $this->render(
            'home/index.html.twig',
            [
                'categories' => $categories,
                
            ]
        );
    }
 /**
     * @Route("/salledebain", name="bathroom")
     */
    public function showBathroom(CategorieRepository $categorieRepository, StyleRepository $styleRepository): Response
    {
        $styles = $styleRepository->findAll();

        return $this->render(
            'home/bathroom.html.twig',
            [
                'categorie' => $categorieRepository,
                'styles' => $styles,
            ]
        );
    }
    /**
     * @Route("product/show/{id<^[0-9]+$>}", name="show")
     */
    public function show(Style $style, SessionInterface $session, $id): Response
    {
        $cart = $session->get('cart');
        // dd($cart);

        return $this->render('home/show.html.twig', ['style' => $style, 'cart' => $cart]);
    }
}
