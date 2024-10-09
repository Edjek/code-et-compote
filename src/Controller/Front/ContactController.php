<?php

namespace App\Controller\Front;

use App\Controller\AbstractController;

class ContactController extends AbstractController
{
    public function show(): void
    {
        $this->render('front/contactez-nous');
    }
}
