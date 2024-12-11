<?php

use CodeIgniter\Router\RouteCollection;
use App\Controller\kriteriaController;
use App\Controller\skalaController;
use App\Controller\pengajarController;
use App\Controller\matrikskeputusanController;
use App\Controller\MooraController;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Home::index');
//moora
$routes->get('/moora', 'MooraController::index');

//kriteria
$routes->get('/kriteria', 'KriteriaController::index');
$routes->post('/kriteria/create', 'KriteriaController::create');
$routes->post('/kriteria/update/(:num)', 'KriteriaController::update/$1');
$routes->get('/kriteria/delete/(:num)', 'KriteriaController::delete/$1');

//skala
$routes->get('/skala', 'SkalaController::index');
$routes->post('/skala/create', 'SkalaController::create');
$routes->post('/skala/update/(:num)', 'SkalaController::update/$1');
$routes->get('/skala/delete/(:num)', 'SkalaController::delete/$1');

//pengajar atau alternatif
$routes->get('/pengajar', 'PengajarController::index');
$routes->post('/pengajar/create', 'PengajarController::create'); 
$routes->post('/pengajar/update/(:num)', 'PengajarController::update/$1'); 
$routes->get('/pengajar/delete/(:num)', 'PengajarController::delete/$1');

//matrikskeputusan
$routes->get('/matrikskeputusan', 'MatriksKeputusanController::index');
$routes->post('/matrikskeputusan/save', 'MatriksKeputusanController::save');
$routes->post('/matrikskeputusan/delete/(:num)', 'MatriksKeputusanController::delete/$1');

