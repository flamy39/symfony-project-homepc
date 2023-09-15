<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class EtudiantFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 100; $i++) {
            $etudiant = new \App\Entity\Etudiant();
            $etudiant->setPrenom($faker->firstName());
            $etudiant->setNom($faker->lastName());
            $etudiant->setEmail($faker->email());
            $etudiant->setDateNaissance($faker->dateTimeBetween('-30 years', '-17 years'));
            $manager->persist($etudiant);
        }

        $manager->flush();
    }
}
