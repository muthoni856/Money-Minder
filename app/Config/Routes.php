<?php

use CodeIgniter\Router\RouteCollection;

/*
 * @var RouteCollection $routes
 */

 $routes->get('/', 'ExpenseTrackerController::index');
 $routes->get('register', 'RegistrationController::register');
$routes->post('register', 'RegistrationController::create');
//Routes for Login
$routes->get('login','LoginController::login');
$routes->post('login','LoginController::login');

//Route for Logout
$routes->get('logout','LoginController::logout');