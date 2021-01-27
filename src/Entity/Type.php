<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeRepository::class)
 */
class Type
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
     * @ORM\OneToMany(targetEntity=Action::class, mappedBy="actiontype")
     */
    private $action;

    public function __construct()
    {
        $this->action = new ArrayCollection();
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
     * @return Collection|Action[]
     */
    public function getAction(): Collection
    {
        return $this->action;
    }

    public function addAction(Action $action): self
    {
        if (!$this->action->contains($action)) {
            $this->action[] = $action;
            $action->setActiontype($this);
        }

        return $this;
    }

    public function removeAction(Action $action): self
    {
        if ($this->action->removeElement($action)) {
            // set the owning side to null (unless already changed)
            if ($action->getActiontype() === $this) {
                $action->setActiontype(null);
            }
        }

        return $this;
    }
}
