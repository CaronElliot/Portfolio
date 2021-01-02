<?php

namespace App\Notifier;

use App\Entity\Demande;
use Twig\Environment;


class DemandeNotifier
{

    /**
     * @var \Swift_Mailer $mailer
     */
    private $mailer;

    /**
     * @var \Environment $renderer
     */
    private $renderer;

    /**
     * Constructeur qui permet d'instancier les propriétés de la classe.
     *
     * @param \Swift_Mailer $mailer
     * @param Environment $renderer
     */
    public function __construct(\Swift_Mailer $mailer, Environment $renderer)
    {
        $this->mailer = $mailer;
        $this->renderer = $renderer;
    }

    /**
     * Créer un mail avec les informations de `$contactMail` puis l'envoie.
     *
     * @param Demande $demande
     * @return void
     */
    public function notify(Demande $demande){

        $message = (new \Swift_Message($demande->getNomEntreprise()))
            ->setFrom($demande->getEmail())
            ->setTo($_ENV['MY_EMAIL_ADDRESS'])
            ->setReplyTo($_ENV['MY_EMAIL_ADDRESS'])
            ->setBody(
                $this->renderer->render(
                    'emails/demande.html.twig',[
                    'demande' => $demande
                ]), 'text/html');

        $this->mailer->send($message);

    }

}
