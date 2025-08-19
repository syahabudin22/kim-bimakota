<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
//berita
$routes->get('/admin/berita', 'Berita::index');
$routes->get('/admin/berita/kategori', 'Berita::kategori');
$routes->get('/admin/berita/tambah_berita', 'Berita::tambah_berita');
$routes->post('/admin/berita/simpan_berita', 'Berita::simpan_berita');
$routes->get('/admin/berita/detail_berita/(:any)', 'Berita::detail_berita/$1');
$routes->get('/admin/berita/edit_berita/(:num)', 'Berita::edit_berita/$1');
$routes->post('/admin/berita/update_berita/(:num)', 'Berita::update_berita/$1');
$routes->get('/admin/berita/hapus_berita/(:any)', 'Berita::hapus_berita/$1');
$routes->post('/admin/berita/simpan_kategori', 'Berita::simpan_kategori');
$routes->post('/admin/berita/update_kategori/(:num)', 'Berita::update_kategori/$1');
$routes->get('/admin/berita/hapus_kategori/(:num)', 'Berita::hapus_kategori/$1');
//pengumuman
$routes->get('/admin/pengumuman', 'Pengumuman::index');
$routes->get('/admin/pengumuman/add', 'Pengumuman::new');
$routes->post('/admin/pengumuman/create', 'Pengumuman::create');
$routes->get('/admin/pengumuman/detail/(:any)', 'Pengumuman::show/$1');
$routes->get('/admin/pengumuman/edit/(:num)', 'Pengumuman::edit/$1');
$routes->post('/admin/pengumuman/update/(:num)', 'Pengumuman::update/$1');
$routes->get('/admin/pengumuman/hapus/(:any)', 'Pengumuman::delete/$1');
