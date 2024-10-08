<?php

namespace App\Controller\Front;

use App\Controller\AbstractController;
use App\Repository\TopicRepository;

class HomeController extends AbstractController
{
    public function show()
    {
        $repository = new TopicRepository();
        $topics = $repository->findAll();

        $this->render('front/home', ['topics' => $topics,]);
    }
}
