<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    // ...
    protected $table =  'tbl_news_category';
    protected $primaryKey = 'news_categoryid';
    protected $allowedFields = ['news_category'];
}
