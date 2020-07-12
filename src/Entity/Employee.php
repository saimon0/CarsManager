<?php

namespace App\Entity;

use App\Repository\EmployeeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmployeeRepository::class)
 */
class Employee
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=24)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=24)
     */
    private $surname;

    /**
     * @ORM\Column(type="string", length=24)
     */
    private $branch;

    /**
     * @ORM\Column(type="string", length=24)
     */
    private $stage;

    /**
     * @ORM\OneToOne(targetEntity=Car::class, mappedBy="user", cascade={"persist", "remove"})
     */
    private $user;

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

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getBranch(): ?string
    {
        return $this->branch;
    }

    public function setBranch(string $branch): self
    {
        $this->branch = $branch;

        return $this;
    }

    public function getStage(): ?string
    {
        return $this->stage;
    }

    public function setStage(string $stage): self
    {
        $this->stage = $stage;

        return $this;
    }

    public function getUser(): ?Car
    {
        return $this->user;
    }

    public function setUser(?Car $user): self
    {
        $this->user = $user;

        // set (or unset) the owning side of the relation if necessary
        $newUser = null === $user ? null : $this;
        if ($user->getUser() !== $newUser) {
            $user->setUser($newUser);
        }

        return $this;
    }

    public function __toString()
    {
        $idStr = $this->getId();
        $idStr = strval($idStr);
        return $idStr;
    }
}
