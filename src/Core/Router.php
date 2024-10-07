<?php

namespace App\Core;

use App\Controller\Front\ContactController;
use App\Controller\Front\HomeController;

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



        //  Creez une route /contactez-nous
        // Le Controller ContactController : methode show() qui affiche un formulaire de contact
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
