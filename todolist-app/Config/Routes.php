<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/login', 'loginController::index');
$routes->post('/login/auth', 'loginController::auth');
$routes->get('/login/logout', 'loginController::logout');
$routes->get('/dashboard', 'dashboard::index');
