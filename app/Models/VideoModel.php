<?php

namespace App\Models;

use CodeIgniter\Model;

class VideoModel extends Model
{
    // ...
    protected $table =  'tbl_video';
    protected $primaryKey = 'videoid';
    protected $allowedFields = ['video_title', 'video_url', 'video_status', 'userid'];

    function getAll()
    {
        $builder = $this->db->table('tbl_video');
        $builder->select('*');
        $builder->join('tbl_user', 'tbl_user.userid = tbl_video.userid');
        $query = $builder->get();
        return $query->getResult();
    }
}
