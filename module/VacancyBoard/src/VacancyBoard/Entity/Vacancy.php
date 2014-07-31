<?php

namespace VacancyBoard\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Vacancy
 *
 * @ORM\Entity
 * @ORM\Table(name="vacancy")
 */
class Vacancy
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
     * Department which vacancy belongs to
     *
     * @var int
     * @ORM\ManyToOne(targetEntity="Department", inversedBy="vacancies")
     * @ORM\JoinColumn(name="department", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $department;

    /**
     * Vacancy translations
     *
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Translation", mappedBy="vacancy")
     */
    protected $translations;


    public function __construct()
    {
        $this->translations = new ArrayCollection();
    }
}