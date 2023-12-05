<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('', name: 'app_homepage', methods: 'GET')]
    public function homepage(): Response
    {
        return $this->render('main/homepage.html.twig');
    }

    #[Route('/contact', name: 'app_contact', methods: ['GET', 'POST'])]
    public function contact(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            dump($request->request->all());

            $this->addFlash('app', 'Message successfully sent');
            return $this->redirectToRoute('app_homepage');
        }

        return $this->render('main/contact.html.twig');
    }
}
