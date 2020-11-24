<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PortfolioController extends AbstractController
{

    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        return $this->render('portfolio/home.html.twig');
    }

    /**
     * @Route("/aboutme", name="aboutme")
     */
    public function aboutme(): Response
    {
        return $this->render('portfolio/aboutme.html.twig');
    }
}
