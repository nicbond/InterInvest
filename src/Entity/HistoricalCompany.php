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
    private $created_at;

    /**
     * @ORM\Column(type="integer")
     */
    private $share_social;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="historicalCompanies")
     */
    private $company;

    /**
     * @ORM\ManyToOne(targetEntity=Jurisdiction::class, inversedBy="historicalCompanies")
     */
    private $jurisdiction;

    public function __construct()
    {
        $this->created_at = new \DateTime();
    }

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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

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

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getJurisdiction(): ?Jurisdiction
    {
        return $this->jurisdiction;
    }

    public function setJurisdiction(?Jurisdiction $jurisdiction): self
    {
        $this->jurisdiction = $jurisdiction;

        return $this;
    }
}
