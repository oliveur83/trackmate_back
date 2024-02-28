<?php

namespace App\DataFixtures;

use App\Entity\Theme;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Themefix extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $theme = new Theme();
        $theme->setLibelle("chimie licence 1");
        $manager->persist($theme);
        $manager->flush();
    }
}
// symfony console doctrine :fixtures:load