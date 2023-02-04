<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'User\Dashboard::index');
$routes->get('/invoice', 'User\Invoice::index');
$routes->get('/payment', 'User\Payment::index');
$routes->get('/login', 'User\Login::index');
$routes->get('/profile', 'User\Profile::index');
$routes->get('/forgot_password', 'User\Login::forgot_password');

//admin
$routes->group('admin', function ($routes) {
	$routes->get('', 'Admin::index');
	$routes->get('login', 'Admin\Login::index');
	$routes->get('forgot', 'Admin\Login::forgot_password');
	$routes->get('reset', 'Admin\Login::reset_password');
	$routes->post('auth', 'Admin\Login::auth');
	$routes->get('logout', 'Admin\Login::logout');
	// main menu
	$routes->get('dashboard', 'Admin\Dashboard::index');
	$routes->get('user', 'Admin\User::index');
	$routes->get('payment', 'Admin\Payment::index');
	$routes->get('invoice', 'Admin\Invoice::index');
	//master data
	$routes->get('student', 'Admin\Student::index');
	$routes->get('class', 'Admin\Student_class::index');
	$routes->get('student_type', 'Admin\Student_type::index');
	$routes->get('item', 'Admin\Item::index');
	//end
	$routes->get('role', 'Admin\Role::index');
	$routes->get('role_access', 'Admin\Access::index');
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
