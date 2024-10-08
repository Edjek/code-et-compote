<?php

namespace App\Controller\Front;

use App\Controller\AbstractController;

class ContactController extends AbstractController
{
    public function show(){
        $this->render('front/contactez-nous', ['']);
    }
}
