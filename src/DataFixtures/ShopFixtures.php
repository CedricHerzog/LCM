<?php

namespace App\DataFixtures;

use App\Entity\Shop;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ShopFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $shop = new Shop();
        $shop->setName('Boulangerie 1');
        $shop->setDescription('Boulangerie 1 Description');
        $shop->setLat(47.750839);
        $shop->setLon(7.305888);
        $manager->persist($shop);

        $shop = new Shop();
        $shop->setName('Boulangerie 2');
        $shop->setDescription('Boulangerie 2 Description');
        $shop->setLat(47.780839);
        $shop->setLon(7.305888);
        $manager->persist($shop);

        $shop = new Shop();
        $shop->setName('Bar 2');
        $shop->setDescription('Bar 2 Description');
        $shop->setLat(47.750839);
        $shop->setLon(7.315888);
        $manager->persist($shop);

        $shop = new Shop();
        $shop->setName('Bar 2');
        $shop->setDescription('Bar 2 Description');
        $shop->setLat(47.760839);
        $shop->setLon(7.335888);
        $manager->persist($shop);

        $shop = new Shop();
        $shop->setName('Coiffeur 2');
        $shop->setDescription('Coiffeur 2 Description');
        $shop->setLat(47.730839);
        $shop->setLon(7.335888);
        $manager->persist($shop);

        $manager->flush();
    }
}
