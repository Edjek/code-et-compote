<?php

namespace App\Controller\Admin;

use App\Controller\AbstractController;
use App\Repository\UserRepository;

class AdminUserController extends AbstractController
{
    /**
     * @return void
     */
    private function checkAdminAuthorization(): void
    {
        if ($this->session->isAdmin() === false) {
            header('Location:/code-et-compote/');
            exit;
        }
    }

    /**
     * @return void
     */
    public function showUsers(): void
    {
        $this->checkAdminAuthorization();

        $repository = new UserRepository();
        $users = $repository->findAll();

        $this->render('admin/users', ['users' => $users]);
    }

    /**
     * @return void
     */
    public function showAddUserForm(): void
    {
        $this->checkAdminAuthorization();

        $this->render('admin/add-user-form');
    }

    /**
     * @return void
     */
    public function processAddUserForm(): void
    {
        $this->checkAdminAuthorization();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location:/code-et-compote/admin/utilisateurs/ajouter');
            exit;
        }

        if (!isset($_POST['pseudo']) || empty($_POST['pseudo'])) {
            $this->session->createFlashMessage('Veuillez ajouter un pseudo');

            header('Location:/code-et-compote/admin/utilisateurs/ajouter');
            exit;
        }

        if (!isset($_POST['email']) || empty($_POST['email'])) {
            $this->session->createFlashMessage('Veuillez ajouter un email');

            header('Location:/code-et-compote/admin/utilisateurs/ajouter');
            exit;
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $this->session->createFlashMessage('Votre email n\'est pas correct');

            header('Location:/code-et-compote/admin/utilisateurs/ajouter');
            exit;
        }

        if (!isset($_POST['pswd']) || empty($_POST['pswd'])) {
            $this->session->createFlashMessage('Veuillez ajouter un mot de passe');

            header('Location:/code-et-compote/admin/utilisateurs/ajouter');
            exit;
        }

        if (!isset($_POST['status']) || empty($_POST['status'])) {
            $this->session->createFlashMessage('Veuillez selectionner un status');

            header('Location:/code-et-compote/admin/utilisateurs/ajouter');
            exit;
        }

        $pseudo = trim($_POST['pseudo']);
        $email = trim($_POST['email']);
        $pswd = password_hash(trim($_POST['pswd']), PASSWORD_DEFAULT);
        $status = trim($_POST['status']);

        $repository = new UserRepository();
        $repository->addUserWithStatus($pseudo, $email, $pswd, $status);

        $this->session->createFlashMessage('Un nouvel utilisateur a été ajouté');

        header('Location:/code-et-compote/admin/utilisateurs');
        exit;
    }

    /**
     * @param array $params
     *
     * @return void
     */
    public function showUpdateUserForm(array $params): void
    {
        $this->checkAdminAuthorization();

        $id = $params['id'];

        if (filter_var($id, FILTER_VALIDATE_INT) === false) {
            header('Location:/code-et-compote/admin/utilisateurs');
            exit;
        }

        $repository = new UserRepository();
        $user = $repository->findById($id);

        $this->render('admin/update-user-form', ['id' => $id, 'user' => $user]);
    }

    /**
     * @return void
     */
    public function processUpdateUserForm(): void
    {
        $this->checkAdminAuthorization();

        $id = trim(htmlspecialchars($_POST['id']));

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location:/code-et-compote/admin/utilisateurs/modifier/' . $id);
            exit;
        }

        if (!isset($_POST['pseudo']) || empty($_POST['pseudo'])) {
            $this->session->createFlashMessage('Veuillez ajouter un pseudo');
            header('Location:/code-et-compote/admin/utilisateurs/modifier/' . $id);
            exit;
        }

        if (!isset($_POST['email']) || empty($_POST['email'])) {
            $this->session->createFlashMessage('Veuillez ajouter un email');
            header('Location:/code-et-compote/admin/utilisateurs/modifier/' . $id);
            exit;
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $this->session->createFlashMessage('Votre email n\'est pas correct');
            header('Location:/code-et-compote/admin/utilisateurs/modifier/' . $id);
            exit;
        }

        if (!isset($_POST['status']) || empty($_POST['status'])) {
            $this->session->createFlashMessage('Veuillez selectionner un status');
            header('Location:/code-et-compote/admin/utilisateurs/modifier/' . $id);
            exit;
        }

        $pseudo = trim($_POST['pseudo']);
        $email = trim($_POST['email']);
        $status = trim($_POST['status']);

        $repository = new UserRepository();
        $repository->updateUserById($id, $pseudo, $email, $status);

        $this->session->createFlashMessage('Un utilisateur a été modifié');

        header('Location:/code-et-compote/admin/utilisateurs/modifier/' . $id);
        exit;
    }

    /**
     * @param array $params
     *
     * @return void
     */
    public function deleteUser(array $params): void
    {
        $this->checkAdminAuthorization();

        $id = $params['id'];

        $repository = new UserRepository();
        $repository->deleteUser($id);

        $this->session->createFlashMessage('Un utilisateur a été supprimé');

        header('Location:/code-et-compote/admin/utilisateurs');
        exit;
    }
}
