<?php

namespace App\Models;

use CodeIgniter\Model;

class KimModel extends Model
{
    // ...
    protected $table =  'tbl_kim';
    protected $primaryKey = 'kimid';
    protected $allowedFields = ['kim', 'kecamatanid', 'kelurahanid'];

    function getAll()
    {
        $builder = $this->db->table('tbl_kim');
        $builder->select('*');
        $builder->join('tbl_kecamatan', 'tbl_kecamatan.kecamatanid = tbl_kim.kecamatanid');
        $builder->join('tbl_kelurahan', 'tbl_kelurahan.kelurahanid = tbl_kim.kelurahanid');
        $builder->orderBy('tbl_kim.kimid', 'DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    function kecamatan_where($kecamatanid)
    {
        $builder = $this->db->table('tbl_kelurahan');
        $builder->select('*');
        $builder->where('tbl_kelurahan.kecamatanid', $kecamatanid);
        $builder->orderBy('tbl_kelurahan.kecamatanid', 'DESC');
        $query = $builder->get();

        return $query->getResult();
    }
}
