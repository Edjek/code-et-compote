<?php

namespace App\Controller\Front;

use App\Controller\AbstractController;
use App\Repository\UserRepository;

class UserController extends AbstractController
{
    /**
     * @return void
     */
    public function showSignUpForm(): void
    {
        $this->render('front/sign-up');
    }

    /**
     * @return void
     */
    public function processSignUpForm(): void
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

        $user = $repository->findUserByUsername($username);

        if ($user !== false) {
            header('Location:/code-et-compote/inscription');
            exit;
        }

        $email = $repository->findUserByEmail($email);

        if ($email !== false) {
            header('Location:/code-et-compote/inscription');
            exit;
        }

        $repository->addUser($username, $email, $pswd);
    }

    public function showSignInForm(): void
    {
        $this->render('front/sign-in');
    }

    /**
     * @return void
     */
    public function processSignInForm(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location:/code-et-compote/connexion');
            exit;
        }

        if (!isset($_POST['email']) || empty($_POST['email'])) {
            header('Location:/code-et-compote/connexion');
            exit;
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            header('Location:/code-et-compote/connexion');
            exit;
        }

        if (!isset($_POST['pswd']) || empty($_POST['pswd'])) {
            header('Location:/code-et-compote/connexion');
            exit;
        }

        $email = trim($_POST['email']);
        $pswd = trim($_POST['pswd']);

        $repository = new UserRepository();
        $user = $repository->findUserByEmail($email);

        if ($user === false) {
            header('Location:/code-et-compote/connexion');
            exit;
        }

        if (password_verify($pswd, $user['password']) === false) {
            header('Location:/code-et-compote/connexion');
            exit;
        };

        header('Location:/code-et-compote/');
        exit;
    }
}
