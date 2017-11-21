<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;

class LoadUserData extends AbstractDataFixture
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

        $encoder = $this->container->get('security.password_encoder');
        $firstUser = new User('Sikora', 'elo');
        $firstUser->setPassword($encoder->encodePassword($firstUser, 'elo'));
        $this->manager->persist($firstUser);
        $this->manager->flush();
        $this->setReference('Sikora', $firstUser);
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 10;
    }
}