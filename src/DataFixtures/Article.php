<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Article extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $articleList = ['Charbon', 'Pelle', 'Stylo', 'Boule de bowling'];

        foreach ($articleList as $article){
            $a = new \App\Entity\Article();
            $a->setName($article);

            $manager->persist($a);
        }
        $manager->flush();
    }
}
