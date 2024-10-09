<?php

namespace App\Repository;

use App\Repository\AbstractRepository;

class UserRepository extends AbstractRepository
{
    public function addUser(string $username, string $email, string $pswd): void
    {
        $stmt = $this->pdo->prepare('INSERT INTO user (username, email, password) VALUES (:username, :email, :pswd)');

        $stmt->execute([':username' => $username, ':email' => $email, ':pswd' => $pswd]);
    }

    public function checkIfUsernameExists(string $username): array | bool
    {
        $stmt = $this->pdo->prepare('SELECT * FROM user WHERE username=:username');
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function checkIfEmailExists(string $email): array | bool
    {
        $stmt = $this->pdo->prepare('SELECT * FROM user WHERE email=:email');
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return $stmt->fetch();
    }
}
