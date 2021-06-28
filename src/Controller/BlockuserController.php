<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlockuserController extends AbstractController
{
    /**
     * @Route("/blockuser", name="blockuser")
     */
    public function index(): Response
    {
        return $this->render('blockuser/index.html.twig', [
            'controller_name' => 'BlockuserController',
        ]);
    }
}
