<?php

namespace App\DataFixtures;

use App\Entity\Type;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TypeFixtures extends Fixture
{
    public const TYPE_REFERENCE = 'type';

    public function load(ObjectManager $manager)
    {
        $product = new Type();
        $product->setName('Withdrawal');
        $manager->persist($product);

        $this->addReference(self::TYPE_REFERENCE, $product);

        $manager->flush();
    }
}
