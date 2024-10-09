<?php

namespace App\Core;

class Session
{
    public function __construct()
    {
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
    }

    public function createFlashMessage(string $message): void
    {
        $_SESSION['message'] = $message;
    }

    public function getFlashMessage(): void
    {
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
    }

    public function createUserSession(array $user):void
    {
        $_SESSION['is_logged'] = true;
        $_SESSION['status'] = $user['status'];

    }
}
