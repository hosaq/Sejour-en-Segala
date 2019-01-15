<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Immo;

class ImmoFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        for ($i=0; $i<100; $i++){
            $propriete=new Immo();
            $propriete
                    ->setTitre($faker->words(4,true))
                    ->setType($faker->words(2,true))
                    ->setDescription($faker->sentences(3,true))
                    ->setPrix($faker->numberBetween(25000,800000))
                    ->setSurface($faker->numberBetween(15,800))
                    ->setSurfaceTerrain($faker->numberBetween(0,8000))
                     ->setPays('France')
                     ->setVille($faker->city)
                     ->setCodePostal($faker->numberBetween(10000,90000))
                    ;
            $manager->persist($propriete);
        }
        
        $manager->flush();
    }
}
