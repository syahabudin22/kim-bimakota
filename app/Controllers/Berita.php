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

    public function simpan_kategori()
    {
        $data = $this->request->getPost();
        $save = $this->KategoriModel->insert($data);
        if (!$save) {
            return redirect()->back()->withInput()->with('errors', 'Data Gagal Disimpan');
        } else {
            return redirect()->back()->withInput()->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function update_kategori($news_categoryid = null)
    {
        $kategori = $this->KategoriModel->find($news_categoryid);
        $data = [
            'kategori' => $kategori,
            'news_category' => $this->request->getVar('news_category')
        ];
        $save = $this->KategoriModel->update($news_categoryid, $data);
        if (!$save) {
            return redirect()->back()->withInput()->with('errors', 'Data Gagal Disimpan');
        } else {
            return redirect()->back()->withInput()->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function tambah_berita()
    {
        $kategori = $this->KategoriModel->findAll();

        $data = [
            'title' => 'Tambah Berita',
            'kategori' => $kategori
        ];
        return view('admin/berita/tambah_berita', $data);
    }

    public function detail_berita($newsid = null)
    {
        $berita = $this->BeritaModel->find($newsid);

        $data = [
            'title' => 'Detail Berita',
            'berita' => $berita
        ];

        return view('admin/berita/detail_berita', $data);
    }

    public function edit_berita($newsid = null)
    {
        $berita = $this->BeritaModel->find($newsid);
        $kategori = $this->KategoriModel->findAll();

        $data = [
            'title' => 'Edit Berita',
            'berita' => $berita,
            'kategori' => $kategori
        ];

        return view('admin/berita/edit_berita', $data);
    }

    public function simpan_berita()
    {
        $validate = $this->validate([
            'news_title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul Berita tidak boleh kosong',
                ],
            ],
            'news_categoryid' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori Berita tidak boleh kosong',
                ],
            ],
            'news_text' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi Berita tidak boleh kosong',
                ],
            ],
            'news_image' => [
                'rules' => [
                    'uploaded[news_image]',
                    'is_image[news_image]',
                    'mime_in[news_image,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[news_image,4068]',
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
            if (! empty($_FILES['news_image']['name'])) {
                // Image upload
                $avatar   = $this->request->getFile('news_image');
                $namabaru = str_replace(' ', '-', $avatar->getName());
                $avatar->move('upload/image/berita/', $namabaru);
                // Create thumb
                $image = \Config\Services::image()
                    ->withFile('upload/image/berita/' . $namabaru)
                    ->fit(100, 100, 'center')
                    ->save('upload/image/berita/thumbs/' . $namabaru);
                // masuk database
                // $data = $this->request->getPost();
                $enkrip = base64_encode($this->request->getVar('news_title'));
                $data = [
                    'news_categoryid' => $this->request->getVar('news_categoryid'),
                    'news_title' => $this->request->getVar('news_title'),
                    'news_enkrip' => $enkrip,
                    'news_text' => $this->request->getVar('news_text'),
                    'news_image' => $namabaru,
                    'news_views' => 0,
                    'news_status' => $this->request->getVar('news_status'),
                    'news_date' => date('Y-m-d H:i:s'),
                    'news_date_modified' => date('Y-m-d H:i:s'),
                    'userid' => 24
                ];
                // dd($data);
                $save = $this->BeritaModel->insert($data);
                if (!$save) {
                    return redirect()->back()->withInput()->with('errors', 'Data Gagal Disimpan');
                } else {
                    return redirect()->to(site_url('admin/berita'))->with('success', 'Data Berhasil Disimpan');
                }
            }
        }
    }

    public function update_berita($newsid = null)
    {
        $validate = $this->validate([
            'news_title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul Berita tidak boleh kosong',
                ],
            ],
            'news_categoryid' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori Berita tidak boleh kosong',
                ],
            ],
            'news_text' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi Berita tidak boleh kosong',
                ],
            ],
            'news_image' => [
                'rules' => [
                    'is_image[news_image]',
                    'mime_in[news_image,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[news_image,4068]',
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
            if (! empty($_FILES['news_image']['name'])) {
                // cek apakah file gambar ada
                $berita = $this->BeritaModel->find($newsid);
                $gambarlama = 'upload/image/berita/' . $berita['news_image'];
                $thumbs = 'upload/image/berita/thumbs/' . $berita['news_image'];
                if ($berita['news_image'] != '' && file_exists($gambarlama . $thumbs)) {
                    unlink($gambarlama);
                    unlink($thumbs);
                }
                // Image upload
                $avatar   = $this->request->getFile('news_image');
                $namabaru = str_replace(' ', '-', $avatar->getName());
                $avatar->move('upload/image/berita/', $namabaru);
                // Create thumb
                $image = \Config\Services::image()
                    ->withFile('upload/image/berita/' . $namabaru)
                    ->fit(100, 100, 'center')
                    ->save('upload/image/berita/thumbs/' . $namabaru);
                // masuk database
                // $enkrip = base64_encode($this->request->getVar('news_title'));
                $data = [
                    'news_categoryid' => $this->request->getVar('news_categoryid'),
                    'news_title' => $this->request->getVar('news_title'),
                    'news_text' => $this->request->getVar('news_text'),
                    'news_image' => $namabaru,
                    'news_status' => $this->request->getVar('news_status'),
                    'news_date_modified' => date('Y-m-d H:i:s')
                ];
                // dd($data);
                $save = $this->BeritaModel->update($newsid, $data);
                if (!$save) {
                    return redirect()->back()->withInput()->with('errors', 'Data Gagal Disimpan');
                } else {
                    return redirect()->to(site_url('admin/berita'))->with('success', 'Data Berhasil Disimpan');
                }
            }
            // $enkrip = base6has4_encode($this->request->getVar('news_title'));
            $data = [
                'news_categoryid' => $this->request->getVar('news_categoryid'),
                'news_title' => $this->request->getVar('news_title'),
                'news_text' => $this->request->getVar('news_text'),
                'news_status' => $this->request->getVar('news_status'),
                'news_date_modified' => date('Y-m-d H:i:s')
            ];
            // dd($data);
            $save = $this->BeritaModel->update($newsid, $data);
            if (!$save) {
                return redirect()->back()->withInput()->with('errors', 'Data Gagal Disimpan');
            } else {
                return redirect()->to(site_url('admin/berita'))->with('success', 'Data Berhasil Disimpan');
            }
        }
    }

    public function hapus_berita($newsid = null)
    {
        $berita = $this->BeritaModel->find($newsid);
        $gambarlama = 'upload/image/berita/' . $berita['news_image'];
        $thumbs = 'upload/image/berita/thumbs/' . $berita['news_image'];
        if ($berita['news_image'] != '' && file_exists($gambarlama . $thumbs)) {
            unlink($gambarlama);
            unlink($thumbs);
        }
        $this->BeritaModel->delete($newsid);
        return redirect()->to(site_url('admin/berita'))->with('success', 'Data Berhasil Dihapus');
    }

    public function hapus_kategori($news_categoryid)
    {
        $this->KategoriModel->delete($news_categoryid);
        return redirect()->to(site_url('admin/berita/kategori'))->with('success', 'Data Berhasil Dihapus');
    }
}
