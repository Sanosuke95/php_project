<?php

use App\Controller\UserController;
use Core\Router;

require 'lib/autoload.php';

$router = new Router();

$router->get('/', UserController::class, 'getUser');

$router->dispatch();

// $user = new UserController();
// $user->getUser();
