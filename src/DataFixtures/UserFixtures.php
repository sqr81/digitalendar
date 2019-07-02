<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class   UserFixtures extends Fixture

{
    private $encoder;

    /**
     * UserFixtures constructor.
     * @param $encoder
     */

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }


    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $user1 = new User();
        $user1->setUsername("Tolia");
        $user1->setRoles(["ROLE_ADMIN"]);
        $user1->setPassword($this->encoder->encodePassword($user1, "1234"));
        $user1->setEmail("tolia@free.fr");
        $this->setReference("admin",$user1);
        $manager->persist($user1);

        $user2 = new User();
        $user2->setUsername("Bertrand");
        $user2->setRoles(["ROLE_USER"]);
        $user2->setPassword($this->encoder->encodePassword($user2, "azer"));
        $user2->setEmail("bertrand@free.fr");
        $this->setReference("user2",$user2);
        $manager->persist($user2);

        $user3 = new User();
        $user3->setUsername("Jerome");
        $user3->setRoles(["ROLE_USER"]);
        $user3->setPassword($this->encoder->encodePassword($user3, "tyui"));
        $user3->setEmail("jerome@free.fr");
        $this->setReference("user3",$user3);
        $manager->persist($user3);


        $manager->flush();
    }
}
