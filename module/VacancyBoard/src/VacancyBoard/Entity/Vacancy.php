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
     * @var Department
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


    /**
     * Initialize empty collection of translations
     */
    public function __construct()
    {
        $this->translations = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Department
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @param Department $department
     * @return $this
     */
    public function setDepartment(Department $department)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getTranslations()
    {
        return $this->translations;
    }

    /**
     * @param ArrayCollection $translations
     */
    public function setTranslations($translations)
    {
        $this->translations = $translations;
    }

    /**
     * Count vacancy translations
     *
     * @return int
     */
    public function getTotalTranslations()
    {
        return $this->translations->count();
    }

    /**
     * Test if vacancy has any translations
     *
     * @return bool
     */
    public function hasTranslations()
    {
        return $this->getTotalTranslations() > 0;
    }

    /**
     * Test if vacancy has specific translation
     *
     * @param Translation $translation
     * @return bool
     */
    public function hasTranslation(Translation $translation)
    {
        return $this->translations->contains($translation);
    }

    /**
     * Add vacancy translation
     *
     * @param Translation $translation
     * @return bool|int
     */
    public function addTranslation(Translation $translation)
    {
        if ( ! $this->hasTranslation($translation)) {
            $this->translations->add($translation);

            return $this->getTotalTranslations();
        }

        return false;
    }

    /**
     * Remove vacancy translation
     *
     * @param Translation $translation
     * @return bool|int
     */
    public function removeTranslation(Translation $translation)
    {
        if ($this->translations->remove($translation) !== null) {
            return $this->getTotalTranslations();
        }

        return false;
    }
}