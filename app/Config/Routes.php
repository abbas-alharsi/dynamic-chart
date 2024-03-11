<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/','MyController::myView');
$routes->get('/update-chart/(:any)','MyController::updateChart/$1');
