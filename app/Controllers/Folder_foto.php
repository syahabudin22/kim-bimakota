<?php

namespace App\Controllers;

use App\Models\FolderfotoModel;
use App\Models\UserModel;

class Folder_foto extends BaseController
{
    protected $FolderfotoModel;
    protected $UserModel;

    public function __construct()
    {
        $this->FolderfotoModel = new FolderfotoModel();
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        $folder_foto = $this->FolderfotoModel->getAll();

        $data = [
            'title' => 'Folder Foto Berita',
            'folder_foto' => $folder_foto
        ];
        return view('admin/galeri/folder_foto/index', $data);
    }

    public function new()
    {
        $folderfoto = $this->FolderfotoModel->findAll();

        $data = [
            'title' => 'Folder Foto Berita',
            'folderfoto' => $folderfoto
        ];
        return view('admin/galeri/folder_foto/add', $data);
    }

    public function create()
    {
        $validate = $this->validate([
            'folder_photo_title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Folder tidak boleh kosong',
                ],
            ],
            'folder_photo_img' => [
                'rules' => [
                    'uploaded[news_image]',
                    'is_image[folder_photo_img]',
                    'mime_in[folder_photo_img,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[folder_photo_img,4068]',
                ],
                'errors' => [
                    'uploaded' => 'Gambar tidak boleh kosong',
                    'is_image' => 'Harus file berbentuk gambar',
                    'mime_in' => 'Gambar harus berformat jpg/jpeg/gif/png/webp',
                    'max_size' => 'Gambar maksimal 4 Mb',
                ]
            ],

        ]);
        if (!$validate) {
            return redirect()->back()->withInput();
        } else {
            if (! empty($_FILES['folder_photo_img']['name'])) {
                // Image upload
                $avatar   = $this->request->getFile('folder_photo_img');
                $namabaru = str_replace(' ', '-', $avatar->getName());
                $avatar->move('upload/image/foto/', $namabaru);
                // masuk database
                $data = [
                    'folder_photo_title' => $this->request->getVar('folder_photo_title'),
                    'folder_photo_img' => $namabaru,
                    'userid' => 24
                ];
                // dd($data);
                $save = $this->FolderfotoModel->insert($data);
                if (!$save) {
                    return redirect()->back()->withInput()->with('errors', 'Data Gagal Disimpan');
                } else {
                    return redirect()->to(site_url('admin/galeri/folder_foto'))->with('success', 'Data Berhasil Disimpan');
                }
            }
        }
    }

    public function edit($folder_photoid = null)
    {
        $folderfoto = $this->FolderfotoModel->find($folder_photoid);

        $data = [
            'title' => 'Folder Foto Berita',
            'folderfoto' => $folderfoto
        ];
        return view('admin/galeri/folder_foto/edit', $data);
    }


    public function update($folder_photoid = null)
    {
        $validate = $this->validate([
            'folder_photo_title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Folder tidak boleh kosong',
                ],
            ],
            'folder_photo_img' => [
                'rules' => [
                    'uploaded[news_image]',
                    'is_image[folder_photo_img]',
                    'mime_in[folder_photo_img,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[folder_photo_img,4068]',
                ],
                'errors' => [
                    'uploaded' => 'Gambar tidak boleh kosong',
                    'is_image' => 'Harus file berbentuk gambar',
                    'mime_in' => 'Gambar harus berformat jpg/jpeg/gif/png/webp',
                    'max_size' => 'Gambar maksimal 4 Mb',
                ]
            ],

        ]);
        if (!$validate) {
            return redirect()->back()->withInput();
        } else {
            if (! empty($_FILES['folder_photo_img']['name'])) {
                // Image upload
                $avatar   = $this->request->getFile('folder_photo_img');
                $namabaru = str_replace(' ', '-', $avatar->getName());
                $avatar->move('upload/image/foto/', $namabaru);
                // masuk database
                $data = [
                    'folder_photo_title' => $this->request->getVar('folder_photo_title'),
                    'folder_photo_img' => $namabaru,
                    'userid' => 24
                ];
                // dd($data);
                $save = $this->FolderfotoModel->insert($data);
                if (!$save) {
                    return redirect()->back()->withInput()->with('errors', 'Data Gagal Disimpan');
                } else {
                    return redirect()->to(site_url('admin/galeri/folder_foto'))->with('success', 'Data Berhasil Disimpan');
                }
            }
        }
        $data = [
            'folder_photo_title' => $this->request->getVar('folder_photo_title'),
            'userid' => 24
        ];
        // dd($data);
        $save = $this->FolderfotoModel->insert($data);
        if (!$save) {
            return redirect()->back()->withInput()->with('errors', 'Data Gagal Disimpan');
        } else {
            return redirect()->to(site_url('admin/galeri/folder_foto'))->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function delete($noticeid = null)
    {
        $pengumuman = $this->PengumumanModel->find($noticeid);
        $gambarlama = 'upload/image/pengumuman/' . $pengumuman['notice_image'];
        if (file_exists($gambarlama)) {
            unlink($gambarlama);
        }
        // $pengumuman = $this->PengumumanModel->find($noticeid);
        $this->PengumumanModel->delete($noticeid);
        return redirect()->to(site_url('admin/pengumuman'))->with('success', 'Data Berhasil Dihapus');
    }
}
