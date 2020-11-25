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
        return $this->render('portfolio/home.html.twig', ["projets" => projets]);
    }

    /**
     * @Route("/aboutme", name="aboutme")
     */
    public function aboutme(): Response
    {
        return $this->render('portfolio/aboutme.html.twig');
    }

    /**
     * @Route("/projet", name="projet")
     */
    public function projet(): Response
    {
        return $this->render('portfolio/projet.html.twig');
    }

    /**
     * @Route("/contactme", name="contactme")
     */
    public function contactme(): Response
    {
        return $this->render('portfolio/contactme.html.twig');
    }
}
