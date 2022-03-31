<?php

namespace App\Entity\Product;

use App\Entity\EntityIdTrait;
use App\Entity\EntityNameTrait;
use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    use EntityIdTrait;
    use EntityNameTrait;
}
