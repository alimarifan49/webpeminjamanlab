<?php

namespace App\Controllers;

class SuperAdmin extends BaseController
{
    public function index()
    {
        return view('superadmin/dashboard'); // pastikan file ini ada
    }
}
