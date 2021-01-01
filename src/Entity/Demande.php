<?php

namespace App\Entity;

use App\Repository\DemandeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=DemandeRepository::class)
 */
class Demande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\Length(max=100,maxMessage="Un nom d'entreprise ne peut pas être aussi long !")
     */
    private $nom_entreprise;

    /**
     * @ORM\Column(type="text")
     * @Assert\Length(min=25,minMessage="Insérez 25 caractères minimum !")
     */
    private $objectif;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email(message="Votre email n'est pas valide !")
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=20)
     * @Assert\Length (min=10,max=20,minMessage="Un numéro de téléphone ne peut pas comporter moins de 10 caractères",maxMessage="Un numéro de téléphone ne peut pas comporter plus de 20 caractères")
     */
    private $telephone;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEntreprise(): ?string
    {
        return $this->nom_entreprise;
    }

    public function setNomEntreprise(string $nom_entreprise): self
    {
        $this->nom_entreprise = $nom_entreprise;

        return $this;
    }

    public function getObjectif(): ?string
    {
        return $this->objectif;
    }

    public function setObjectif(string $objectif): self
    {
        $this->objectif = $objectif;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }
}
