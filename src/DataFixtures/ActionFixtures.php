<?php

namespace App\DataFixtures;

use App\Entity\Action;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\DataFixtures\UserFixtures;
use App\DataFixtures\TypeFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ActionFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $action = new Action();
        $action->setAmount(50.0);
        $action->setOrigin($this->getReference(UserFixtures::MLC_USER_REFERENCE));
        $action->setActiontype($this->getReference(TypeFixtures::TYPE_REFERENCE));

        $manager->persist($action);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            UserFixtures::class,
            TypeFixtures::class,
        );
    }
}
