<?php

namespace App\Repository;

class TopicRepository
{
    public function findAll(): array | false
    {
        $pdo = new \PDO('mysql:host=localhost;dbname=forum_db', 'root', '', [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
        $stmt = $pdo->prepare('SELECT * FROM topic');
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
