<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class administradorController extends Controller
{
	public function index()
	{
		if (session()->has('dataUsuario')) {
			if (session('dataUsuario')->rol == 1 && session('dataUsuario')->tipoUsuario == 'Admin' || session('dataUsuario')->rol == 0 && session('dataUsuario')->tipoUsuario == 'SU') {
				return view('roles/admin');
			}
			return redirect('index');
		}
		return redirect('/');
	}

	public function paneles()
	{
		if (session()->has('dataUsuario')) {
			if (session('dataUsuario')->rol == 1 && session('dataUsuario')->tipoUsuario == 'Admin' || session('dataUsuario')->rol == 0 && session('dataUsuario')->tipoUsuario == 'SU') {
				return view('roles/admin/paneles');
			}
			return redirect('index');
		}
		return redirect('/');
	}

	public function inversores()
	{
		if (session()->has('dataUsuario')) {
			if (session('dataUsuario')->rol == 1 && session('dataUsuario')->tipoUsuario == 'Admin' || session('dataUsuario')->rol == 0 && session('dataUsuario')->tipoUsuario == 'SU') {
				return view('roles/admin/inversores');
			}
			return redirect('index');
		}
		return redirect('/');
	}
}
