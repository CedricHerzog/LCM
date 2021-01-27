<?php

namespace App\DataFixtures;

use App\Entity\Exchange;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ExchangeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $exchange = new Exchange();
        $exchange->setName('Bureau 1');
        $exchange->setDescription('Bureau 1 Description');
        $exchange->setLat(47.750839);
        $exchange->setLon(7.305888);
        $exchange->setMoney(5000.50);
        $manager->persist($exchange);

        $exchange = new Exchange();
        $exchange->setName('Bureau 2');
        $exchange->setDescription('Bureau 2 Description');
        $exchange->setLat(47.750839);
        $exchange->setLon(7.302888);
        $exchange->setMoney(2000);
        $manager->persist($exchange);

        $manager->flush();
    }
}
