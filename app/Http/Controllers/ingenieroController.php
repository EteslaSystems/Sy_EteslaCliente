<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ingenieroController extends Controller
{
	public function index()
	{
		if (session()->has('dataUsuario')) {
			if (session('dataUsuario')->rol == 4 && session('dataUsuario')->tipoUsuario == 'Ing' || session('dataUsuario')->rol == 1 && session('dataUsuario')->tipoUsuario == 'Admin' || session('dataUsuario')->rol == 0 && session('dataUsuario')->tipoUsuario == 'SU') {
				return view('roles/enginer');
			}
			return redirect('index');
		}
		return redirect('/');
	}

	public function levantamiento()
	{
		if (session()->has('dataUsuario')) {
			if (session('dataUsuario')->rol == 4 && session('dataUsuario')->tipoUsuario == 'Ing' || session('dataUsuario')->rol == 1 && session('dataUsuario')->tipoUsuario == 'Admin' || session('dataUsuario')->rol == 0 && session('dataUsuario')->tipoUsuario == 'SU') {
				return view('roles/enginer/levantamiento');
			}
			return redirect('index');
		}
		return redirect('/');
	}

	public function instalacion()
	{
		if (session()->has('dataUsuario')) {
			if (session('dataUsuario')->rol == 4 && session('dataUsuario')->tipoUsuario == 'Ing' || session('dataUsuario')->rol == 1 && session('dataUsuario')->tipoUsuario == 'Admin' || session('dataUsuario')->rol == 0 && session('dataUsuario')->tipoUsuario == 'SU') {
				return view('roles/enginer/instalacion');
			}
			return redirect('index');
		}
		return redirect('/');
	}

	public function configuracion()
	{
		if (session()->has('dataUsuario')) {
			if (session('dataUsuario')->rol == 4 && session('dataUsuario')->tipoUsuario == 'Ing' || session('dataUsuario')->rol == 1 && session('dataUsuario')->tipoUsuario == 'Admin' || session('dataUsuario')->rol == 0 && session('dataUsuario')->tipoUsuario == 'SU') {
				return view('roles/enginer/configuracion');
			}
			return redirect('index');
		}
		return redirect('/');
	}
}
