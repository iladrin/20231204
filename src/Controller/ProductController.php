<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/products')]
class ProductController extends AbstractController
{
    #[Route('', name: 'product_list', methods: 'GET')]
    public function list(ProductRepository $repository): Response
    {
        $products = dump($repository->findAll());

        return $this->render('product/list.html.twig', [
            'products' => $products,
        ]);
    }

    #[Route('/{product<\d+>}', name: 'product_show', methods: 'GET')]
    public function show(Product $product): Response
    {
//        $product = $repository->find($id);
//
//        if ($product === null) {
//            throw $this->createNotFoundException();
//        }

        return $this->render('product/show.html.twig', [
            'product' => $product,
        ]);
    }
}
