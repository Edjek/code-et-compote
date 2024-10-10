<?php

namespace App\Controller\Front;

use App\Controller\AbstractController;
use App\Repository\TopicRepository;

class TopicController extends AbstractController
{
    public function showTopic(array $params)
    {
        $id = $params['id'];

        $repository = new TopicRepository();
        $messages = $repository->findAllMessageByTopicId($id);

        $this->render('front/topic', ['messages' => $messages]);
    }
}
