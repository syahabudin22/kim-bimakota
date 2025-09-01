<?php

namespace App\Models;

use CodeIgniter\Model;

class KelurahanModel extends Model
{
    // ...
    protected $table =  'tbl_kelurahan';
    protected $primaryKey = 'kelurahanid';
    protected $allowedFields = ['kelurahan', 'kecamatanid'];

    function getAll()
    {
        $builder = $this->db->table('tbl_kelurahan');
        $builder->select('*');
        $builder->join('tbl_kecamatan', 'tbl_kecamatan.kecamatanid = tbl_kelurahan.kecamatanid');
        $builder->orderBy('tbl_kelurahan.kelurahanid', 'DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    function getWhere($kecamatanid)
    {
        $builder = $this->db->table('tbl_kelurahan');
        $builder->select('*');
        $builder->join('tbl_kecamatan', 'tbl_kecamatan.kecamatanid = tbl_kelurahan.kecamatanid');
        $builder->where('tbl_kelurahan.kecamatanid', $kecamatanid);
        $builder->orderBy('tbl_kelurahan.kecamatanid', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }
}
