<?php

namespace App\Controller\Admin;

use App\Controller\AbstractController;

class AdminController extends AbstractController
{
    public function showDashboard():void
    {
        $this->render('admin/dashboard');
    }
}