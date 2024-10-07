<?php

namespace App\Core;

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

        $this->addRoutes('/contact', function () {
            
        });
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
            }
        }
    }
}
