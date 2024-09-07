<?php

use CodeIgniter\Router\RouteCollection;

/*
 * @var RouteCollection $routes
 */

 $routes->get('/', 'ExpenseTrackerController::index');
 $routes->get('register', 'UserController::register');
$routes->post('register', 'UserController::create');
