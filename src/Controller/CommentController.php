<?php


namespace App\Controller;


use App\Entity\Comment;
use App\Entity\Post;
use App\Repository\CommentRepository;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends AbstractController
{
    /**
     * @Route("/post/{post}/comment/add", name="comment_add")
     */
    public function add(Request $request,Post $post, EntityManagerInterface $entityManager):Response
    {
        $comment = new Comment();
        $comment->setAuthor($this->getUser());
        $comment->setPost($post);
        $comment->setContent($request->request->get('content'));
        $comment->setIsDeleted(false);
        $comment->setCreatedAt(new \DateTime());

        $entityManager->persist($comment);
        $entityManager->flush();

        return $this->redirectToRoute('post_show',['id'=>$post->getId(),'name'=>$post->getTitle()]);
    }
}