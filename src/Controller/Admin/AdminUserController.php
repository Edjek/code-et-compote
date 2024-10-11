<?php

namespace App\Controller\Admin;

use App\Controller\AbstractController;
use App\Core\Session;
use App\Repository\UserRepository;

class AdminUserController extends AbstractController
{
    public function showUsers(): void
    {
        $session = new Session();

        if ($session->isAdmin() === false) {
            header('Location:/code-et-compote/');
            exit;
        }

        $repository = new UserRepository();
        $users = $repository->findAll();

        $this->render('admin/users', ['users' => $users]);
    }

    public function showUpdateUserForm($params)
    {
        $id = $params['id'];

        $this->render('admin/updateUserForm', ['id'=> $id]);
    }
}
