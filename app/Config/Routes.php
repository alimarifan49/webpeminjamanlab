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
$routes->setDefaultController('Auth');
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
// Default routes
$routes->get('/', 'Auth::login');
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::doLogin');
$routes->get('/logout', 'Auth::logout');

// User & Admin
$routes->get('/user', 'User::index');
$routes->get('/admin', 'Admin::index');

// Superadmin Home & Dashboard
$routes->get('/superadmin', 'SuperAdmin::index');
$routes->get('/superadmin/home', 'SuperAdmin::home');

// Laboratorium CRUD
$routes->get('/superadmin/laboratorium', 'SuperAdmin::laboratorium');
$routes->get('/superadmin/tambahLaboratorium', 'SuperAdmin::tambahLaboratorium');
$routes->post('/superadmin/simpanLaboratorium', 'SuperAdmin::simpanLaboratorium');
$routes->get('superadmin/detailLaboratorium/(:num)', 'SuperAdmin::detailLaboratorium/$1');
$routes->get('superadmin/editLaboratorium/(:num)', 'SuperAdmin::editLaboratorium/$1');
$routes->post('superadmin/updateLaboratorium/(:num)', 'SuperAdmin::updateLaboratorium/$1');
$routes->get('superadmin/hapusLaboratorium/(:num)', 'SuperAdmin::hapusLaboratorium/$1');
$routes->match(['get', 'post'], 'superadmin/gantiAdmin/(:num)', 'SuperAdmin::gantiAdmin/$1');

$routes->get('superadmin/exportExcel', 'SuperAdmin::exportExcel');
$routes->get('superadmin/exportPDF', 'SuperAdmin::exportPDF');

// Admin Lab CRUD
$routes->get('/superadmin/adminlab', 'SuperAdmin::adminlab');
$routes->get('/superadmin/tambahadmin', 'SuperAdmin::tambahAdmin');
$routes->post('/superadmin/simpanadmin', 'SuperAdmin::simpanAdmin');

// Riwayat
$routes->get('/superadmin/riwayat', 'SuperAdmin::riwayat');


// =======================================================================
// 🔥 BAGIAN INI YANG BENTROK — SUDAH DIBERSIHKAN & DISATUKAN
// CRUD Tipe Laboratorium (SuperAdmin)
// =======================================================================

$routes->get('/superadmin/tipeLab', 'SuperAdmin::tipeLab');                  // list tipe lab
$routes->get('/superadmin/tambahTipe', 'SuperAdmin::tambahTipe');           // form tambah
$routes->post('/superadmin/simpanTipe', 'SuperAdmin::simpanTipe');          // simpan baru
$routes->get('/superadmin/editTipe/(:num)', 'SuperAdmin::editTipe/$1');     // form edit
$routes->post('/superadmin/updateTipe/(:num)', 'SuperAdmin::updateTipe/$1'); // update
$routes->get('/superadmin/hapusTipe/(:num)', 'SuperAdmin::hapusTipe/$1');    // delete


//crud admin pada superadmin
$routes->get('superadmin/editadmin/(:num)', 'SuperAdmin::editadmin/$1');
$routes->post('superadmin/updateadmin/(:num)', 'SuperAdmin::updateadmin/$1');
$routes->get('superadmin/deleteadmin/(:num)', 'SuperAdmin::deleteadmin/$1');
$routes->get('superadmin/tambahAdmin', 'SuperAdmin::tambahAdmin');
$routes->post('superadmin/tambahAdmin', 'SuperAdmin::tambahAdmin');
$routes->post('superadmin/simpanadmin', 'SuperAdmin::simpanadmin');
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
