<?php

namespace App\Controllers;

use App\Models\LinkModel;

class Link extends BaseController
{

    protected $LinkModel;

    public function __construct()
    {
        $this->LinkModel = new LinkModel();
    }

    public function index()
    {
        $link_terkait = $this->LinkModel->getAll();

        $data = [
            'title' => 'Lihat Link Terkait',
            'link_terkait' => $link_terkait
        ];

        return view('admin/link_terkait/index', $data);
    }

    public function new()
    {
        $link_terkait = $this->LinkModel->findAll();

        $data = [
            'title' => 'Tambah Link Terkait',
            'link_terkait' => $link_terkait
        ];
        return view('admin/link_terkait/add', $data);
    }

    public function create()
    {
        $validate = $this->validate([
            'link_terkait_url' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul link terkait tidak boleh kosong',
                ],
            ],
            'link_terkait_image' => [
                'rules' => [
                    'uploaded[news_image]',
                    'is_image[link_image]',
                    'mime_in[link_image,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[link_image,4068]',
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
            if (! empty($_FILES['link_terkait_image']['name'])) {
                // Image upload
                $avatar   = $this->request->getFile('link_terkait_image');
                $namabaru = str_replace(' ', '-', $avatar->getName());
                $avatar->move('upload/image/link_terkait/', $namabaru);
                // masuk database
                $data = [
                    'link_terkait_url' => $this->request->getVar('link_terkait_url'),
                    'link_terkait_image' => $namabaru,
                    'link_terkait_status' => $this->request->getVar('link_terkait_status'),
                    'userid' => 24
                ];
                // dd($data);
                $save = $this->LinkModel->insert($data);
                if (!$save) {
                    return redirect()->back()->withInput()->with('errors', 'Data Gagal Disimpan');
                } else {
                    return redirect()->to(site_url('admin/link_terkiat'))->with('success', 'Data Berhasil Disimpan');
                }
            }
        }
    }

    public function edit($link_terkaitid = null)
    {
        $link_terkait = $this->LinkModel->find($link_terkaitid);

        $data = [
            'title' => 'Edit link terkait',
            'link_terkait' => $link_terkait
        ];

        return view('admin/link_terkait/edit', $data);
    }

    public function update($link_terkaitid = null)
    {
        $validate = $this->validate([
            'link_terkait_url' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul link terkait tidak boleh kosong',
                ],
            ],
            'link_terkait_image' => [
                'rules' => [
                    'is_image[link_terkait_image]',
                    'mime_in[link_terkait_image,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[link_terkait_image,4068]',
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
            if (! empty($_FILES['link_terkait_image']['name'])) {
                // cek apakah file gambar ada
                $link_terkait = $this->LinkModel->find($link_terkaitid);
                $gambarlama = 'upload/image/link_terkait/' . $link_terkait['link_terkait_image'];
                if (file_exists($gambarlama)) {
                    unlink($gambarlama);
                }
                // Image upload
                $avatar   = $this->request->getFile('link_terkait_image');
                $namabaru = str_replace(' ', '-', $avatar->getName());
                $avatar->move('upload/image/link_terkait/', $namabaru);
                // masuk database
                $data = [
                    'link_terkait_url' => $this->request->getVar('link_terkait_url'),
                    'link_terkait_image' => $namabaru,
                    'link_terkait_status' => $this->request->getVar('link_terkait_status'),
                ];
                // dd($data);
                $save = $this->LinkModel->update($link_terkaitid, $data);
                if (!$save) {
                    return redirect()->back()->withInput()->with('errors', 'Data Gagal Disimpan');
                } else {
                    return redirect()->to(site_url('admin/link_terkait'))->with('success', 'Data Berhasil Disimpan');
                }
            }
            $data = [
                'link_terkait_url' => $this->request->getVar('link_terkait_url'),
                'link_terkait_status' => $this->request->getVar('link_terkait_status'),
            ];
            // dd($data);
            $save = $this->LinkModel->update($link_terkaitid, $data);
            if (!$save) {
                return redirect()->back()->withInput()->with('errors', 'Data Gagal Disimpan');
            } else {
                return redirect()->to(site_url('admin/link_terkait'))->with('success', 'Data Berhasil Disimpan');
            }
        }
    }

    public function show($link_terkaitid = null)
    {
        $link_terkait = $this->LinkModel->find($link_terkaitid);

        $data = [
            'title' => 'Detail link terkait',
            'link_terkait' => $link_terkait
        ];

        return view('admin/link_terkait/detail', $data);
    }

    public function delete($link_terkaitid = null)
    {
        // $link_terkait = $this->link_terkaitModel->find($link_terkaitid);
        $this->LinkModel->delete($link_terkaitid);
        return redirect()->to(site_url('admin/link_terkait'))->with('success', 'Data Berhasil Dihapus');
    }
}
