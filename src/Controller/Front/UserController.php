<?php

namespace App\Controller\Front;

use App\Controller\AbstractController;
use App\Repository\UserRepository;

class UserController extends AbstractController
{
    public function showSignUpForm()
    {
        $this->render('front/sign-up');
    }

    public function processSignUpForm()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location:/code-et-compote/inscription');
            exit;
        }

        if (!isset($_POST['pseudo']) || empty($_POST['pseudo'])) {
            header('Location:/code-et-compote/inscription');
            exit;
        }

        if (!isset($_POST['email']) || empty($_POST['email'])) {
            header('Location:/code-et-compote/inscription');
            exit;
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            header('Location:/code-et-compote/inscription');
            exit;
        }

        if (!isset($_POST['pswd']) || empty($_POST['pswd'])) {
            header('Location:/code-et-compote/inscription');
            exit;
        }
        $username = trim($_POST['pseudo']);
        $email = trim($_POST['email']);
        $pswd = trim($_POST['pswd']);
        $pswd = password_hash($pswd, PASSWORD_DEFAULT);




        $repository = new UserRepository();

        // On doit verifier si ce pseudo ou si cet email existe en bdd

        // je veux 2 test
        // Si le pseudo existe on lui dira ce pseudo est deja utilisé
        // Si l'email existe on lui dira cet email est deja utilisé
        $repository->addUser($username, $email, $pswd);


    }
}
