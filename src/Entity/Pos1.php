<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Pos1Repository")
 */
class Pos1
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $msisdn;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dealer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomdealer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nompos;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $autrecontact;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $localisation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $niveaustock;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $account;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $profile;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $localite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $possegntl;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $possegreg;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rgm30;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $smartphone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $niveau;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMsisdn(): ?string
    {
        return $this->msisdn;
    }

    public function setMsisdn(?string $msisdn): self
    {
        $this->msisdn = $msisdn;

        return $this;
    }

    public function getDealer(): ?string
    {
        return $this->dealer;
    }

    public function setDealer(string $dealer): self
    {
        $this->dealer = $dealer;

        return $this;
    }

    public function getNomdealer(): ?string
    {
        return $this->nomdealer;
    }

    public function setNomdealer(string $nomdealer): self
    {
        $this->nomdealer = $nomdealer;

        return $this;
    }

    public function getCet(): ?string
    {
        return $this->cet;
    }

    public function setCet(string $cet): self
    {
        $this->cet = $cet;

        return $this;
    }

    public function getNompos(): ?string
    {
        return $this->nompos;
    }

    public function setNompos(string $nompos): self
    {
        $this->nompos = $nompos;

        return $this;
    }

    public function getAutrecontact(): ?string
    {
        return $this->autrecontact;
    }

    public function setAutrecontact(string $autrecontact): self
    {
        $this->autrecontact = $autrecontact;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getNiveaustock(): ?string
    {
        return $this->niveaustock;
    }

    public function setNiveaustock(string $niveaustock): self
    {
        $this->niveaustock = $niveaustock;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getAccount(): ?string
    {
        return $this->account;
    }

    public function setAccount(string $account): self
    {
        $this->account = $account;

        return $this;
    }

    public function getProfile(): ?string
    {
        return $this->profile;
    }

    public function setProfile(string $profile): self
    {
        $this->profile = $profile;

        return $this;
    }

    public function getLocalite(): ?string
    {
        return $this->localite;
    }

    public function setLocalite(string $localite): self
    {
        $this->localite = $localite;

        return $this;
    }

    public function getPossegntl(): ?string
    {
        return $this->possegntl;
    }

    public function setPossegntl(string $possegntl): self
    {
        $this->possegntl = $possegntl;

        return $this;
    }

    public function getPossegreg(): ?string
    {
        return $this->possegreg;
    }

    public function setPossegreg(string $possegreg): self
    {
        $this->possegreg = $possegreg;

        return $this;
    }

    public function getRgm30(): ?string
    {
        return $this->rgm30;
    }

    public function setRgm30(string $rgm30): self
    {
        $this->rgm30 = $rgm30;

        return $this;
    }

    public function getSmartphone(): ?string
    {
        return $this->smartphone;
    }

    public function setSmartphone(string $smartphone): self
    {
        $this->smartphone = $smartphone;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }
}
