<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\PropertyController;
use Controllers\SellerController;
use Controllers\PagesController;

$router = new Router();

// Private area
$router->get('/admin', [PropertyController::class, 'index']);
$router->get('/properties/create', [PropertyController::class, 'create']);
$router->post('/properties/create', [PropertyController::class, 'create']);
$router->get('/properties/update', [PropertyController::class, 'update']);
$router->post('/properties/update', [PropertyController::class, 'update']);
$router->post('/properties/delete', [PropertyController::class, 'delete']);

$router->get('/sellers/create', [SellerController::class, 'create']);
$router->post('/sellers/create', [SellerController::class, 'create']);
$router->get('/sellers/update', [SellerController::class, 'update']);
$router->post('/sellers/update', [SellerController::class, 'update']);
$router->post('/sellers/delete', [SellerController::class, 'delete']);

// Public area
$router->get('/', [PagesController::class, 'index']);
$router->get('/about', [PagesController::class, 'about']);
$router->get('/properties', [PagesController::class, 'properties']);
$router->get('/property', [PagesController::class, 'property']);
$router->get('/blog', [PagesController::class, 'blog']);
$router->get('/entry', [PagesController::class, 'entry']);
$router->get('/contact', [PagesController::class, 'contact']);
$router->post('/contact', [PagesController::class, 'contact']);

$router->checkRoutes();