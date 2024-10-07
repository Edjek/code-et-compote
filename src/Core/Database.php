<?php

namespace App\Core;

class Database
{
    private static ?\PDO $pdo = null;

    public static function initConnexion(): void
    {
        if (self::$pdo  === null) {
            try {
                self::$pdo = new \PDO('mysql:host=localhost;dbname=forum_db', 'root', '', [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
            } catch (\PDOException $e) {
                die('Erreur de connexion à la base de donnée' . $e->getMessage());
            }
        }
    }

    public static function getPdo(): ?\PDO
    {
        return self::$pdo;
    }
}
