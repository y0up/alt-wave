<?php
// src/Controller/MainController.php
namespace App\Controller;

use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;

class MainController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(): Response
    {        

        return $this->render('base.html.twig', [
        ]);
        
    }

    #[Route('/{slug<^((?!login|register|verify).)*$>}', name: '{slug}' )]
    public function show($slug, MailerInterface $mailer): Response
    {        

        $email = (new Email())
                ->from('from@example.com')
                ->to('to@example.com')
                ->subject('verify your account!')
                ->text('tu es sur la page de '.$slug);
        
        try{
            $mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            dd($e);
        }
        return new Response(sprintf(
            'Future page to show a project or a profile "%s"!',
            $slug
        ));
        
    }
}