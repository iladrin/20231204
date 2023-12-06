<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $products = [];

        $products[] = (new Product())
            ->setName('Lunettes en fonte')
            ->setDescription('Lunettes génériques')
            ->setStock(5)
            ->setCreationDate(new \DateTimeImmutable('yesterday'));

        $products[] = (new Product())
            ->setName('Clavier en chips')
            ->setDescription('Clavier génériques')
            ->setStock(2)
            ->setCreationDate(new \DateTimeImmutable('-2 hours'));

        foreach ($products as $product) {
            $manager->persist($product);
        }

        $manager->flush();
    }
}
