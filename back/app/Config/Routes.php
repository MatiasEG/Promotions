<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('welcome_message/addPromo', 'Home::addPromo');
$routes->get('welcome_message/deletePromo/(:num)', 'Home::deletePromo/$1');
$routes->post('welcome_message/editPromo/(:num)', 'Home::editPromo/$1');
$routes->get('public/(:segment)', 'Home::showImage/$1');