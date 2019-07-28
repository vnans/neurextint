<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VisteRepository")
 */
class Viste
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $moderechargement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rattachement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $verificationid;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $point;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bundle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $commentaire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModerechargement(): ?string
    {
        return $this->moderechargement;
    }

    public function setModerechargement(string $moderechargement): self
    {
        $this->moderechargement = $moderechargement;

        return $this;
    }

    public function getRattachement(): ?string
    {
        return $this->rattachement;
    }

    public function setRattachement(string $rattachement): self
    {
        $this->rattachement = $rattachement;

        return $this;
    }

    public function getVerificationid(): ?string
    {
        return $this->verificationid;
    }

    public function setVerificationid(string $verificationid): self
    {
        $this->verificationid = $verificationid;

        return $this;
    }

    public function getPoint(): ?string
    {
        return $this->point;
    }

    public function setPoint(string $point): self
    {
        $this->point = $point;

        return $this;
    }

    public function getBundle(): ?string
    {
        return $this->bundle;
    }

    public function setBundle(string $bundle): self
    {
        $this->bundle = $bundle;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }
}
