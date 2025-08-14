<?php

namespace App\Models;

use CodeIgniter\Model;

class PengumumanModel extends Model
{
    // ...
    protected $table =  'tbl_notice';
    protected $primaryKey = 'noticeid';
    protected $allowedFields = ['notice_title', 'notice_enkrip', 'notice_text', 'notice_date', 'notice_date_modified', 'notice_image', 'notice_status', 'userid'];

    function getAll()
    {
        $builder = $this->db->table('tbl_notice');
        $builder->select('*');
        $builder->join('tbl_user', 'tbl_user.userid = tbl_notice.userid');
        $query = $builder->get();
        return $query->getResult();
    }
}
