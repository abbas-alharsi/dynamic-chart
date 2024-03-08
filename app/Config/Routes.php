<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'MyController::myView');
$routes->get('/getdata/(:any)', 'MyController::getData/$1');

