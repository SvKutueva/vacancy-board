<?php

namespace VacancyBoard\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use VacancyBoard\Entity\Language;

class LoadLanguageData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     *
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        // default language is English
        $english = new Language();
        $english->setCode('en');
        $english->setName('English');
        $this->addReference('english', $english);

        // secondary language is Russian
        $russian = new Language();
        $russian->setCode('ru');
        $russian->setName('Russian');
        $this->addReference('russian', $russian);

        $manager->persist($english);
        $manager->persist($russian);

        $manager->flush();
    }

    /**
     *
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 1;
    }

}