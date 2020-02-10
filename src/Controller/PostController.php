<?php


namespace App\Controller;

use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Post;

class PostController extends AbstractController
{
    /**
     * @Route("/", name="post_index")
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $postRepo = $entityManager->getRepository(Post::class);
        $posts = $postRepo->findBy([], ['createdAt' => 'ASC'],50);
        return $this->render("post/index.html.twig",['posts'=>$posts]);
    }

    /**
     * @Route("/show/{id}-{name}", name="post_show")
     */
    public function show(Post $post):Response
    {
        return $this->render("post/show.html.twig",['post'=>$post]);
    }

    public function topPosts(PostRepository $postRepo,$limit=10) : Response
    {
        return $this->render("post/top.html.twig",['posts'=>$postRepo->findTop($limit)]);
    }

    public function lastPosts(PostRepository $postRepo,$limit=10) : Response
    {
        $lastPosts = $postRepo->findBy(array(), array('createdAt' => 'ASC'),10);
        return $this->render("post/top.html.twig",['posts'=>$lastPosts]);
    }
}