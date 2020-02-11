<?php


namespace App\Controller;

use App\Entity\User;
use App\Form\Type\PostType;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @Route("/add", name="post_add")
     */
    public function add(Request $request,EntityManagerInterface $entityManager):Response
    {
        $post = new Post();
        $form = $this->createForm(PostType::class,$post);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            //TODO("Handle error when no user are found")
            $userRepo = $entityManager->getRepository(User::class);
            $user = $userRepo->findBy([],null,1)[0];

            $post = $form->getData();
            $post->setCreatedAt(new \DateTime());
            $post->setIsDeleted(false);
            $post->setAuthor($user);
            $entityManager->persist($post);
            $entityManager->flush();

            return $this->redirectToRoute('post_index');
        }

        return $this->render('post/add.html.twig',['form'=>$form->createView()]);
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