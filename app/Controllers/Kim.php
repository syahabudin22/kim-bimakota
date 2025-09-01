<?php

namespace App\Controllers;

use App\Models\KelurahanModel;
use App\Models\KecamatanModel;
use App\Models\KimModel;

class Kim extends BaseController
{
    protected $KecamatanModel;
    protected $KelurahanModel;
    protected $KimModel;

    public function __construct()
    {
        $this->KecamatanModel = new KecamatanModel();
        $this->KelurahanModel = new KelurahanModel();
        $this->KimModel = new KimModel();
    }

    public function index()
    {
        $kecamatan = $this->KecamatanModel->findAll();
        $kelurahan = $this->KelurahanModel->findAll();
        $kim = $this->KimModel->getAll();

        $data = [
            'title' => 'Lihat KIM',
            'kecamatan' => $kecamatan,
            'kelurahan' => $kelurahan,
            'kim' => $kim
        ];

        return view('admin/pengaturan_kim/kim/index', $data);
    }

    public function create()
    {
        $data = [
            'kelurahan' => $this->request->getVar('kelurahan'),
            'kecamatanid' => $this->request->getVar('kecamatanid'),
        ];
        $save = $this->KelurahanModel->insert($data);
        if (!$save) {
            return redirect()->back()->withInput()->with('errors', 'Data Gagal Disimpan');
        } else {
            return redirect()->back()->withInput()->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function update($kelurahanid = null)
    {
        $kelurahan = $this->KelurahanModel->find($kelurahanid);
        $data = [
            'kelurahan' => $kelurahan,
            'kelurahan' => $this->request->getVar('kelurahan'),
            'kecamatanid' => $this->request->getVar('kecamatanid')
        ];
        $save = $this->KelurahanModel->update($kelurahanid, $data);
        if (!$save) {
            return redirect()->back()->withInput()->with('errors', 'Data Gagal Disimpan');
        } else {
            return redirect()->back()->withInput()->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function delete($kelurahanid = null)
    {
        $this->KelurahanModel->delete($kelurahanid);
        return redirect()->to(site_url('/admin/pengaturan_kim/kelurahan'))->with('success', 'Data Berhasil Dihapus');
    }
}
