<?php

namespace App\DataFixtures;

use App\Entity\City;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CityFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $city1 = new City();
        $city1->setName("Nantes");
        $this->setReference("nantes",$city1);
        $manager->persist($city1);

        $city2 = new City();
        $city2->setName("Bayonne");
        $this->setReference("bayonne",$city2);
        $manager->persist($city2);

        $city3 = new City();
        $city3->setName("Paris");
        $this->setReference("paris",$city3);
        $manager->persist($city3);


        $manager->flush();
    }
}
