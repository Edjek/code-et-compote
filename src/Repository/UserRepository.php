<?php

namespace App\Repository;

use App\Repository\AbstractRepository;

class UserRepository extends AbstractRepository
{
    /**
     * @param string $username
     * @param string $email
     * @param string $pswd
     *
     * @return void
     */
    public function addUser(string $username, string $email, string $pswd): void
    {
        $stmt = $this->pdo->prepare('INSERT INTO user (username, email, password) VALUES (:username, :email, :pswd)');

        $stmt->execute([':username' => $username, ':email' => $email, ':pswd' => $pswd]);
    }

    /**
     * @param string $username
     *
     * @return array|bool
     */
    public function findUserByUsername(string $username): array | bool
    {
        $stmt = $this->pdo->prepare('SELECT * FROM user WHERE username=:username');
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        return $stmt->fetch();
    }

    /**
     * @param string $email
     *
     * @return array|bool
     */
    public function findUserByEmail(string $email): array | bool
    {
        $stmt = $this->pdo->prepare('SELECT * FROM user WHERE email=:email');
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return $stmt->fetch();
    }
}
