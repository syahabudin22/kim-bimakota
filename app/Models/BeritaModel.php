<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    // ...
    protected $table =  'tbl_news';
    protected $primaryKey = 'newsid';
    protected $allowedFields = ['news_categoryid', 'news_title', 'news_enkrip', 'news_text', 'news_image', 'news_views', 'news_status', 'news_date', 'news_date_modified', 'userid'];

    function getAll()
    {
        $builder = $this->db->table('tbl_news');
        $builder->select('*');
        $builder->join('tbl_news_category', 'tbl_news_category.news_categoryid = tbl_news.news_categoryid');
        $builder->join('tbl_user', 'tbl_user.userid = tbl_news.userid');
        $query = $builder->get();
        return $query->getResult();
    }
}
