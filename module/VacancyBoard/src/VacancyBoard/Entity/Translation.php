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
     * @var int
     * @ORM\ManyToOne(targetEntity="Vacancy", inversedBy="translations")
     * @ORM\JoinColumn(name="vacancy_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $vacancy;

    /**
     * Language in which vacancy is translated
     *
     * @var int
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
}