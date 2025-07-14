<?php

namespace App\Controllers;

use App\Models\BeritaModel;
use App\Models\KategoriModel;
use App\Models\UserModel;

class Berita extends BaseController
{
    protected $BeritaModel;
    protected $KategoriModel;
    protected $UserModel;

    public function __construct()
    {
        $this->BeritaModel = new BeritaModel();
        $this->KategoriModel = new KategoriModel();
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        $berita = $this->BeritaModel->getAll();

        $data = [
            'title' => 'Lihat Berita',
            'berita' => $berita
        ];

        return view('admin/berita/lihat_berita', $data);
    }

    public function kategori()
    {
        $kategori = $this->KategoriModel->findAll();

        $data = [
            'title' => 'Kategori Berita',
            'kategori' => $kategori
        ];
        return view('admin/berita/kategori_berita', $data);
    }

    public function tambah_berita()
    {
        return view('admin/berita/tambah_berita');
    }
}
