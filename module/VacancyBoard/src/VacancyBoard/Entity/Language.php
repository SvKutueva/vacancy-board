<?php

namespace VacancyBoard\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Translation language
 *
 * @ORM\Entity
 * @ORM\Table(name="language")
 */
class Language
{
    /**
     * Unique identifier
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * ISO 639-1 language code
     *
     * @var string
     * @ORM\Column(type="string", length=2)
     */
    protected $code;

    /**
     * English name of language
     *
     * @var string
     * @ORM\Column(type="string", length=40)
     */
    protected $name;

    /**
     * Translations in this language
     *
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Translation", mappedBy="language")
     */
    protected $translations;

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
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @throws \Exception
     * @return $this
     */
    public function setCode($code)
    {
        if (strlen($code) !== 2) {
            throw new \Exception('Language code must be in ISO 639-1 format, i.e. exactly 2 characters long');
        }

        $this->code = $code;

        return $this;
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
        if (strlen($name) > 40) {
            throw new \Exception('Language name must be less than 41 characters long');
        }

        $this->name = $name;

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
     * @return $this
     */
    public function setTranslations($translations)
    {
        $this->translations = $translations;

        return $this;
    }

    /**
     * Count translations made in this language
     *
     * @return int
     */
    public function getTotalTranslations()
    {
        return $this->translations->count();
    }

    /**
     * Test if translations made in this language exist
     *
     * @return bool
     */
    public function hasTranslations()
    {
        return $this->getTotalTranslations() > 0;
    }

    /**
     * Test if translation made in this language exists
     *
     * @param Translation $translation
     * @return bool
     */
    public function hasTranslation(Translation $translation)
    {
        return $this->translations->contains($translation);
    }

    /**
     * Set translation as made in this language
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
     * Unset translation as made in this language
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