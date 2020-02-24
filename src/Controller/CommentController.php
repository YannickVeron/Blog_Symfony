<?php


namespace App\Controller;


use App\Entity\Comment;
use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends AbstractController
{
    /**
     * @Route("/comment/add", name="comment_add")
     */
    public function add(Request $request,EntityManagerInterface $entityManager):Response
    {
        $comment = new Comment();

        $form = $this->createFormBuilder($comment)
            ->add('content', TextType::class)
            ->getForm();
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            /*$commentRepo = $entityManager->getRepository(Comment::class);
            $comment = $commentRepo->findBy([],null,1)[0];

            $comment = $form->getData();
            $comment->setCreatedAt(new \DateTime());
            $comment->setIsDeleted(false);
            $comment->setAuthor($this->getUser());
            //$comment->setPost($post):
            $entityManager->persist($comment);
            $entityManager->flush();
            return $this->redirectToRoute('post_index');*/

            dd($request);
        }

        return $this->render('comment/add.html.twig',['form'=>$form->createView()]);
    }
}