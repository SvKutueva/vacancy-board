<?php

namespace VacancyBoard\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Department
 *
 * @ORM\Entity
 * @ORM\Table(name="department")
 */
class Department
{
    /**
     * Unique identifier
     *
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Department name
     *
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $name;

    /**
     * Department vacancies
     *
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Vacancy", mappedBy="department")
     */
    protected $vacancies;

    public function __construct()
    {
        $this->vacancies = new ArrayCollection();
    }
}