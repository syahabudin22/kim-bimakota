<?php

namespace App\Models;

use CodeIgniter\Model;

class SliderModel extends Model
{
    // ...
    protected $table =  'tbl_slider';
    protected $primaryKey = 'sliderid';
    protected $allowedFields = ['slider_title', 'slider_image', 'slider_status', 'userid'];

    function getAll()
    {
        $builder = $this->db->table('tbl_slider');
        $builder->select('*');
        $builder->join('tbl_user', 'tbl_user.userid = tbl_slider.userid');
        $query = $builder->get();
        return $query->getResult();
    }
}
