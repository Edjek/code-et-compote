<?php

namespace App\Core;

use App\Controller\Front\ContactController;
use App\Controller\Front\HomeController;
use App\Controller\Front\UserController;

class Router
{
    /**
     * @var array
     */
    private array $routes;

    /**
     * @var object
     */
    private object $currentController;

    public function __construct()
    {
        $this->addRoutes('/', function (): void {
            $this->currentController = new HomeController();
            $this->currentController->show();
        });

        $this->addRoutes('/contactez-nous', function (): void {
            $this->currentController = new ContactController();
            $this->currentController->show();
        });

        $this->addRoutes('/inscription', function (): void {
            $this->currentController = new UserController();
            $this->currentController->showSignUpForm();
        });

        $this->addRoutes('/processSignUpForm', function (): void {
            $this->currentController = new UserController();
            $this->currentController->processSignUpForm();
        });

        $this->addRoutes('/connexion', function (): void {
            $this->currentController = new UserController();
            $this->currentController->showSignInForm();
        });

        $this->addRoutes('/processSignInForm', function (): void {
            $this->currentController = new UserController();
            $this->currentController->processSignInForm();
        });

        // 2 routes :
        // Afficher un formulaire de connexion /connexion
        // UserController : showSignInForm

        // Traiter le formulaire de connexion /processSignInForm
        // UserController : processSignInForm

    }

    /**
     * @param string $route
     * @param callable $closure
     *
     * @return void
     */
    private function addRoutes(string $route, callable $closure): void
    {
        $this->routes[$route] = $closure;
    }

    /**
     * @return void
     */
    public function execute(): void
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
