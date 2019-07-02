<?php

namespace App\DataFixtures;

use App\Entity\Language;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LanguageFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $language1 = new Language();
        $language1->setName("français");
        $this->setReference("français",$language1);
        $manager->persist($language1);

        $language2 = new Language();
        $language2->setName("english");
        $this->setReference("english",$language2);
        $manager->persist($language2);

        $language3 = new Language();
        $language3->setName("deutsch");
        $this->setReference("deutsch",$language3);
        $manager->persist($language3);

        $manager->flush();
    }
}
