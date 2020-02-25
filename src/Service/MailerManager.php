<?php


namespace App\Service;


use App\Entity\User;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class MailerManager
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function confirmRegistration(User $user){
        $email = (new Email())
            ->from('hello@blog.com')
            ->to($user->getEmail())
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Bienvenue')
            ->html('<p>Welcome to the Blog !</p>');

        $this->mailer->send($email);
    }
}