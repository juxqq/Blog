<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Contact extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $contactList = ['Enzo', 'Nassim', 'Killian', 'Rayan'];

        foreach ($contactList as $contact){
            $c = new \App\Entity\Contact();
            $c->setName($contact);

            $manager->persist($c);
        }
        $manager->flush();
    }
}
