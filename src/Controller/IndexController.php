<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{

    #[Route('/', priority: 1, name: 'app_index')]
    public function __invoke(): Response
    {
        return $this->render('index/index.html.twig', []);
    }

}
