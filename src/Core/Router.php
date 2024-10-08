<?php

namespace App\Core;

use App\Controller\Front\ContactController;
use App\Controller\Front\HomeController;
use App\Controller\Front\UserController;

class Router
{
    private array $routes;
    private object $currentController;

    public function __construct()
    {
        $this->addRoutes('/', function () {
            $this->currentController = new HomeController();
            $this->currentController->show();
        });

        $this->addRoutes('/contactez-nous', function () {
            $this->currentController = new ContactController();
            $this->currentController->show();
        });

        $this->addRoutes('/inscription', function () {
            $this->currentController = new UserController();
            $this->currentController->showSignUpForm();
        });


        // creer une route /processForm
        // UserController processSignUpForm
        // Verifieer que le formulaire est envoyé en POST, traiter les données? verifier que l'email a le bon format
        // Sauvergarder en base
    }

    private function addRoutes(string $route, callable $closure)
    {
        $this->routes[$route] = $closure;
    }

    public function execute()
    {
        $requestUri = $_SERVER['REQUEST_URI'];
        $requestUri = str_replace('/code-et-compote', '', $requestUri);

        foreach ($this->routes as $key => $closure) {
            if ($requestUri === $key) {
                $closure();
                return;
            }
        }

        header('HTTP/1.0 404 Not Found');
        include_once '../templates/error-404.php';
    }
}
