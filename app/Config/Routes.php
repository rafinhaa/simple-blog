<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/(:any)', 'Home::index/$1');


$routes->group('login', function($routes){    
	$routes->get('/', 'Login::index');
	$routes->post('check', 'Login::check');
	$routes->get('logout', 'Login::logout');
});
//route group Login check
$routes->get('admin/users/delete/(:num)', 'Admin/Users::delete/$1');
/*
$routes->group('admin', ['filter' => 'AuthCheck'], function($routes){    
	//add all routes need protected by this filter
    $routes->get('/', 'Admin/Dashboard::index');
    $routes->group('posts', function($routes){
		$routes->get('/', 'Admin/Posts::index');
		$routes->get('create', 'Admin/Posts::create');
		$routes->get('edit/(:any)', 'Admin/Posts/edit/$1');
		$routes->post('store', 'Admin/Posts::store');
		$routes->get('delete/(:any)', 'Admin/Posts::delete/$1');
	});
	$routes->group('users', function($routes){
		$routes->get('/', 'Admin/Users::index');
		$routes->get('create', 'Admin/Users::create');
		$routes->get('edit/(:any)', 'Admin/Users::edit/$1');
		$routes->post('store', 'Admin/Users::store');
		$routes->get('delete/(:num)', 'Admin/Users::delete/$1');
	});
});*/

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
