<?php
// src/Controller/MainController.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(): Response
    {        

        return $this->render('base.html.twig', [
        ]);
        
    }

    #[Route('/{slug<^((?!login|register|verify).)*$>}', name: '{slug}' )]
    public function show($slug): Response
    {        

        return new Response(sprintf(
            'Future page to show a project or a profile "%s"!',
            $slug
        ));
        
    }
}