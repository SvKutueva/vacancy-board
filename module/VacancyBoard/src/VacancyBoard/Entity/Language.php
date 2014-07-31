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
}