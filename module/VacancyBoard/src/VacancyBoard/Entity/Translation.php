<?php

namespace VacancyBoard\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vacancy translation
 *
 * @ORM\Entity
 * @ORM\Table(name="translation")
 */
class Translation
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
     * Vacancy which translation belongs to
     *
     * @var Vacancy
     * @ORM\ManyToOne(targetEntity="Vacancy", inversedBy="translations")
     * @ORM\JoinColumn(name="vacancy_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $vacancy;

    /**
     * Language in which vacancy is translated
     *
     * @var Language
     * @ORM\ManyToOne(targetEntity="Language", inversedBy="translations")
     * @ORM\JoinColumn(name="language_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $language;

    /**
     * Short vacancy title
     *
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $title;

    /**
     * Full vacancy description text
     *
     * @var string
     * @ORM\Column(type="text", length=255, nullable=false)
     */
    protected $description;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Vacancy
     */
    public function getVacancy()
    {
        return $this->vacancy;
    }

    /**
     * @param Vacancy $vacancy
     * @return $this
     */
    public function setVacancy(Vacancy $vacancy)
    {
        $this->vacancy = $vacancy;

        return $this;
    }

    /**
     * @return Language
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param Language $language
     * @return $this
     */
    public function setLanguage(Language $language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
}