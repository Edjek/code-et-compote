<?php

namespace App\Repository;

use App\Repository\AbstractRepository;

class UserRepository extends AbstractRepository
{
    public function addUser($username, $email, $pswd)
    {
        $stmt = $this->pdo->prepare('INSERT INTO user (username, email, password) VALUES (:username, :email, :pswd)');
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pswd', $pswd);

        $stmt->execute();
    }
}
