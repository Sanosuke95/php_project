<?php

use App\Controller\HomeController;
use Core\Router;

require '../lib/autoload.php';

$route = new Router();

$route->get('/', [HomeController::class, 'index']);

$route->get('/contact', [HomeController::class, 'contact']);

$route->get('/about', [HomeController::class, 'about']);

$route->dispatch();

//créer un router en php natif