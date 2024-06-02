<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//routes users
$routes->get('/', 'Admin\DashboardController::index');
//$routes->get('/', 'LunaFrostController::index');
$routes->get('/lunafrost', 'LunaFrostController::index');
$routes->get('/index', 'LunaFrostController::index');
$routes->get('/about', 'LunaFrostController::about');
$routes->get('/menshirt', 'LunaFrostController::product');
$routes->get('/single-product', 'LunaFrostController::singleproduct');




//routes dashboard admin
$routes->get('/dashboard', 'Admin\DashboardController::index');

//routes product list admin
$routes->get('/product-list', 'Admin\ProductController::index');

//routes product category admin
$routes->get('/category-list', 'Admin\ProductController::category');
$routes->post('/category-list/add', 'Admin\ProductController::store');
$routes->put('/category-list/edit/(:num)', 'Admin\ProductController::update/$1');
$routes->delete('/category-list/delete/(:num)', 'Admin\ProductController::destroy/$1');



