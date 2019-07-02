<?php

namespace App\DataFixtures;

use App\Entity\Event;
use App\Service\Slugger;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class EventFixtures extends Fixture implements DependentFixtureInterface
{
    private $slugger;

    /**
     * EventFixtures constructor.
     * @param $slugger
     */
    public function __construct(Slugger $slugger)
    {
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager)
    {
        $event1 = new Event();
        $event1->setPicture(null);
        $event1->setTitle("Web2Day");
        $event1->setSlug($this->slugger->slugify($event1->getTitle()));
        $event1->setPicture("web2day.jpg");
        $event1->setDescription("");
        $event1->setDateStart(new\DateTime("2019-06-05"));
        $event1->setDateEnd(new\DateTime("2019-06-07"));
        $event1->setUrl("https://web2day.co/");
        $event1->setPrice("10");
        $event1->setIsValid();
        $event1->setCity($this->getReference("nantes"));
        $event1->setUser($this->getReference("admin"));
        $event1->addLanguage($this->getReference("français"));
        $this->setReference("web2day",$event1);
        $manager->persist($event1);

        $event2 = new Event();
        $event2->setPicture(null);
        $event2->setTitle("Les rencontres numériques du Pays Basque");
        $event2->setSlug($this->slugger->slugify($event1->getTitle()));
        $event2->setPicture("");
        $event2->setDescription("");
        $event2->setDateStart(new\DateTime("2019-07-01"));
        $event2->setDateEnd(new\DateTime("2019-07-05"));
        $event2->setUrl("https://web2day.co/");
        $event2->setPrice("10");
        $event2->setIsValid();
        $event2->setCity($this->getReference("bayonne"));
        $event2->setUser($this->getReference("user2"));
        $event2->addLanguage($this->getReference("english"));
        $this->setReference("Les rencontres numériques du Pays Basque",$event2);
        $manager->persist($event2);

        $event3 = new Event();
        $event3->setPicture(null);
        $event3->setTitle("BtoB Summit");
        $event3->setSlug($this->slugger->slugify($event1->getTitle()));
        $event3->setPicture("");
        $event3->setDescription("");
        $event3->setDateStart(new\DateTime("2019-07-01"));
        $event3->setDateEnd(new\DateTime("2019-07-01"));
        $event3->setUrl("https://web2day.co/");
        $event3->setPrice("10");
        $event3->setIsValid();
        $event3->setCity($this->getReference("paris"));
        $event3->setUser($this->getReference("user3"));
        $event3->addLanguage($this->getReference("deutsch"));
        $this->setReference("BtoB Summit",$event2);
        $manager->persist($event3);

        $manager->flush();
    }

    /**
     * @return array|void
     */
    public function getDependencies()
    {
        return
        [
            CityFixtures::class,
            UserFixtures::class,
            LanguageFixtures::class
        ];
    }


}
