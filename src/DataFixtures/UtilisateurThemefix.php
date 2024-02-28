<?php

namespace App\DataFixtures;

use App\Entity\UtilisateurTheme;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UtilisateurThemefix extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $product = new UtilisateurTheme();
        $product->setTheme();
        $manager->persist($product);

        $manager->flush();
    }
}