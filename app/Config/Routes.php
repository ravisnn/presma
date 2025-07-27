<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/php', 'Index::php');
$routes->get('/index', 'Index::index', ['filter' => 'alreadyLoggedIn']);
$routes->get('/prestasi', 'Index::prestasi', ['filter' => 'alreadyLoggedIn']);
$routes->get('/login', 'Index::login', ['filter' => 'alreadyLoggedIn']);
$routes->post('/login_action', 'Index::login_action');
$routes->get('forgot_password', 'ForgotPasswordController::index');
$routes->post('forgot_password/sendResetLink', 'ForgotPasswordController::sendResetLink');
$routes->get('reset_password/(:any)', 'ForgotPasswordController::resetPassword/$1');
$routes->post('forgot_password/updatePassword', 'ForgotPasswordController::updatePassword');
$routes->get('/dashboard_admin', 'Index::dashboard_admin', ['filter' => 'auth']);
$routes->get('/dashboard_mahasiswa', 'Index::dashboard_mahasiswa', ['filter' => 'auth']);
$routes->get('/cek_prestasi', 'Index::cek_prestasi', ['filter' => 'auth']);
$routes->get('/report', 'Index::report', ['filter' => 'auth']);
$routes->post('/report_submit', 'Index::report_submit');
$routes->get('/logout', 'Index::logout');
$routes->get('/form', 'Index::form', ['filter' => 'auth']);
$routes->post('/form_submit', 'Index::submit');
$routes->post('/update_prestasi', 'Index::update');
$routes->post('/update_dashboard', 'Index::update_dashboard');
$routes->post('/update_mahasiswa', 'Index::update_mahasiswa');
$routes->post('/update_admin', 'Index::update_admin');
$routes->post('/delete_prestasi', 'Index::delete');
$routes->post('/delete_admin', 'Index::delete_admin');
$routes->get('/table', 'Index::table', ['filter' => 'auth']);
$routes->get('/blog/(:num)', 'Index::blog/$1');
$routes->get('/form_admin', 'Index::form_admin', ['filter' => 'auth']);
$routes->post('/form_submit_admin', 'Index::form_submit_admin');
$routes->get('/table_admin', 'Index::table_admin', ['filter' => 'auth']);