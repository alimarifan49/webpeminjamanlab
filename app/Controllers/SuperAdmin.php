<?php

namespace App\Controllers;

class SuperAdmin extends BaseController
{
    public function index()
    {
        return view('superadmin/v_dashboard'); // pastikan file ini ada
    }
}
