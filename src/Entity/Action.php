<?php

namespace App\Entity;

use App\Repository\ActionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ActionRepository::class)
 */
class Action
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $amount;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="actions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $origin;

    /**
     * @ORM\ManyToOne(targetEntity=Type::class, inversedBy="action")
     * @ORM\JoinColumn(nullable=false)
     */
    private $actiontype;

    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getOrigin(): ?User
    {
        return $this->origin;
    }

    public function setOrigin(?User $origin): self
    {
        $this->origin = $origin;

        return $this;
    }

    public function getActiontype(): ?Type
    {
        return $this->actiontype;
    }

    public function setActiontype(?Type $actiontype): self
    {
        $this->actiontype = $actiontype;

        return $this;
    }
}
