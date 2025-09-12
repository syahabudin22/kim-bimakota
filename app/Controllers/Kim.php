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
            'kim' => $this->request->getVar('kim'),
            'kelurahanid' => $this->request->getVar('kelurahanid'),
            'kecamatanid' => $this->request->getVar('kecamatanid'),
        ];
        $save = $this->KimModel->insert($data);
        if (!$save) {
            return redirect()->back()->withInput()->with('errors', 'Data Gagal Disimpan');
        } else {
            return redirect()->back()->withInput()->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function update($kimid = null)
    {
        $kim = $this->KimModel->find($kimid);
        $data = [
            'kim' => $kim,
            'kelurahanid' => $this->request->getVar('kelurahanid'),
            'kecamatanid' => $this->request->getVar('kecamatanid')
        ];
        $save = $this->KimModel->update($kimid, $data);
        if (!$save) {
            return redirect()->back()->withInput()->with('errors', 'Data Gagal Disimpan');
        } else {
            return redirect()->back()->withInput()->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function delete($kimid = null)
    {
        $this->KimModel->delete($kimid);
        return redirect()->to(site_url('/admin/pengaturan_kim/kelurahan'))->with('success', 'Data Berhasil Dihapus');
    }

    public function kecamatan_where()
    {
        $kec = $this->request->getVar('kecamatanid');
        $kec_where = $this->KimModel->kecamatan_where($kec);
        $data = [
            'data' => $kec_where,
            'token' => csrf_hash()
        ];
        echo json_encode($data);
    }
}
