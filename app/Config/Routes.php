<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/cliente', 'Home::cliente');
$routes->get('/factura', 'Home::factura');
$routes->get('/mayor25', 'Home::mayor25');
$routes->get('/insertar/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)', 'Home::insertar/($1)/($2)/($3)/($4)/($5)/($6)/($7)/($8)');