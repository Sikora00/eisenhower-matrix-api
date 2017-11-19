<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Task;
use AppBundle\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;

class LoadTaskData extends AbstractDataFixture
{

    protected $manager;
    /**
     * Performs the actual fixtures loading.
     *
     * @see \Doctrine\Common\DataFixtures\FixtureInterface::load()
     *
     * @param ObjectManager $manager The object manager.
     */
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;

        $sikora = $this->getReference('Sikora');
        $task = new Task('FirstTask', $sikora);
        $this->manager->persist($task);
        $this->manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 20;
    }
}