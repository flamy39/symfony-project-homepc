<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PromotionFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 10; $i++) {
            $promotion = new \App\Entity\Promotion();
            $promotion->setNom($faker->unique()->word());
            $this->setReference("promotion_$i", $promotion);
            $manager->persist($promotion);
        }

        $manager->flush();
    }
}
