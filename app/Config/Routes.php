<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Internal/DashboardController::index');

$routes->group("internal", ["namespace" => "App\Controllers\Internal"], function ($routes) {
    $routes->get('dashboard', 'DashboardController::index');

    //Room Category
    $routes->get('room_categories', 'RoomCategoryController::index');
    $routes->get('room_categories/create', 'RoomCategoryController::create');
    $routes->post('room_categories/store', 'RoomCategoryController::store');
    $routes->get('room_categories/edit/(:num)', 'RoomCategoryController::edit/$1');
    $routes->post('room_categories/update/(:num)', 'RoomCategoryController::update/$1');
    $routes->get('room_categories/delete/(:num)', 'RoomCategoryController::delete/$1');

    //Room
    $routes->get('rooms', 'RoomController::index');
    $routes->get('rooms/create', 'RoomController::create');
    $routes->post('rooms/store', 'RoomController::store');
    $routes->get('rooms/edit/(:num)', 'RoomController::edit/$1');
    $routes->post('rooms/update/(:num)', 'RoomController::update/$1');
    $routes->get('rooms/delete/(:num)', 'RoomController::delete/$1');

    //Room Image
    $routes->get('room_images', 'RoomImageController::index');
    $routes->get('room_images/create', 'RoomImageController::create');
    $routes->post('room_images/store', 'RoomImageController::store');
    $routes->get('room_images/edit/(:num)', 'RoomImageController::edit/$1');
    $routes->get('room_images/show-images/(:num)', 'RoomImageController::show/$1');
    $routes->post('room_images/update/(:num)', 'RoomImageController::update/$1');
    $routes->get('room_images/deleteImageById/(:num)', 'RoomImageController::deleteImageById/$1');
    $routes->get('room_images/deleteAllImages/(:num)', 'RoomImageController::deleteAllImages/$1');

    //Users
    $routes->get('users', 'UserController::index');
    $routes->get('users/create', 'UserController::create');
    $routes->post('users/store', 'UserController::store');
    $routes->get('users/edit/(:num)', 'UserController::edit/$1');
    $routes->post('users/update/(:num)', 'UserController::update/$1');
    $routes->get('users/delete/(:num)', 'UserController::delete/$1');

    //Employees
    $routes->get('employees', 'EmployeeController::index');
    $routes->get('employees/create', 'EmployeeController::create');
    $routes->post('employees/store', 'EmployeeController::store');
    $routes->get('employees/edit/(:num)', 'EmployeeController::edit/$1');
    $routes->post('employees/update/(:num)', 'EmployeeController::update/$1');
    $routes->get('employees/delete/(:num)', 'EmployeeController::delete/$1');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
