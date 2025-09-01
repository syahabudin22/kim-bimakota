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
//slider
$routes->get('/admin/slider', 'Slider::index');
$routes->get('/admin/slider/add', 'Slider::new');
$routes->post('/admin/slider/create', 'Slider::create');
$routes->get('/admin/slider/edit/(:num)', 'Slider::edit/$1');
$routes->post('/admin/slider/update/(:num)', 'Slider::update/$1');
$routes->get('/admin/slider/hapus/(:any)', 'Slider::delete/$1');
//link terkait
$routes->get('/admin/link_terkait', 'Link::index');
$routes->get('/admin/link_terkait/add', 'Link::new');
$routes->post('/admin/link_terkait/create', 'Link::create');
$routes->get('/admin/link_terkait/edit/(:num)', 'Link::edit/$1');
$routes->post('/admin/link_terkait/update/(:num)', 'Link::update/$1');
$routes->get('/admin/link_terkait/hapus/(:any)', 'Link::delete/$1');
//file
$routes->get('/admin/file', 'File::index');
$routes->get('/admin/file/add', 'File::new');
$routes->post('/admin/file/create', 'File::create');
$routes->get('/admin/file/edit/(:num)', 'File::edit/$1');
$routes->post('/admin/file/update/(:num)', 'File::update/$1');
$routes->get('/admin/file/hapus/(:any)', 'File::delete/$1');
//folder foto
$routes->get('/admin/galeri/folder_foto', 'Folder_foto::index');
$routes->get('/admin/galeri/folder_foto/add', 'Folder_foto::new');
$routes->post('/admin/galeri/folder_foto/create', 'Folder_foto::create');
$routes->get('/admin/galeri/folder_foto/edit/(:num)', 'Folder_foto::edit/$1');
$routes->post('/admin/galeri/folder_foto/update/(:num)', 'Folder_foto::update/$1');
$routes->get('/admin/galeri/folder_foto/hapus/(:any)', 'Folder_foto::delete/$1');
//foto
$routes->get('/admin/galeri/foto/(:any)', 'Foto::index/$1');
$routes->get('/admin/galeri/foto/add/(:any)', 'Foto::new/$1');
$routes->post('/admin/galeri/foto/create', 'Foto::create');
$routes->get('/admin/galeri/foto/edit/(:num)/(:any)', 'Foto::edit/$1/$2');
$routes->post('/admin/galeri/foto/update/(:num)', 'Foto::update/$1');
$routes->get('/admin/galeri/foto/hapus/(:any)', 'Foto::delete/$1');
//video
$routes->get('/admin/galeri/video', 'Video::index');
$routes->get('/admin/galeri/video/add', 'Video::new');
$routes->post('/admin/galeri/video/create', 'Video::create');
$routes->get('/admin/galeri/video/edit/(:num)', 'Video::edit/$1');
$routes->post('/admin/galeri/video/update/(:num)', 'Video::update/$1');
$routes->get('/admin/galeri/video/hapus/(:any)', 'Video::delete/$1');
//kecamatan
$routes->get('/admin/pengaturan_kim/kecamatan', 'Kecamatan::index');
$routes->post('/admin/pengaturan_kim/kecamatan/create', 'Kecamatan::create');
$routes->post('/admin/pengaturan_kim/kecamatan/update/(:num)', 'Kecamatan::update/$1');
$routes->get('/admin/pengaturan_kim/kecamatan/hapus/(:any)', 'Kecamatan::delete/$1');
//kelurahan
$routes->get('/admin/pengaturan_kim/kelurahan', 'Kelurahan::index');
$routes->post('/admin/pengaturan_kim/kelurahan/create', 'Kelurahan::create');
$routes->post('/admin/pengaturan_kim/kelurahan/update/(:num)', 'Kelurahan::update/$1');
$routes->get('/admin/pengaturan_kim/kelurahan/hapus/(:any)', 'Kelurahan::delete/$1');
//KIM
$routes->get('/admin/pengaturan_kim/kim', 'Kim::index');
$routes->post('/admin/pengaturan_kim/kim/create', 'Kim::create');
$routes->post('/admin/pengaturan_kim/kim/update/(:num)', 'Kim::update/$1');
$routes->get('/admin/pengaturan_kim/kim/hapus/(:any)', 'Kim::delete/$1');
