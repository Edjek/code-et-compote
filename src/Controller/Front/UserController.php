<?php

namespace App\Controller\Front;

use App\Controller\AbstractController;

class UserController extends AbstractController
{
    public function showSignUpForm(){
        $this->render('front/sign-up');
    }
}