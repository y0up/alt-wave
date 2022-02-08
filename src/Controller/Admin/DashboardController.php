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
use App\Repository\ProjectRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/admin.html.twig');
    }

    #[Route('/admin/feature', name: 'feature')]
    public function feature(ProjectRepository $projectRepo): Response
    {
        return $this->render('admin/feature.html.twig', [
            'projects' => $projectRepo->findBy(['askForHelp' => true]),
        ]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Alt Wave Dashboard');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Alt-Wave', 'fas fa-eye', 'home');
        yield MenuItem::linkToRoute('Demande d\'aide', 'fas fa-star', 'feature');
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

    public function configureActions(): Actions
    {
        return parent::configureActions()
        ->add(Crud::PAGE_INDEX, Action::DETAIL);
    }

    // function configureAssets(): Assets
    // {
    //     addWebpackEncoreEntry('Bulma');
    // }
}
