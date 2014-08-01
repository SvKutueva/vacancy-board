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

    /**
     * Initializes empty vacancies collection
     */
    public function __construct()
    {
        $this->vacancies = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @throws \Exception
     * @return $this
     */
    public function setName($name)
    {
        if (strlen($name) > 255) {
            throw new \Exception('Department name must be less than 256 characters long');
        }
        $this->name = $name;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getVacancies()
    {
        return $this->vacancies;
    }

    /**
     * @param ArrayCollection $vacancies
     * @return $this
     */
    public function setVacancies($vacancies)
    {
        $this->vacancies = $vacancies;

        return $this;
    }

    /**
     * Count vacancies in department
     *
     * @return int
     */
    public function getTotalVacancies()
    {
        return $this->vacancies->count();
    }

    /**
     * Test if department has any vacancies
     *
     * @return bool
     */
    public function hasVacancies()
    {
        return $this->getTotalVacancies() > 0;
    }

    /**
     * Test if department has specific vacancy
     *
     * @param Vacancy $vacancy
     * @return bool
     */
    public function hasVacancy(Vacancy $vacancy)
    {
        return $this->vacancies->contains($vacancy);
    }

    /**
     * Add vacancy to department
     *
     * @param Vacancy $vacancy
     * @return int|false    new total number of vacancies in department
     *                      or false if vacancy already exists
     */
    public function addVacancy(Vacancy $vacancy)
    {
        if ( ! $this->hasVacancy($vacancy)) {
            $this->vacancies->add($vacancy);

            return $this->getTotalVacancies();
        }

        return false;
    }

    /**
     * Remove vacancy from department
     *
     * @param Vacancy $vacancy
     * @return int|false    new total number of vacancies in department
     *                      or false if vacancy does not exist
     */
    public function removeVacancy(Vacancy $vacancy)
    {
        if ($this->vacancies->remove($vacancy) !== null) {
            return $this->getTotalVacancies();
        }

        return false;
    }

}