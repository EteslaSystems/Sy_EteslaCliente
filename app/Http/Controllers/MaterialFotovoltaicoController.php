<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaterialFotovoltaicoController extends Controller
{
    public function index()
    {
        return view('roles/admin/materialFotovoltaico');
    }
}
