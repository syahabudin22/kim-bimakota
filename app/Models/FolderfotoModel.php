<?php

namespace App\Models;

use CodeIgniter\Model;

class FolderfotoModel extends Model
{
    // ...
    protected $table =  'tbl_folder_photo';
    protected $primaryKey = 'folder_photoid';
    protected $allowedFields = ['folder_photo_title', 'folder_photo_img', 'userid'];

    function getAll()
    {
        $builder = $this->db->table('tbl_folder_photo');
        $builder->select('*');
        $builder->join('tbl_user', 'tbl_user.userid = tbl_folder_photo.userid');
        $builder->orderBy('folder_photoid', 'DESC');
        $query = $builder->get();
        return $query->getResult();
    }
}
