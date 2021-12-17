<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Contact extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        /* $contactList = ['Enzo', 'Nassim', 'Killian', 'Rayan'];
        $lastnameList = ['Tremblay', 'Kridel', 'Malon', 'El-Hatri'];
        $newsletterList = ['1', '0', '1', '0'];

        foreach ($contactList as $contact){
            $c = new \App\Entity\Contact();
            $c->setName($contact);
            $manager->persist($c);
        }
        foreach ($lastnameList as $lastname){
            $l = new \App\Entity\Contact();
            $l->setLastname($lastname);
            $manager->persist($l);
        }
        foreach ($newsletterList as $newsletter){
            $n = new \App\Entity\Contact();
            $n->setNewsletter($newsletter);
            $manager->persist($n);
        }*/
        $manager->flush();
    }
}
