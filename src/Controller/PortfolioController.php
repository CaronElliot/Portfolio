<?php

namespace App\Controller;

use App\Entity\Demande;
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

    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        $repoProjet = $this->getDoctrine()->getRepository(Projet::class);

        $projets = $repoProjet->findBy([],['id' => 'asc']);
        return $this->render('portfolio/home.html.twig',
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
        return $this->render('portfolio/aboutme.html.twig',
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

        return $this->render('portfolio/projet.html.twig',[
            'projet' => $projet
        ]);
    }

    /**
     * @Route("/contactme", name="contactme")
     */
    public function contactme(Request $request, EntityManagerInterface $manager)
    {
        $demande=new Demande();

        $form=$this->createFormBuilder($demande)
                    ->add('nom_entreprise')
                    ->add('objectif')
                    ->add('email', EmailType::class)
                    ->add('telephone',TelType::class)
                    ->add('envoyer',SubmitType::class,[
                        'label'=> "Envoyer"
                    ])
                    ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($demande);
            $manager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('portfolio/contactme.html.twig',[
            'formDemande' => $form->createView()
        ]);
    }
}
