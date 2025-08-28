<?php

namespace App\Models;

use CodeIgniter\Model;

class FotoModel extends Model
{
    // ...
    protected $table =  'tbl_photo';
    protected $primaryKey = 'photoid';
    protected $allowedFields = ['folder_photoid', 'photo_img', 'userid'];

    function getAll($folder_photoid)
    {
        $builder = $this->db->table('tbl_photo');
        $builder->select('*');
        $builder->join('tbl_folder_photo', 'tbl_folder_photo.folder_photoid = tbl_photo.folder_photoid');
        $builder->join('tbl_user', 'tbl_user.userid = tbl_photo.userid');
        $builder->where('tbl_photo.folder_photoid', $folder_photoid);
        $builder->orderBy('tbl_photo.photoid', 'DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    function getWhere($folder_photoid)
    {
        $builder = $this->db->table('tbl_folder_photo');
        $builder->where('tbl_folder_photo.folder_photoid', $folder_photoid);
        $builder->orderBy('tbl_folder_photo.folder_photoid', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }
}
