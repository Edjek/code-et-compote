<?php

namespace App\Controller\Admin;

use App\Controller\AbstractController;

class AdminController extends AbstractController
{
    public function showDashboard(): void
    {
        if ($this->session->isAdmin() === false) {
            header('Location:/code-et-compote/');
            exit;
        }

        $this->render('admin/dashboard');
    }
}
