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

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Auth::login');
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::doLogin');
$routes->get('/logout', 'Auth::logout');

$routes->get('/user', 'User::index');
$routes->get('/admin', 'Admin::index');

$routes->get('/superadmin', 'SuperAdmin::index');
$routes->get('/superadmin/home', 'SuperAdmin::home');
$routes->get('/superadmin/laboratorium', 'SuperAdmin::laboratorium');
$routes->get('/superadmin/adminlab', 'SuperAdmin::adminlab');
$routes->get('/superadmin/tambahadmin', 'SuperAdmin::tambahAdmin');
$routes->post('/superadmin/simpanadmin', 'SuperAdmin::simpanAdmin');

$routes->get('/superadmin/tambahLaboratorium', 'SuperAdmin::tambahLaboratorium');
$routes->post('/superadmin/simpanLaboratorium', 'SuperAdmin::simpanLaboratorium');

$routes->get('/superadmin/riwayat', 'SuperAdmin::riwayat');
$routes->get('superadmin/detailLaboratorium/(:num)', 'SuperAdmin::detailLaboratorium/$1');

$routes->get('superadmin/hapusLaboratorium/(:num)', 'SuperAdmin::hapusLaboratorium/$1');
$routes->match(['get', 'post'], 'superadmin/gantiAdmin/(:num)', 'SuperAdmin::gantiAdmin/$1');

$routes->get('superadmin/editLaboratorium/(:num)', 'SuperAdmin::editLaboratorium/$1');
$routes->post('superadmin/updateLaboratorium/(:num)', 'SuperAdmin::updateLaboratorium/$1');
$routes->get('superadmin/exportExcel', 'SuperAdmin::exportExcel');
$routes->get('superadmin/exportPDF', 'SuperAdmin::exportPDF');

$routes->get('superadmin/tipeLaboratorium', 'TipeLaboratorium::index');
$routes->post('superadmin/tipeLaboratorium/simpan', 'TipeLaboratorium::simpan');
$routes->post('superadmin/tipeLaboratorium/update/(:num)', 'TipeLaboratorium::update/$1');
$routes->get('superadmin/tipeLaboratorium/hapus/(:num)', 'TipeLaboratorium::hapus/$1');
$routes->get('superadmin/tipeLaboratorium', 'SuperAdmin::tipeLaboratorium');
$routes->get('superadmin/tipeLaboratorium/tambah', 'SuperAdmin::tambahTipe');
$routes->post('superadmin/tipeLaboratorium/simpan', 'SuperAdmin::simpanTipe');
$routes->get('superadmin/tipeLaboratorium/edit/(:num)', 'SuperAdmin::editTipe/$1');
$routes->post('superadmin/tipeLaboratorium/update/(:num)', 'SuperAdmin::updateTipe/$1');
$routes->get('superadmin/tipeLaboratorium/hapus/(:num)', 'SuperAdmin::hapusTipe/$1');




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
