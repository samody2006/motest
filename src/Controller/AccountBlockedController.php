<?php

namespace App\Controller;

use App\Repository\IpBlockedRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountBlockedController extends AbstractController
{
    /**
     * @Route("/account/blocked", name="account_blocked")
     */
    public function index(IpBlockedRepository $ipBlockedRepo, Request $request): Response
    {
        if (!$ipBlockedRepo->findOneBy(['ipAddress' => $request->getClientIp()])){
            return $this->redirectToRoute('app_login');
        }
        
        return $this->render('account_blocked/index.html.twig', [
            'controller_name' => 'AccountBlockedController',
        ]);
    }
}
