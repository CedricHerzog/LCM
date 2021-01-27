<?php

namespace App\DataFixtures;

use App\Entity\Action;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\DataFixtures\UserFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ActionFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $action = new Action();
        $action->setType('Withdrawal');
        $action->setAmount(50.0);
        $action->setOrigin($this->getReference(UserFixtures::MLC_USER_REFERENCE));

        $manager->persist($action);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            UserFixtures::class,
        );
    }
}
