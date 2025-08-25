<?php

namespace App\Controllers;

use App\Models\VideoModel;
use App\Models\UserModel;

class Video extends BaseController
{
    protected $VideoModel;
    protected $UserModel;

    public function __construct()
    {
        $this->VideoModel = new VideoModel();
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        return view('admin/home');
    }
}
