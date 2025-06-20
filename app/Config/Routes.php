<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Redirect root to login page
$routes->get('/', 'Auth::index');

// Authentication routes
$routes->get('login', 'Auth::index');
$routes->post('login', 'Auth::login');
$routes->get('logout', 'Auth::logout');
$routes->get('register', 'Auth::register');
$routes->post('register', 'Auth::createAccount');
$routes->get('forgot-password', 'Auth::forgotPassword');
$routes->post('forgot-password', 'Auth::sendResetLink');

// Database test route
$routes->get('database-test', 'DatabaseTest::index');

// Application routes (protected by auth filter)
$routes->group('', ['filter' => 'auth'], static function ($routes) {
    $routes->get('dashboard', 'Dashboard::index');
    
    // Product routes
    $routes->resource('products', ['controller' => 'Product']);

    // Category routes
    $routes->resource('categories', ['controller' => 'CategoryController']);

    // Stock routes
    $routes->get('stock', 'Stock::index');
    $routes->post('stock/in', 'Stock::stockIn');
    $routes->post('stock/out', 'Stock::stockOut');

    // Report routes
    $routes->get('reports', 'Reports::index');
    $routes->post('reports/generate', 'Reports::generate');
    
    // Settings routes
    $routes->get('settings', 'Settings::index');
    $routes->post('settings/update', 'Settings::update');
});
