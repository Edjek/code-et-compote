<?php

namespace App\Repository;

use App\Repository\AbstractRepository;

class UserRepository extends AbstractRepository
{
    public function addUser($username, $email, $pswd)
    {
        $stmt = $this->pdo->prepare('INSERT INTO user (username, email, password) VALUES (:username, :email, :pswd)');

        $stmt->execute([':username' => $username, ':email' => $email, ':pswd' => $pswd]);
    }
}
