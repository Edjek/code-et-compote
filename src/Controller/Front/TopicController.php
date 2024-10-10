<?php

namespace App\Controller\Front;

use App\Controller\AbstractController;

class TopicController extends AbstractController
{
    public function showTopic($params)
    {

        $id = $params['id'];

        // requete vers la bdd je veux recuperer tous les messages qui sont dans le topic en question
        // la requete prendra id en parametre

        // afficher la discussion templates topic.php

    }
}
