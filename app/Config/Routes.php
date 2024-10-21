<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'DataController::index');
$routes->post('/store', 'DataController::store');
