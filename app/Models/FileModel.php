<?php

namespace App\Models;

use CodeIgniter\Model;

class FileModel extends Model
{
    // ...
    protected $table =  'tbl_file';
    protected $primaryKey = 'fileid';
    protected $allowedFields = ['menuid', 'nama_file', 'file', 'file_status', 'userid'];

    function getAll()
    {
        $builder = $this->db->table('tbl_file');
        $builder->select('*');
        $builder->join('tbl_user', 'tbl_user.userid = tbl_file.userid');
        $builder->orderBy('tbl_file.fileid', 'DESC');
        $query = $builder->get();
        return $query->getResult();
    }
}
