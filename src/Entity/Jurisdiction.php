<?php

namespace App\Entity;

use App\Repository\JurisdictionRepository;
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
     * @ORM\OneToOne(targetEntity=Company::class, mappedBy="jurisdiction", cascade={"persist", "remove"})
     */
    private $company;

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

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): self
    {
        // unset the owning side of the relation if necessary
        if ($company === null && $this->company !== null) {
            $this->company->setJurisdiction(null);
        }

        // set the owning side of the relation if necessary
        if ($company !== null && $company->getJurisdiction() !== $this) {
            $company->setJurisdiction($this);
        }

        $this->company = $company;

        return $this;
    }
}
