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
            $this->session->createFlashMessage('Veuillez ajouter un pseudo');
            header('Location:/code-et-compote/inscription');
            exit;
        }

        if (!isset($_POST['email']) || empty($_POST['email'])) {
            $this->session->createFlashMessage('Veuillez ajouter un email');
            header('Location:/code-et-compote/inscription');
            exit;
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $this->session->createFlashMessage('Votre email n\'est pas correct');
            header('Location:/code-et-compote/inscription');
            exit;
        }

        if (!isset($_POST['pswd']) || empty($_POST['pswd'])) {
            $this->session->createFlashMessage('Veuillez ajouter un mot de passe');
            header('Location:/code-et-compote/inscription');
            exit;
        }

        $username = trim($_POST['pseudo']);
        $email = trim($_POST['email']);
        $pswd = password_hash(trim($_POST['pswd']), PASSWORD_DEFAULT);

        $repository = new UserRepository();
        $user = $repository->findUserByUsername($username);

        if ($user !== false) {
            $this->session->createFlashMessage('Ce pseudo est déjà utilisé');
            header('Location:/code-et-compote/inscription');
            exit;
        }

        $userByEMail = $repository->findUserByEmail($email);

        if ($userByEMail !== false) {
            $this->session->createFlashMessage('Cet email est déjà utilisé');
            header('Location:/code-et-compote/inscription');
            exit;
        }

        $repository->addUser($username, $email, $pswd);
        $this->session->createFlashMessage('Votre compte à bien été créé');

        header('Location:/code-et-compote/');
        exit;
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
            $this->session->createFlashMessage('Veuillez ajouter un email');
            header('Location:/code-et-compote/connexion');
            exit;
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $this->session->createFlashMessage('Votre email n\'est pas correct');
            header('Location:/code-et-compote/connexion');
            exit;
        }

        if (!isset($_POST['pswd']) || empty($_POST['pswd'])) {
            $this->session->createFlashMessage('Veuillez ajouter un mot de passe');
            header('Location:/code-et-compote/connexion');
            exit;
        }

        $email = trim($_POST['email']);
        $pswd = trim($_POST['pswd']);

        $repository = new UserRepository();
        $user = $repository->findUserByEmail($email);

        if ($user === false) {
            $this->session->createFlashMessage('Vos identifiants sont incorrect');
            header('Location:/code-et-compote/connexion');
            exit;
        }

        if (password_verify($pswd, $user['password']) === false) {
            $this->session->createFlashMessage('Vos identifiants sont incorrect');
            header('Location:/code-et-compote/connexion');
            exit;
        };

        $this->session->createUserSession($user);
        $this->session->createFlashMessage('Vous êtes connecté!');

        header('Location:/code-et-compote/');
        exit;
    }

    /**
     * @return void
     */
    public function logout(): void
    {
        $this->session->destroySession();
        $this->session->createFlashMessage('Vous êtes déconnecté!');

        header('Location:/code-et-compote/');
        exit;
    }
}
