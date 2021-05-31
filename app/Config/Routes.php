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
$routes->group('/', function($routes){    
	$routes->add('', 'Blog\Index::index');
	$routes->add('post-blog/(:any)', 'Blog\Index::post_blog/$1');
	$routes->addRedirect('post-blog', '/');
	$routes->add('about', 'Blog\Index::about/$1');
}); 

$routes->group('login', function($routes){    
	$routes->get('/', 'Login::index');
	$routes->post('check', 'Login::check');
	$routes->add('logout', 'Login::logout');
}); 

$routes->group('admin', ['filter' => 'AuthCheck'], function($routes){    
	//add all routes need protected by this filter
    $routes->add('/', 'Admin/Dashboard::index');
    $routes->group('posts', function($routes){
		$routes->add('/', 'Admin\Posts::index');
		$routes->add('create', 'Admin\Posts::create');
		$routes->add('edit/(:any)', 'Admin\Posts::edit/$1');
		$routes->add('store', 'Admin\Posts::store');
		$routes->add('delete/(.*)', 'Admin\Posts::delete/$1');
	});
	$routes->group('users', function($routes){
		$routes->add('/', 'Admin\Users::index');
		$routes->add('create', 'Admin\Users::create');
		$routes->add('profile/(:any)', 'Admin\Users::profile/$1');
		$routes->add('store', 'Admin\Users::store');
		$routes->add('delete/(:num)', 'Admin\Users::delete/$1');
		$routes->add('upload/(:num)', 'Admin\Users::upload/$1');
	});
	$routes->group('blog', function($routes){
		$routes->add('/', 'Admin\Blog::index');
		$routes->add('store', 'Admin\Blog::store');
		$routes->add('imagem', 'Admin\Blog::imagem');
		$routes->add('upload', 'Admin\Blog::upload');
	});

});
//route group logged check
$routes->group('', ['filter' => 'AlreadyLoggedIn'], function($routes){    
	//add all routes need protected by this filter
    $routes->add('/login', 'Login::index');
});

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
