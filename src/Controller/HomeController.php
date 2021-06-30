<?php

namespace App\Controller;


use App\Entity\Friends;
use App\Entity\User;
use App\Form\AddfriendType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;


class HomeController extends AbstractController
{
    private $entityManager;
    private $friends;
    private $user;

    public function __construct(TokenStorageInterface $tokenStorage, EntityManagerInterface $entityManager)
    {
        $this->user = $tokenStorage->getToken()->getUser();
        $this->friends = new Friends();
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $users= $this->getDoctrine()->getRepository(User::class)->findAll();
  
        return $this->render('home/index.html.twig', array('users' => $users));
    }
    

        /**
     * @Route("/user/{id}", name="user_show")
     */
    public function show($id) {
        $user = $this->getDoctrine()->getRepository(User::class)->find($id);
  
        return $this->render('home/show.html.twig', array('user' => $user));
      }

    /**
     * @Route("/addFriend/{id}", name="addFriend")
     * @ParamConverter("user",  options={"id"="\d+"})
     * Method({"GET", "POST"})
     */

        public function addFriend(User $friend)
    {
        $loggedInUser = $this->user;
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $this->friends->setFriend($loggedInUser,$user);
        $this->entityManager->persist($this->friends);
        $this->entityManager->flush();
    }


} 

