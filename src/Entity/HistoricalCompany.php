<?php

namespace App\Entity;

use App\Repository\HistoricalCompanyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table("historical_company")
 * 
 * @ORM\Entity(repositoryClass=HistoricalCompanyRepository::class)
 */
class HistoricalCompany
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $siren_number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city_registration;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_registration;

    /**
     * @ORM\Column(type="integer")
     */
    private $share_social;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSirenNumber(): ?string
    {
        return $this->siren_number;
    }

    public function setSirenNumber(string $siren_number): self
    {
        $this->siren_number = $siren_number;

        return $this;
    }

    public function getCityRegistration(): ?string
    {
        return $this->city_registration;
    }

    public function setCityRegistration(string $city_registration): self
    {
        $this->city_registration = $city_registration;

        return $this;
    }

    public function getDateRegistration(): ?\DateTimeInterface
    {
        return $this->date_registration;
    }

    public function setDateRegistration(\DateTimeInterface $date_registration): self
    {
        $this->date_registration = $date_registration;

        return $this;
    }

    public function getShareSocial(): ?int
    {
        return $this->share_social;
    }

    public function setShareSocial(int $share_social): self
    {
        $this->share_social = $share_social;

        return $this;
    }
}
