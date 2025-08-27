<?php

namespace App\Controllers;

use App\Models\FotoModel;
use App\Models\FolderfotoModel;
use App\Models\UserModel;

class Foto extends BaseController
{
    protected $FotoModel;
    protected $FolderfotoModel;
    protected $UserModel;

    public function __construct()
    {
        $this->FotoModel = new FotoModel();
        $this->FolderfotoModel = new FolderfotoModel();
        $this->UserModel = new UserModel();
    }

    public function index($folder_photoid)
    {
        $folder_foto = $this->FotoModel->getWhere($folder_photoid);
        $foto = $this->FotoModel->getAll($folder_photoid);

        $data = [
            'title' => 'Foto Berita',
            'folder_foto' => $folder_foto,
            'foto' => $foto
        ];
        // dd($folder_foto);
        return view('admin/galeri/foto/index', $data);
    }

    public function new($folder_photoid = null)
    {
        $foto = $this->FotoModel->getAll($folder_photoid);

        $data = [
            'title' => 'Foto Berita',
            'foto' => $foto
        ];
        return view('admin/galeri/foto/add', $data);
    }

    public function edit($photoid = null)
    {
        $foto = $this->FotoModel->find($photoid);

        $data = [
            'title' => 'Folder Foto Berita',
            'foto' => $foto
        ];
        return view('admin/galeri/folder_foto/edit', $data);
    }
}
