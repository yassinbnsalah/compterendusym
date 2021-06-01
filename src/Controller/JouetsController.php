<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JouetsController extends AbstractController
{
    /**
     * @Route("/gestion_jouets", name="gest_jouets")
     */
    public function index(): Response
    {
        return $this->render('jouets/index.html.twig', [
            'controller_name' => 'JouetsController',
        ]);
    }
    /**
     * @Route("/jouets/new" , name="jouet_creat")
     */
    public function create()
    {

    }

}
