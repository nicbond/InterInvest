<?php

namespace App\Entity;

use App\Repository\CompanyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=CompanyRepository::class)
 */
class Company
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=5, max=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=15)
     * @Assert\Length(min=9, max=15)
     */
    private $siren_number;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
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

    /**
     * @ORM\OneToMany(targetEntity=Address::class, mappedBy="company")
     */
    private $addresses;

    /**
     * @ORM\ManyToOne(targetEntity=Jurisdiction::class, inversedBy="companies")
     * @ORM\JoinColumn(nullable=false)
     */
    private $jurisdiction;


    public function __construct()
    {
        $this->date_registration = new \DateTime();
        $this->addresses = new ArrayCollection();
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

    /**
     * @return Collection|Address[]
     */
    public function getAddresses(): Collection
    {
        return $this->addresses;
    }

    public function addAddress(Address $address): self
    {
        if (!$this->addresses->contains($address)) {
            $this->addresses[] = $address;
            $address->setCompany($this);
        }

        return $this;
    }

    public function removeAddress(Address $address): self
    {
        if ($this->addresses->removeElement($address)) {
            // set the owning side to null (unless already changed)
            if ($address->getCompany() === $this) {
                $address->setCompany(null);
            }
        }

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
