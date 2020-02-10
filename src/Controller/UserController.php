<?php


namespace App\Controller;

use App\Entity\Post;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user_index")
     */
    public function index($max)
    {

    }

    /**
     * @Route("/user/{id}-{name}", name="user_show")
     * @param User $user
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function show(User $user,EntityManagerInterface $entityManager):Response
    {
        $postRepo = $entityManager->getRepository(Post::class);
        $lastPosts=$postRepo->findBy(['author'=>$user],['createdAt' => 'ASC'],10);
        return $this->render("user/show.html.twig",['user'=>$user,'lastPosts'=>$lastPosts]);
    }
}