<?php


namespace App\Service;


use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserAccountManager
{
    private $mailerManager;
    private $passwordEncoder;
    private $entityManager;

    public function __construct(MailerManager $mailerManager,UserPasswordEncoderInterface $passwordEncoder, EntityManager $entityManager)
    {
        $this->mailerManager = $mailerManager;
        $this->passwordEncoder = $passwordEncoder;
        $this->entityManager=$entityManager;
    }

    public function createUser(User $user,$password){
        $user->setPassword(
            $this->passwordEncoder->encodePassword($user, $password)->getData()
        );
        $user->setIsActive(true);
        $user->setIsBlocked(false);
        $user->setRoles(['ROLE_ADMIN']);

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        $this->mailerManager->confirmRegistration($user);
    }

    public function forgotPassword($user){

    }
}