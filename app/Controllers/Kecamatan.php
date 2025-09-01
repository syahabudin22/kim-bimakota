<?php

namespace App\Controllers;

use App\Models\KecamatanModel;

class Kecamatan extends BaseController
{
    protected $KecamatanModel;

    public function __construct()
    {
        $this->KecamatanModel = new KecamatanModel();
    }

    public function index()
    {
        $kecamatan = $this->KecamatanModel->getAll();

        $data = [
            'title' => 'Lihat kecamatan',
            'kecamatan' => $kecamatan
        ];

        return view('admin/pengaturan_kim/kecamatan/index', $data);
    }

    public function create()
    {
        $data = $this->request->getPost();
        $save = $this->KecamatanModel->insert($data);
        if (!$save) {
            return redirect()->back()->withInput()->with('errors', 'Data Gagal Disimpan');
        } else {
            return redirect()->back()->withInput()->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function update($kecamatanid = null)
    {
        $kecamatan = $this->KecamatanModel->find($kecamatanid);
        $data = [
            'kecamatan' => $kecamatan,
            'kecamatan' => $this->request->getVar('kecamatan')
        ];
        $save = $this->KecamatanModel->update($kecamatanid, $data);
        if (!$save) {
            return redirect()->back()->withInput()->with('errors', 'Data Gagal Disimpan');
        } else {
            return redirect()->back()->withInput()->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function delete($kecamatanid = null)
    {
        $this->KecamatanModel->delete($kecamatanid);
        return redirect()->to(site_url('/admin/pengaturan_kim/kecamatan'))->with('success', 'Data Berhasil Dihapus');
    }
}
