<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class operacionesController extends Controller
{
	public function index()
	{
		if (session()->has('dataUsuario')) {
			if (session('dataUsuario')->rol == 2 && session('dataUsuario')->tipoUsuario == 'Operac' || session('dataUsuario')->rol == 1 && session('dataUsuario')->tipoUsuario == 'Admin' || session('dataUsuario')->rol == 0 && session('dataUsuario')->tipoUsuario == 'SU') {
				return view('roles/operations');
			}
			return redirect('index');
		}
		return redirect('/');
	}
}
