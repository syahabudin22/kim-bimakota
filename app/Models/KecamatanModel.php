<?php

namespace App\Models;

use CodeIgniter\Model;

class KecamatanModel extends Model
{
    // ...
    protected $table =  'tbl_kecamatan';
    protected $primaryKey = 'kecamatanid';
    protected $allowedFields = ['kecamatan'];

    function getAll()
    {
        $builder = $this->db->table('tbl_kecamatan');
        $builder->select('*');
        $builder->orderBy('tbl_kecamatan.kecamatanid', 'DESC');
        $query = $builder->get();
        return $query->getResult();
    }
}
