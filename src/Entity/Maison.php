<?php

namespace App\Entity;

use App\Repository\MaisonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=MaisonRepository::class)
 */
class Maison
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */

    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=3,max=255 , minMessage="Saisir la bonne adresse")
     */
    private $adresse;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbrchambre;

    /**
     * @ORM\OneToMany(targetEntity=Location::class, mappedBy="maison")
     */
    private $Locations;

    /**
     * @ORM\Column(type="integer")
     */
    private $sallebain;

    /**
     * @ORM\Column(type="integer")
     */
    private $surface;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity=Model::class, inversedBy="maisons")
     */
    private $Modele;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photo;







    public function __construct()
    {
        $this->Locations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getNbrchambre(): ?int
    {
        return $this->nbrchambre;
    }

    public function setNbrchambre(int $nbrchambre): self
    {
        $this->nbrchambre = $nbrchambre;

        return $this;
    }

    /**
     * @return Collection<int, Location>
     */
    public function getLocations(): Collection
    {
        return $this->Locations;
    }

    public function addLocation(Location $location): self
    {
        if (!$this->Locations->contains($location)) {
            $this->Locations[] = $location;
            $location->setMaison($this);
        }

        return $this;
    }

    public function removeLocation(Location $location): self
    {
        if ($this->Locations->removeElement($location)) {
            // set the owning side to null (unless already changed)
            if ($location->getMaison() === $this) {
                $location->setMaison(null);
            }
        }

        return $this;
    }


    public function getSallebain(): ?int
    {
        return $this->sallebain;
    }

    public function setSallebain(int $sallebain): self
    {
        $this->sallebain = $sallebain;

        return $this;
    }

    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(int $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getModele(): ?Model
    {
        return $this->Modele;
    }

    public function setModele(?Model $Modele): self
    {
        $this->Modele = $Modele;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }








}
