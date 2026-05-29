<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function inicio()
    {
        return view('admin.inicio');
    }

    public function canciones()
    {
        return view('admin.canciones');
    }

    public function usuarios()
    {
        return view('admin.usuarios');
    }
}
