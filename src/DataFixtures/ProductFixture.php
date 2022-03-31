<?php

namespace App\DataFixtures;

use App\Entity\Product\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProductFixture extends Fixture 
{
    private const PRODUCT = [
        [
            1,
            'Test product name 1',
            'test-product-name-1'
        ], 
        [
            2,
            'Test product name 2',
            'test-product-name-2'
        ], 
        [
            3,
            'Test product name 3',
            'test-product-name-3'
        ], 
        [
            4,
            'Test product name 4',
            'test-product-name-4'
        ],
        [
            5,
            'Test product name 5',
            'test-product-name-5'
        ],
        [
            6,
            'Test product name 6',
            'test-product-name-6'
        ],
        [
            7,
            'Test product name 7',
            'test-product-name-7'
        ],
        [
            8,
            'Test product name 8',
            'test-product-name-8'
        ],
        [
            9,
            'Test product name 9',
            'test-product-name-9'
        ],
        [
            10,
            'Test product name 10',
            'test-product-name-10'
        ],
        [
            11,
            'Test product name 11',
            'test-product-name-11'
        ],
    ];

    public function load(ObjectManager $manager)
    {
        foreach(self::PRODUCT as list($ref, $name, $slug)){
            $product = new Product();
            $product->setName($name);
            $product->setSlug($slug);
            
            $manager->persist($product);
            $manager->flush();
            $this->addReference("product-{$ref}", $product);
        }
    }

    // public function getDependencies ()
    // {
    //     return [];
    // }
}
