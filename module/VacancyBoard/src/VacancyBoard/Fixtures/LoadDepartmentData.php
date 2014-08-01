<?php

namespace VacancyBoard\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use VacancyBoard\Entity\Department;

class LoadDepartmentData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     *
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $it = new Department();
        $it->setName('IT department');
        $this->addReference('it', $it);

        $hr = new Department();
        $hr->setName('HR department');
        $this->addReference('hr', $hr);

        $manager->persist($it);
        $manager->persist($hr);

        $manager->flush();
    }

    /**
     *
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 2;
    }

}