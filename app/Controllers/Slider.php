<?php

namespace App\Controllers;

use App\Models\SliderModel;

class Slider extends BaseController
{

    protected $SliderModel;

    public function __construct()
    {
        $this->SliderModel = new SliderModel();
    }

    public function index()
    {
        $slider = $this->SliderModel->getAll();

        $data = [
            'title' => 'Lihat Slider',
            'slider' => $slider
        ];

        return view('admin/slider/index', $data);
    }

    public function new()
    {
        $slider = $this->SliderModel->findAll();

        $data = [
            'title' => 'Tambah Slider',
            'slider' => $slider
        ];
        return view('admin/slider/add', $data);
    }

    public function create()
    {
        $validate = $this->validate([
            'slider_title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul Slider tidak boleh kosong',
                ],
            ],
            'slider_image' => [
                'rules' => [
                    'uploaded[news_image]',
                    'is_image[slider_image]',
                    'mime_in[slider_image,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[slider_image,4068]',
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
            if (! empty($_FILES['slider_image']['name'])) {
                // Image upload
                $avatar   = $this->request->getFile('slider_image');
                $namabaru = str_replace(' ', '-', $avatar->getName());
                $avatar->move('upload/image/slider/', $namabaru);
                // masuk database
                $data = [
                    'slider_title' => $this->request->getVar('slider_title'),
                    'slider_image' => $namabaru,
                    'slider_status' => $this->request->getVar('slider_status'),
                    'userid' => 24
                ];
                // dd($data);
                $save = $this->SliderModel->insert($data);
                if (!$save) {
                    return redirect()->back()->withInput()->with('errors', 'Data Gagal Disimpan');
                } else {
                    return redirect()->to(site_url('admin/slider'))->with('success', 'Data Berhasil Disimpan');
                }
            }
        }
    }

    public function edit($sliderid = null)
    {
        $slider = $this->SliderModel->find($sliderid);

        $data = [
            'title' => 'Edit slider',
            'slider' => $slider
        ];

        return view('admin/slider/edit', $data);
    }

    public function update($sliderid = null)
    {
        $validate = $this->validate([
            'slider_title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul Slider tidak boleh kosong',
                ],
            ],
            'slider_image' => [
                'rules' => [
                    'is_image[slider_image]',
                    'mime_in[slider_image,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[slider_image,4068]',
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
            if (! empty($_FILES['slider_image']['name'])) {
                // cek apakah file gambar ada
                $slider = $this->SliderModel->find($sliderid);
                $gambarlama = 'upload/image/slider/' . $slider['slider_image'];
                if (file_exists($gambarlama)) {
                    unlink($gambarlama);
                }
                // Image upload
                $avatar   = $this->request->getFile('slider_image');
                $namabaru = str_replace(' ', '-', $avatar->getName());
                $avatar->move('upload/image/slider/', $namabaru);
                // masuk database
                $data = [
                    'slider_title' => $this->request->getVar('slider_title'),
                    'slider_text' => $this->request->getVar('slider_text'),
                    'slider_image' => $namabaru,
                    'slider_status' => $this->request->getVar('slider_status'),
                    'slider_date_modified' => date('Y-m-d H:i:s')
                ];
                // dd($data);
                $save = $this->SliderModel->update($sliderid, $data);
                if (!$save) {
                    return redirect()->back()->withInput()->with('errors', 'Data Gagal Disimpan');
                } else {
                    return redirect()->to(site_url('admin/slider'))->with('success', 'Data Berhasil Disimpan');
                }
            }
            $data = [
                'slider_title' => $this->request->getVar('slider_title'),
                'slider_text' => $this->request->getVar('slider_text'),
                'slider_status' => $this->request->getVar('slider_status'),
                'slider_date_modified' => date('Y-m-d H:i:s')
            ];
            // dd($data);
            $save = $this->SliderModel->update($sliderid, $data);
            if (!$save) {
                return redirect()->back()->withInput()->with('errors', 'Data Gagal Disimpan');
            } else {
                return redirect()->to(site_url('admin/slider'))->with('success', 'Data Berhasil Disimpan');
            }
        }
    }

    public function show($sliderid = null)
    {
        $slider = $this->SliderModel->find($sliderid);

        $data = [
            'title' => 'Detail Slider',
            'slider' => $slider
        ];

        return view('admin/slider/detail', $data);
    }

    public function delete($sliderid = null)
    {
        // $slider = $this->sliderModel->find($sliderid);
        $this->SliderModel->delete($sliderid);
        return redirect()->to(site_url('admin/slider'))->with('success', 'Data Berhasil Dihapus');
    }
}
