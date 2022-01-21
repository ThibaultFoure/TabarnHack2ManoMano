<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartController extends AbstractController
{
    /**
     * @Route("/cart", name="cart_index")
     */
    public function index(SessionInterface $session, ProductRepository $productRepository): Response
    {
        $cart = $session->get('cart');
        $total = 0;
        if (!empty($cart)) {
            foreach ($cart as $id => $quantity) {
                $item = $productRepository->find($id);
                $totalItem = $item->getPrice() * $quantity;
                $total += $totalItem;

                $cartWhithData[] = [
                    'product' => $item,
                    'quantity' => $quantity
                ];
            }
        }

        return $this->render('cart/index.html.twig', [
            'items' => $cartWhithData ?? [],
            'total' => $total
        ]);
    }

    /**
     * @Route("/cart/add/{id}", name="cart_add")
     */
    public function add($id, SessionInterface $session)
    {
        $cart = $session->get('cart');

        if (!empty($cart[$id])) {
            $cart[$id]++;
        } else {
            $cart[$id] = 1;
        }
        $session->set('cart', $cart);

        return $this->redirectToRoute('cart_index');
    }

    /**
     * @Route("/cart/delete/{id}", name="cart_delete")
     */
    public function delete($id, SessionInterface $session)
    {
        $cart = $session->get('cart');
        if (!empty($cart[$id])) {
            unset($cart[$id]);
        }

        $session->set('cart', $cart);

        return $this->redirectToRoute('cart_index');
    }
}
