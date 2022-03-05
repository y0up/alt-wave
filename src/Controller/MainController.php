<?php
// src/Controller/MainController.php
namespace App\Controller;

use App\Repository\ProjectRepository;
use App\Repository\UserRepository;
use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;

class MainController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(): Response
    {        
        $user = $this->getUser();

        return $this->render('base.html.twig', [
            'user' => $user
        ]);
        
    }

    #[Route('/{slug<^((?!login|register|verify).)*$>}', name: '{slug}' )]
    public function show($slug, UserRepository $userRepo, ProjectRepository $projectRepo): Response
    {        

        $currentUser = $this->getUser();
        $user = $userRepo->findOneBy(['slug' => $slug]);

        if ($user) {
            return $this->render('main/profile.html.twig', [
                'user' => $user,
                'currentUser' => $currentUser,
            ]);
        }
        if ($projectRepo->findOneBy(['name' => $slug])) {
            dd('page de projet');
        }
        
    }


}