<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Utilisateurfix extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $product = new Utilisateur();
        $product->setPassword("toto");
        $product->setPseudo('oliveur83');
        $manager->persist($product);

        $manager->flush();
    }
}