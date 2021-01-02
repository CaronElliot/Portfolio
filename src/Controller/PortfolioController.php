<?php

namespace App\Controller;

use App\Entity\Demande;
use App\Form\DemandeType;
use App\Notifier\DemandeNotifier;
use App\Repository\ProjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Formation;
use App\Entity\Qualite;
use App\Entity\Loisir;
use App\Entity\Projet;

class PortfolioController extends AbstractController
{


    private function myrender(string $view, array $parameters = [], Response $response = null) {

        $projets = $this->getDoctrine()->getRepository(Projet::class)->findBy([],['id' => 'asc']);

        return $this->render($view,
            ['stejorp' => $projets] + $parameters
        );
    }



    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        $repoProjet = $this->getDoctrine()->getRepository(Projet::class);

        $projets = $repoProjet->findBy([],['id' => 'asc']);
        return $this->myrender('portfolio/home.html.twig',
            [
            'projets'=>$projets
            ]);
    }

    /**
     * @Route("/aboutme", name="aboutme")
     */
    public function aboutme(): Response
    {
        $repoFormation = $this->getDoctrine()->getRepository(Formation::class);
        $repoQualite = $this->getDoctrine()->getRepository(Qualite::class);
        $repoLoisir = $this->getDoctrine()->getRepository(Loisir::class);

        $formations = $repoFormation->findBy([],['dateDebut' => 'asc']);
        $qualites = $repoQualite->findBy([],['id' => 'asc']);
        $loisirs = $repoLoisir->findBy([],['id' => 'asc']);

        dump($formations[0]->getImage());
        return $this->myrender('portfolio/aboutme.html.twig',
            [
                'formations'=>$formations,
                'qualites'=>$qualites,
                'loisirs'=>$loisirs,
            ]);
    }

    /**
     * @Route("/projet/{id}", name="projet")
     */
    public function projet($id): Response
    {
        $repoProjet=$this->getDoctrine()->getRepository(Projet::class);

        $projet = $repoProjet->find($id);

        return $this->myrender('portfolio/projet.html.twig',[
            'projet' => $projet
        ]);
    }

    /**
     * @Route("/contactme", name="contactme")
     */
    public function contactme(Request $request, DemandeNotifier $notifier)
    {
        $demande=new Demande();

        $form = $this->createForm(DemandeType::class, $demande);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $notifier->notify($demande);

            return $this->redirectToRoute('home');
        }

        return $this->myrender('portfolio/contactme.html.twig',[
            'formDemande' => $form->createView()
        ]);
    }
}
