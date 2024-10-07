<?php

namespace App\Controller\Front;

use App\Repository\TopicRepository;

class HomeController
{
    public function show()
    {
        $repository = new TopicRepository();
        $topics = $repository->findAll();
        include_once '../templates/front/home.php';
    }
}
