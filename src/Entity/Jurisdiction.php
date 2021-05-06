<?php

namespace App\Entity;

use App\Repository\JurisdictionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JurisdictionRepository::class)
 */
class Jurisdiction
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
     * @ORM\OneToMany(targetEntity=Company::class, mappedBy="jurisdiction")
     */
    private $companies;

    /**
     * @ORM\OneToMany(targetEntity=HistoricalCompany::class, mappedBy="jurisdiction")
     */
    private $historicalCompanies;

    public function __construct()
    {
        $this->companies = new ArrayCollection();
        $this->historicalCompanies = new ArrayCollection();
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

    /**
     * @return Collection|Company[]
     */
    public function getCompanies(): Collection
    {
        return $this->companies;
    }

    public function addCompany(Company $company): self
    {
        if (!$this->companies->contains($company)) {
            $this->companies[] = $company;
            $company->setJurisdiction($this);
        }

        return $this;
    }

    public function removeCompany(Company $company): self
    {
        if ($this->companies->removeElement($company)) {
            // set the owning side to null (unless already changed)
            if ($company->getJurisdiction() === $this) {
                $company->setJurisdiction(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|HistoricalCompany[]
     */
    public function getHistoricalCompanies(): Collection
    {
        return $this->historicalCompanies;
    }

    public function addHistoricalCompany(HistoricalCompany $historicalCompany): self
    {
        if (!$this->historicalCompanies->contains($historicalCompany)) {
            $this->historicalCompanies[] = $historicalCompany;
            $historicalCompany->setJurisdiction($this);
        }

        return $this;
    }

    public function removeHistoricalCompany(HistoricalCompany $historicalCompany): self
    {
        if ($this->historicalCompanies->removeElement($historicalCompany)) {
            // set the owning side to null (unless already changed)
            if ($historicalCompany->getJurisdiction() === $this) {
                $historicalCompany->setJurisdiction(null);
            }
        }

        return $this;
    }
}
