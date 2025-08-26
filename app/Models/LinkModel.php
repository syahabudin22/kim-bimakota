<?php

namespace App\Models;

use CodeIgniter\Model;

class LinkModel extends Model
{
    // ...
    protected $table =  'tbl_link_terkait';
    protected $primaryKey = 'link_terkaitid';
    protected $allowedFields = ['link_terkait_url', 'link_terkait_image', 'link_terkait_status', 'userid'];

    function getAll()
    {
        $builder = $this->db->table('tbl_link_terkait');
        $builder->select('*');
        $builder->join('tbl_user', 'tbl_user.userid = tbl_link_terkait.userid');
        $builder->orderBy('tbl_link_terkait.link_terkaitid', 'DESC');
        $query = $builder->get();
        return $query->getResult();
    }
}
