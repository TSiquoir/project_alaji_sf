<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ResultRepository")
 */
class Result
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Criteria", inversedBy="results")
     * @ORM\JoinColumn(nullable=false)
     */
    private $criteria;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Student", inversedBy="results")
     * @ORM\JoinColumn(nullable=false)
     */
    private $student;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $test;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $interview;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCriteria(): ?Criteria
    {
        return $this->criteria;
    }

    public function setCriteria(?Criteria $criteria): self
    {
        $this->criteria = $criteria;

        return $this;
    }

    public function getStudent(): ?Student
    {
        return $this->student;
    }

    public function setStudent(?Student $student): self
    {
        $this->student = $student;

        return $this;
    }

    public function getTest(): ?int
    {
        return $this->test;
    }

    public function setTest(?int $test): self
    {
        $this->test = $test;

        return $this;
    }

    public function getInterview(): ?int
    {
        return $this->interview;
    }

    public function setInterview(?int $interview): self
    {
        $this->interview = $interview;

        return $this;
    }
}
