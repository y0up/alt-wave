<?php

namespace App\Controller\Admin;

use App\Entity\Tag;
use App\Entity\Need;
use App\Entity\Step;
use App\Entity\User;
use App\Entity\Domain;
use App\Entity\Social;
use App\Entity\Project;
use App\Entity\Category;
use App\Entity\SocialLink;
use App\Entity\NeedContent;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(CategoryCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('admin/admin.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Alt Wave Dashboard');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Projets', 'fas fa-photo-video', Project::class);
        yield MenuItem::linkToCrud('Categories', 'fas fa-th', Category::class);
        yield MenuItem::linkToCrud('Domaines', 'fas fa-palette', Domain::class);
        yield MenuItem::linkToCrud('Etapes', 'fas fa-tasks', Step::class);
        yield MenuItem::linkToCrud('Tags', 'fas fa-tags', Tag::class);
        yield MenuItem::linkToCrud('Besoins', 'fas fa-question-circle', Need::class);
        yield MenuItem::linkToCrud('spécificitées des besoins', 'fas fa-ellipsis-v', NeedContent::class);
        yield MenuItem::linkToCrud('Réseaux sociaux', 'fas fa-hashtag', Social::class);
        yield MenuItem::linkToCrud('Liens RS utilisateurs', 'fas fa-link', SocialLink::class);
    }
}
