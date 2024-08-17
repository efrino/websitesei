<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'MainController::index');
$routes->get('/addLokasi', 'MainController::addLokasi');
$routes->post('/createLokasi', 'MainController::createLokasi');
$routes->get('/editLokasi/(:segment)', 'MainController::editLokasi/$1');
$routes->post('/updateLokasi/(:segment)', 'MainController::updateLokasi/$1');
$routes->get('/deleteLokasi/(:segment)', 'MainController::deleteLokasi/$1');

$routes->get('/addProyek', 'MainController::addProyek');
$routes->post('/createProyek', 'MainController::createProyek');
$routes->get('/editProyek/(:segment)', 'MainController::editProyek/$1');
$routes->post('/updateProyek/(:segment)', 'MainController::updateProyek/$1');
$routes->get('/deleteProyek/(:segment)', 'MainController::deleteProyek/$1');
