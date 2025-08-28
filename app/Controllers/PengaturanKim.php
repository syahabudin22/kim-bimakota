<?php

namespace App\Controllers;

use App\Models\KelurahanModel;
use App\Models\KecamatanModel;
use App\Models\KimModel;

class PengaturanKim extends BaseController
{
    protected $KelurahanModel;
    protected $KecamatanModel;
    protected $KimModel;

    public function __construct()
    {
        $this->KelurahanModel = new KelurahanModel();
        $this->KecamatanModel = new KecamatanModel();
        $this->KimModel = new KimModel();
    }

    public function kecamatan_index()
    {
        $kecamatan = $this->KecamatanModel->getAll();

        $data = [
            'title' => 'Lihat kecamatan',
            'kecamatan' => $kecamatan
        ];

        return view('admin/pengaturan_kim/kecamatan/index', $data);
    }

    public function kecamatan_create() {}

    public function kecamatan_update() {}
}
