<?php

namespace App\Controllers;

use App\Models\VideoModel;
use App\Models\UserModel;

class Video extends BaseController
{
    protected $VideoModel;
    protected $UserModel;

    public function __construct()
    {
        $this->VideoModel = new VideoModel();
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        $video = $this->VideoModel->getAll();

        $data = [
            'title' => 'Lihat Video',
            'video' => $video
        ];

        return view('admin/galeri/video/index', $data);
    }

    public function new()
    {
        $video = $this->VideoModel->findAll();

        $data = [
            'title' => 'Tambah Video',
            'video' => $video
        ];
        return view('admin/galeri/video/add', $data);
    }

    public function create()
    {
        $validate = $this->validate([
            'video_title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama video tidak boleh kosong',
                ],
            ],
            'video_url' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Url video youtube tidak boleh kosong',
                ],
            ],
            'video_status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Video status tidak boleh kosong',
                ],
            ],

        ]);
        if (!$validate) {
            return redirect()->back()->withInput();
        } else {
            $data = [
                'video_title' => $this->request->getVar('video_title'),
                'video_url' => $this->request->getVar('video_url'),
                'video_status' => $this->request->getVar('video_status'),
                'userid' => 24
            ];
            $save = $this->VideoModel->insert($data);
            if (!$save) {
                return redirect()->back()->withInput()->with('errors', 'Data Gagal Disimpan');
            } else {
                return redirect()->to(site_url('admin/galeri/video'))->with('success', 'Data Berhasil Disimpan');
            }
        }
    }

    public function edit($videoid = null)
    {
        $video = $this->VideoModel->find($videoid);

        $data = [
            'title' => 'Edit Video',
            'video' => $video
        ];
        return view('admin/galeri/video/edit', $data);
    }

    public function update($videoid = null)
    {
        $validate = $this->validate([
            'video_title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama video tidak boleh kosong',
                ],
            ],
            'video_url' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Url video youtube tidak boleh kosong',
                ],
            ],
            'video_status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Video status tidak boleh kosong',
                ],
            ],

        ]);
        if (!$validate) {
            return redirect()->back()->withInput();
        } else {
            $data = [
                'video_title' => $this->request->getVar('video_title'),
                'video_url' => $this->request->getVar('video_url'),
                'video_status' => $this->request->getVar('video_status'),
                'userid' => 24
            ];
            $save = $this->VideoModel->update($videoid, $data);
            if (!$save) {
                return redirect()->back()->withInput()->with('errors', 'Data Gagal Diubah');
            } else {
                return redirect()->to(site_url('admin/galeri/video'))->with('success', 'Data Berhasil Diubah');
            }
        }
    }

    public function delete($videoid)
    {
        $this->VideoModel->delete($videoid);
        return redirect()->to(site_url('admin/galeri/video'))->with('success', 'Data Berhasil Dihapus');
    }
}
