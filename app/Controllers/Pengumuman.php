<?php

namespace App\Controllers;

use App\Models\PengumumanModel;

class Pengumuman extends BaseController
{

    protected $PengumumanModel;

    public function __construct()
    {
        $this->PengumumanModel = new PengumumanModel();
    }

    public function index()
    {
        $pengumuman = $this->PengumumanModel->getAll();

        $data = [
            'title' => 'Lihat Pengumuman',
            'pengumuman' => $pengumuman
        ];

        return view('admin/pengumuman/index', $data);
    }

    public function new()
    {
        $pengumuman = $this->PengumumanModel->findAll();

        $data = [
            'title' => 'Tambah Pengumuman',
            'pengumuman' => $pengumuman
        ];
        return view('admin/pengumuman/add', $data);
    }

    public function create()
    {
        $validate = $this->validate([
            'notice_title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul Pengumuman tidak boleh kosong',
                ],
            ],
            'notice_text' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi Pengumuman tidak boleh kosong',
                ],
            ],
            'notice_image' => [
                'rules' => [
                    'uploaded[news_image]',
                    'is_image[notice_image]',
                    'mime_in[notice_image,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[notice_image,4068]',
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
            if (! empty($_FILES['notice_image']['name'])) {
                // Image upload
                $avatar   = $this->request->getFile('notice_image');
                $namabaru = str_replace(' ', '-', $avatar->getName());
                $avatar->move('upload/image/pengumuman/', $namabaru);
                // masuk database
                $enkrip = base64_encode($this->request->getVar('notice_title'));
                $data = [
                    'notice_title' => $this->request->getVar('notice_title'),
                    'notice_enkrip' => $enkrip,
                    'notice_text' => $this->request->getVar('notice_text'),
                    'notice_date' => date('Y-m-d H:i:s'),
                    'notice_image' => $namabaru,
                    'notice_status' => $this->request->getVar('notice_status'),
                    'userid' => 24
                ];
                // dd($data);
                $save = $this->PengumumanModel->insert($data);
                if (!$save) {
                    return redirect()->back()->withInput()->with('errors', 'Data Gagal Disimpan');
                } else {
                    return redirect()->to(site_url('admin/pengumuman'))->with('success', 'Data Berhasil Disimpan');
                }
            }
        }
    }

    public function edit($noticeid = null)
    {
        $pengumuman = $this->PengumumanModel->find($noticeid);

        $data = [
            'title' => 'Edit Pengumuman',
            'pengumuman' => $pengumuman
        ];

        return view('admin/pengumuman/edit', $data);
    }

    public function update($noticeid = null)
    {
        $validate = $this->validate([
            'notice_title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul Pengumuman tidak boleh kosong',
                ],
            ],
            'notice_text' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi Pengumuman tidak boleh kosong',
                ],
            ],
            'notice_image' => [
                'rules' => [
                    'is_image[notice_image]',
                    'mime_in[notice_image,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[notice_image,4068]',
                ],
                'errors' => [
                    'is_image' => 'Harus file berbentuk gambar',
                    'mime_in' => 'Gambar harus berformat jpg/jpeg/gif/png/webp',
                    'max_size' => 'Gambar maksimal 4 Mb',
                ]
            ],

        ]);
        if (!$validate) {
            return redirect()->back()->withInput();
        } else {
            if (! empty($_FILES['notice_image']['name'])) {
                // cek apakah file gambar ada
                $pengumuman = $this->PengumumanModel->find($noticeid);
                $gambarlama = 'upload/image/pengumuman/' . $pengumuman['notice_image'];
                if ($pengumuman['notice_image'] != '' && file_exists($gambarlama)) {
                    unlink($gambarlama);
                }
                // Image upload
                $avatar   = $this->request->getFile('notice_image');
                $namabaru = str_replace(' ', '-', $avatar->getName());
                $avatar->move('upload/image/pengumuman/', $namabaru);
                // masuk database
                // $enkrip = base64_encode($this->request->getVar('notice_title'));
                $data = [
                    'notice_title' => $this->request->getVar('notice_title'),
                    'notice_text' => $this->request->getVar('notice_text'),
                    'notice_image' => $namabaru,
                    'notice_status' => $this->request->getVar('notice_status'),
                    'notice_date_modified' => date('Y-m-d H:i:s')
                ];
                // dd($data);
                $save = $this->PengumumanModel->update($noticeid, $data);
                if (!$save) {
                    return redirect()->back()->withInput()->with('errors', 'Data Gagal Disimpan');
                } else {
                    return redirect()->to(site_url('admin/pengumuman'))->with('success', 'Data Berhasil Disimpan');
                }
            }
            // $enkrip = base6has4_encode($this->request->getVar('notice_title'));
            $data = [
                'notice_title' => $this->request->getVar('notice_title'),
                'notice_text' => $this->request->getVar('notice_text'),
                'notice_status' => $this->request->getVar('notice_status'),
                'notice_date_modified' => date('Y-m-d H:i:s')
            ];
            // dd($data);
            $save = $this->PengumumanModel->update($noticeid, $data);
            if (!$save) {
                return redirect()->back()->withInput()->with('errors', 'Data Gagal Disimpan');
            } else {
                return redirect()->to(site_url('admin/pengumuman'))->with('success', 'Data Berhasil Disimpan');
            }
        }
    }

    public function show($noticeid = null)
    {
        $pengumuman = $this->PengumumanModel->find($noticeid);

        $data = [
            'title' => 'Detail Pengumuman',
            'pengumuman' => $pengumuman
        ];

        return view('admin/pengumuman/detail', $data);
    }

    public function delete($noticeid = null)
    {
        $pengumuman = $this->PengumumanModel->find($noticeid);
        $gambarlama = 'upload/image/pengumuman/' . $pengumuman['notice_image'];
        if ($pengumuman['notice_image'] != '' && file_exists($gambarlama)) {
            unlink($gambarlama);
        }
        // $pengumuman = $this->PengumumanModel->find($noticeid);
        $this->PengumumanModel->delete($noticeid);
        return redirect()->to(site_url('admin/pengumuman'))->with('success', 'Data Berhasil Dihapus');
    }
}
