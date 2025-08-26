<?php

namespace App\Controllers;

use App\Models\FileModel;

class File extends BaseController
{

    protected $FileModel;

    public function __construct()
    {
        $this->FileModel = new FileModel();
    }

    public function index()
    {
        $file = $this->FileModel->getAll();

        $data = [
            'title' => 'Lihat File',
            'file' => $file
        ];

        return view('admin/file/index', $data);
    }

    public function new()
    {
        $file = $this->FileModel->findAll();

        $data = [
            'title' => 'Tambah File',
            'file' => $file
        ];
        return view('admin/file/add', $data);
    }

    public function create()
    {
        $validate = $this->validate([
            'Nama_file' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama file file tidak boleh kosong',
                ],
            ],
            'file_status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status file tidak boleh kosong',
                ],
            ],
            'file' => [
                'rules' => [
                    'uploaded[file]',
                    'max_size[file,2048]',
                    'ext_in[file,pdf]',
                ],
                'errors' => [
                    'uploaded' => 'File tidak boleh kosong',
                    'max_size' => 'File maksimal 2 Mb',
                    'ext_in' => 'File harus berbentuk pdf',
                ],
            ],

        ]);
        if (!$validate) {
            return redirect()->back()->withInput();
        } else {
            if (! empty($_FILES['file']['name'])) {
                // Image upload
                $avatar   = $this->request->getFile('file');
                $namabaru = str_replace(' ', '-', $avatar->getName());
                $avatar->move('upload/file/', $namabaru);
                // masuk database
                $data = [
                    'menuid' => $this->request->getVar('menuid'),
                    'nama_file' => $this->request->getVar('nama_file'),
                    'file' => $namabaru,
                    'file_status' => $this->request->getVar('file_status'),
                    'userid' => 24
                ];
                // dd($data);
                $save = $this->FileModel->insert($data);
                if (!$save) {
                    return redirect()->back()->withInput()->with('errors', 'Data Gagal Disimpan');
                } else {
                    return redirect()->to(site_url('admin/file'))->with('success', 'Data Berhasil Disimpan');
                }
            }
        }
    }

    public function edit($fileid = null)
    {
        $file = $this->FileModel->find($fileid);

        $data = [
            'title' => 'Edit file',
            'file' => $file
        ];

        return view('admin/file/edit', $data);
    }

    public function update($fileid = null)
    {
        $validate = $this->validate([
            'Nama_file' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama file file tidak boleh kosong',
                ],
            ],
            'file_status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status file tidak boleh kosong',
                ],
            ],
            'file' => [
                'rules' => [
                    'uploaded[file]',
                    'max_size[file,2048]',
                    'ext_in[file,pdf]',
                ],
                'errors' => [
                    'uploaded' => 'File tidak boleh kosong',
                    'max_size' => 'File maksimal 2 Mb',
                    'ext_in' => 'File harus berbentuk pdf',
                ],
            ],

        ]);
        if (!$validate) {
            return redirect()->back()->withInput();
        } else {
            if (! empty($_FILES['file']['name'])) {
                // cek apakah file gambar ada
                $file = $this->FileModel->find($fileid);
                $filelama = 'upload/file/' . $file['file'];
                if (file_exists($filelama)) {
                    unlink($filelama);
                }
                // Image upload
                $avatar   = $this->request->getFile('file');
                $namabaru = str_replace(' ', '-', $avatar->getName());
                $avatar->move('upload/file/', $namabaru);
                // masuk database
                // $enkrip = base64_encode($this->request->getVar('file_title'));
                $data = [
                    'menuid' => $this->request->getVar('menuid'),
                    'nama_file' => $this->request->getVar('nama_file'),
                    'file' => $namabaru,
                    'file_status' => $this->request->getVar('file_status'),
                    'userid' => 24
                ];
                // dd($data);
                $save = $this->FileModel->update($fileid, $data);
                if (!$save) {
                    return redirect()->back()->withInput()->with('errors', 'Data Gagal Disimpan');
                } else {
                    return redirect()->to(site_url('admin/file'))->with('success', 'Data Berhasil Disimpan');
                }
            }
            // $enkrip = base6has4_encode($this->request->getVar('file_title'));
            $data = [
                'menuid' => $this->request->getVar('menuid'),
                'nama_file' => $this->request->getVar('nama_file'),
                'file_status' => $this->request->getVar('file_status'),
                'userid' => 24
            ];
            // dd($data);
            $save = $this->FileModel->update($fileid, $data);
            if (!$save) {
                return redirect()->back()->withInput()->with('errors', 'Data Gagal Disimpan');
            } else {
                return redirect()->to(site_url('admin/file'))->with('success', 'Data Berhasil Disimpan');
            }
        }
    }

    public function show($fileid = null)
    {
        $file = $this->FileModel->find($fileid);

        $data = [
            'title' => 'Detail file',
            'file' => $file
        ];

        return view('admin/file/detail', $data);
    }

    public function delete($fileid = null)
    {
        $file = $this->FileModel->find($fileid);
        $file2 = 'upload/file/' . $file['file'];
        if (file_exists($file2)) {
            unlink($file2);
        }
        $this->FileModel->delete($fileid);
        return redirect()->to(site_url('admin/file'))->with('success', 'Data Berhasil Dihapus');
    }
}
