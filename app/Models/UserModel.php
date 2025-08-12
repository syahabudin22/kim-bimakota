<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    // ...
    protected $table =  'tbl_user';
    protected $primaryKey = 'userid';
    protected $allowedFields = ['full_name', 'email', 'kimid', 'nama_instansi', 'username', 'password', 'type_userid', 'status'];
}
