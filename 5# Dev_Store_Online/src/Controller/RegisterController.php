<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use App\Security\LoginAuthenticator;
use App\Service\Mail;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

/**
	* Manually created registration form
	* Once registered, the user is automatically authenticated.
 */
class RegisterController extends AbstractController
{
    #[Route('/inscription', name: 'register')]
    public function index(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, LoginAuthenticator $authenticator, EntityManagerInterface $em): Response
    {
        $user = new User();

        $form = $this->createForm(RegisterType::class,$user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword($userPasswordHasher->hashPassword($user,$form->get('password')->getData()));

            $em->persist($user);
            $em->flush();

            // Send confirmation email
            $content = "Bonjour {$user->getFirstname()} nous vous remercions de votre inscription";
            (new Mail)->send($user->getEmail(), $user->getFirstname(), "Bienvenue sur la Boot'ique", $content);

            // Auto login
            return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );
        }

        return $this->renderForm('register/index.html.twig', [
            'form' => $form,
        ]);
    }
}
