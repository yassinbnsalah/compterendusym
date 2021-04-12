<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $code_clt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $des_clt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adr_clt;

    /**
     * @ORM\Column(type="string", length=8, nullable=true)
     */
    private $tel_clt;

    /**
     * @ORM\OneToMany(targetEntity=Commande::class, mappedBy="code_clt_cde", orphanRemoval=true)
     */
    private $commandes;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeClt(): ?int
    {
        return $this->code_clt;
    }

    public function setCodeClt(int $code_clt): self
    {
        $this->code_clt = $code_clt;

        return $this;
    }

    public function getDesClt(): ?string
    {
        return $this->des_clt;
    }

    public function setDesClt(?string $des_clt): self
    {
        $this->des_clt = $des_clt;

        return $this;
    }

    public function getAdrClt(): ?string
    {
        return $this->adr_clt;
    }

    public function setAdrClt(?string $adr_clt): self
    {
        $this->adr_clt = $adr_clt;

        return $this;
    }

    public function getTelClt(): ?string
    {
        return $this->tel_clt;
    }

    public function setTelClt(?string $tel_clt): self
    {
        $this->tel_clt = $tel_clt;

        return $this;
    }

    /**
     * @return Collection|Commande[]
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): self
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes[] = $commande;
            $commande->setCodeCltCde($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getCodeCltCde() === $this) {
                $commande->setCodeCltCde(null);
            }
        }

        return $this;
    }
}
