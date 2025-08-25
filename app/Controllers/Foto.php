<?php

namespace App\Controllers;

use App\Models\FotoModel;
use App\Models\UserModel;

class Foto extends BaseController
{
    protected $FotoModel;
    protected $UserModel;

    public function __construct()
    {
        $this->FotoModel = new FotoModel();
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        return view('admin/home');
    }
}
