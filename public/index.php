<?php

use App\Core\Autoloader;
use App\Core\Router;

include_once '../src/Core/Autoloader.php';

Autoloader::register();
$router = new Router();
$router->execute();
