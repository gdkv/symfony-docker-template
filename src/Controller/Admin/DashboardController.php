<?php

namespace App\Controller\Admin;

use App\Entity\Product\Product;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(ProductCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('App');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToUrl('На сайт', 'fas fa-home', '/')
                ->setLinkTarget('_blank')
                ->setLinkRel('noreferrer'),
            
            MenuItem::section('Основные', 'fas fa-folder-open'),

            MenuItem::section('Магазин', 'fas fa-folder-open'),
            MenuItem::linkToCrud('Продукция', 'fas fa-gem', Product::class),

            MenuItem::section('Дополнительно', 'fas fa-folder-open'),
        ];
    }
}
