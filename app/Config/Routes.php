<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/admin/berita', 'Berita::index');
$routes->get('/admin/berita/kategori', 'Berita::kategori');
$routes->get('/admin/berita/tambah_berita', 'Berita::tambah_berita');
$routes->post('/admin/berita/simpan_berita', 'Berita::simpan_berita');
$routes->get('/admin/berita/detail_berita/(:any)', 'Berita::detail_berita/$1');
$routes->get('/admin/berita/edit_berita/(:num)', 'Berita::edit_berita/$1');
$routes->post('/admin/berita/update_berita/(:num)', 'Berita::update_berita/$1');
