<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $contacts = [
            new Contact('soyer', 'alex', false),
            new Contact('soyer', 'alex', false),
            new Contact('soyer', 'alex', false),
            new Contact('soyer', 'alex', false),
            new Contact('soyer', 'alex', false),
            new Contact('soyer', 'alex', false),
            new Contact('soyer', 'alex', false),
            new Contact('soyer', 'alex', false),
        ];

        foreach ($contacts as $contact) {
            $manager->persist($contact);
        }

        $manager->flush();
    }
}
