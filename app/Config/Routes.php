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
$routes->get('invoice/detail/(:any)', 'User\Invoice::detail/$1');
$routes->get('/payment', 'User\Payment::index');
$routes->get('payment/detail/(:any)', 'User\Payment::detail/$1');
$routes->get('/login', 'User\Login::index');
$routes->get('logout', 'User\Login::logout');
$routes->post('login/auth', 'User\Login::auth');
$routes->add('/profile', 'User\Profile::index');
$routes->get('/forgot_password', 'User\Login::forgot_password');
$routes->post('/forgot', 'User\Login::forgot');
$routes->get('/reset_password', 'User\Login::reset_password');
$routes->post('/reset', 'User\Login::reset');

//admin
$routes->group('admin', function ($routes) {
	$routes->get('', 'Admin::index');
	$routes->get('login', 'Admin\Login::index');
	$routes->get('forgot_password', 'Admin\Login::forgot_password');
	$routes->post('forgot', 'Admin\Login::forgot');
	$routes->get('reset_password', 'Admin\Login::reset_password');
	$routes->post('reset', 'Admin\Login::reset');
	$routes->post('auth', 'Admin\Login::auth');
	$routes->get('logout', 'Admin\Login::logout');
	// main menu
	$routes->get('dashboard', 'Admin\Dashboard::index');


	//user
	$routes->get('user', 'Admin\User::index');
	$routes->get('user/new', 'Admin\User::create');
	$routes->post('user/add', 'Admin\User::add');
	$routes->add('user/(:segment)/edit', 'Admin\User::edit/$1');
	$routes->get('user/(:segment)/delete', 'Admin\User::delete/$1');


	//payment
	$routes->get('payment', 'Admin\Payment::index');
	$routes->get('payment/new', 'Admin\Payment::create');
	$routes->get('payment/paid/(:any)', 'Admin\Payment::paid/$1');
	$routes->post('payment/add', 'Admin\Payment::add');
	$routes->get('payment/detail/(:any)', 'Admin\Payment::detail/$1');
	$routes->add('payment/(:segment)/edit', 'Admin\Payment::edit/$1');
	$routes->get('payment/(:segment)/delete', 'Admin\Payment::delete/$1');

	//payment
	$routes->get('invoice', 'Admin\Invoice::index');
	$routes->get('invoice/new', 'Admin\Invoice::create');
	$routes->post('invoice/add', 'Admin\Invoice::add');
	$routes->get('invoice/detail/(:any)', 'Admin\Invoice::detail/$1');
	$routes->add('invoice/(:segment)/edit', 'Admin\Invoice::edit/$1');
	$routes->get('invoice/(:segment)/delete', 'Admin\Invoice::delete/$1');

	//student
	$routes->get('student', 'Admin\Student::index');
	$routes->get('student/new', 'Admin\Student::create');
	$routes->post('student/add', 'Admin\Student::add');
	$routes->add('student/(:segment)/edit', 'Admin\Student::edit/$1');
	$routes->get('student/(:segment)/delete', 'Admin\Student::delete/$1');

	//master data

	//payment type
	$routes->get('peyment_type', 'Admin\Payment_type::index');
	$routes->get('peyment_type/new', 'Admin\Payment_type::create');
	$routes->post('peyment_type/add', 'Admin\Payment_type::add');
	$routes->add('peyment_type/(:segment)/edit', 'Admin\Payment_type::edit/$1');
	$routes->get('peyment_type/(:segment)/delete', 'Admin\Payment_type::delete/$1');


	//class
	$routes->get('class', 'Admin\Student_class::index');
	$routes->get('class/new', 'Admin\Student_class::create');
	$routes->post('class/add', 'Admin\Student_class::add');
	$routes->add('class/(:segment)/edit', 'Admin\Student_class::edit/$1');
	$routes->get('class/(:segment)/delete', 'Admin\Student_class::delete/$1');


	//student type
	$routes->get('student_type', 'Admin\Student_type::index');
	$routes->get('student_type/new', 'Admin\Student_type::create');
	$routes->post('student_type/add', 'Admin\Student_type::add');
	$routes->add('student_type/(:segment)/edit', 'Admin\Student_type::edit/$1');
	$routes->get('student_type/(:segment)/delete', 'Admin\Student_type::delete/$1');


	//paymenttype
	$routes->get('payment_type', 'Admin\Payment_type::index');
	$routes->get('payment_type/new', 'Admin\Payment_type::create');
	$routes->post('payment_type/add', 'Admin\Payment_type::add');
	$routes->add('payment_type/(:segment)/edit', 'Admin\Payment_type::edit/$1');
	$routes->get('payment_type/(:segment)/delete', 'Admin\Payment_type::delete/$1');

	//item
	$routes->get('item', 'Admin\Item::index');
	$routes->get('item/new', 'Admin\Item::create');
	$routes->post('item/add', 'Admin\Item::add');
	$routes->add('item/(:segment)/edit', 'Admin\Item::edit/$1');
	$routes->get('item/(:segment)/delete', 'Admin\Item::delete/$1');

	//role
	$routes->get('role', 'Admin\Role::index');
	$routes->get('role/new', 'Admin\Role::create');
	$routes->post('role/add', 'Admin\Role::add');
	$routes->add('role/(:segment)/edit', 'Admin\Role::edit/$1');
	$routes->get('role/(:segment)/delete', 'Admin\Role::delete/$1');


	//report
	$routes->get('report_invoice', 'Admin\Report::invoice');
	$routes->get('report_payment', 'Admin\Report::payment');
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
