<?php

namespace App\DataFixtures;

use App\Entity\Participant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ParticipantFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $participant1 = new Participant();
        $participant1->setCreatedAt(new \DateTime("2019-12-19"));
        $participant1->setUser($this->getReference("admin"));
        $participant1->setEvent($this->getReference("web2day"));
        $manager->persist($participant1);
        $this->setReference("Participant1",$participant1);

        $participant2 = new Participant();
        $participant2->setCreatedAt(new \DateTime("2019-08-12"));
        $participant2->setUser($this->getReference("user2"));
        $participant2->setEvent($this->getReference("Les rencontres numériques du Pays Basque"));
        $manager->persist($participant2);
        $this->setReference("Participant2",$participant2);

        $participant3 = new Participant();
        $participant3->setCreatedAt(new \DateTime("2019-10-17"));
        $participant3->setUser($this->getReference("user3"));
        $participant3->setEvent($this->getReference("BtoB Summit"));
        $manager->persist($participant3);
        $this->setReference("Participant3",$participant3);




        $manager->flush();

    }
    public function getDependencies()
    {
        return [
            EventFixtures::class,
            UserFixtures::class
        ];
    }
}


