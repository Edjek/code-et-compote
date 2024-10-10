<?php

namespace App\Repository;

use App\Repository\AbstractRepository;

class TopicRepository extends AbstractRepository
{
    /**
     * @return array
     */
    public function findAll(): array | bool
    {
        $stmt = $this->pdo->prepare('SELECT * FROM topic');
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function findAllMessageByTopicId(int $id): array | bool
    {
        $stmt = $this->pdo->prepare('SELECT * FROM message WHERE topic_id=:id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}
