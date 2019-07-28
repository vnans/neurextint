<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IsiteRepository")
 */
class Isite
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
    private $logitude;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $latitude;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogitude(): ?string
    {
        return $this->logitude;
    }

    public function setLogitude(string $logitude): self
    {
        $this->logitude = $logitude;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(string $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }
}
