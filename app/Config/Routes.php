<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
#$routes->get('/', 'Home::index');
$routes->get('dashboard/', 'Dashboard::index');
$routes->get('testdb', 'DatabaseTest::index');
$routes->get('/login', 'Auth::index');
$routes->post('/login', 'Auth::login');
$routes->get('logout', 'Auth::logout');
$routes->get('products', 'Product::index');
$routes->get('products/detail/(:segment)', 'Product::detail/$1');
$routes->get('products/new', 'Product::new');
$routes->post('products/create', 'Product::create');
$routes->get('products/edit/(:segment)', 'Product::edit/$1');
$routes->post('products/update/(:segment)', 'Product::update/$1');
$routes->get('stock', 'Stock::index');
$routes->get('reports', 'Reports::index');
