<?php

namespace App\Repository;

use App\Repository\AbstractRepository;

class TopicRepository extends AbstractRepository
{
    public function findAll(): array | false
    {
        $stmt = $this->pdo->prepare('SELECT * FROM topic');
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
