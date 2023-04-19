<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'contact')]
    private ?Agenda $agenda = null;

    #[ORM\OneToMany(mappedBy: 'contact', targetEntity: ContactDetails::class)]
    private Collection $contact_details;

    public function __construct()
    {
        $this->contact_details = new ArrayCollection();
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

    public function getAgenda(): ?Agenda
    {
        return $this->agenda;
    }

    public function setAgenda(?Agenda $agenda): self
    {
        $this->agenda = $agenda;

        return $this;
    }

    /**
     * @return Collection<int, contactDetails>
     */
    public function getContactDetails(): Collection
    {
        return $this->contact_details;
    }

    public function addContactDetail(contactDetails $contactDetail): self
    {
        if (!$this->contact_details->contains($contactDetail)) {
            $this->contact_details->add($contactDetail);
            $contactDetail->setContact($this);
        }

        return $this;
    }

    public function removeContactDetail(contactDetails $contactDetail): self
    {
        if ($this->contact_details->removeElement($contactDetail)) {
            // set the owning side to null (unless already changed)
            if ($contactDetail->getContact() === $this) {
                $contactDetail->setContact(null);
            }
        }

        return $this;
    }
}
