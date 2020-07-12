<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=CarRepository::class)
 * @UniqueEntity("vin")
 *
 */
class Car
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
    private $mark;

    /**
     * @ORM\Column(type="string", length=24)
     */
    private $model;

    /**
     * @ORM\Column(type="integer")
     */
    private $yearProd;

    /**
     * @ORM\Column(type="string", length=24)
     */
    private $engineType;

    /**
     * @ORM\Column(type="string")
     */
    private $engineCapacity;

    /**
     * @ORM\OneToOne(targetEntity=Employee::class, inversedBy="user", cascade={"persist", "remove"})
     */
    private $user;

    /**
     * @ORM\Column(type="integer")
     */
    private $mileage;

    /**
     * @ORM\Column(type="string", length=16)
     */
    private $vin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMark(): ?string
    {
        return $this->mark;
    }

    public function setMark(string $mark): self
    {
        $this->mark = $mark;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getYearProd(): ?int
    {
        return $this->yearProd;
    }

    public function setYearProd(int $yearProd): self
    {
        $this->yearProd = $yearProd;

        return $this;
    }

    public function getEngineType(): ?string
    {
        return $this->engineType;
    }

    public function setEngineType(string $engineType): self
    {
        $this->engineType = $engineType;

        return $this;
    }

    public function getEngineCapacity(): ?string
    {
        return $this->engineCapacity;
    }

    public function setEngineCapacity(string $engineCapacity): self
    {
        $this->engineCapacity = $engineCapacity;

        return $this;
    }


    public function getUser(): ?Employee
    {
        return $this->user;
    }

    public function setUser(?Employee $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getMileage(): ?int
    {
        return $this->mileage;
    }

    public function setMileage(int $mileage): self
    {
        $this->mileage = $mileage;

        return $this;
    }

    public function getVin(): ?string
    {
        return $this->vin;
    }

    public function setVin(string $vin): self
    {
        $this->vin = $vin;

        return $this;
    }

    public function __toString()
    {
        $idStr = $this->getId();
        $idStr = strval($idStr);
        return $idStr;
    }
}
