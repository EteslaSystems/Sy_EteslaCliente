<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class administradorController extends Controller
{
	public function index()
	{
		if ($this->validarSesion() == 0) {
			return redirect('/')->with('status-fail', 'Debe iniciar sesión para acceder al sistema.');
		}
		if ($this->validarSesion() == 1) {
			return redirect('index')->with('status-fail', 'Solo los administradores pueden acceder a esta vista.');
		}
		return view('roles/admin');
	}

	public function paneles()
	{
		if ($this->validarSesion() == 0) {
			return redirect('/')->with('status-fail', 'Debe iniciar sesión para acceder al sistema.');
		}
		if ($this->validarSesion() == 1) {
			return redirect('index')->with('status-fail', 'Solo los administradores pueden acceder a esta vista.');
		}
		return view('roles/admin/paneles');
		
	}

	public function inversores()
	{
		if ($this->validarSesion() == 0) {
			return redirect('/')->with('status-fail', 'Debe iniciar sesión para acceder al sistema.');
		}
		if ($this->validarSesion() == 1) {
			return redirect('index')->with('status-fail', 'Solo los administradores pueden acceder a esta vista.');
		}
		return view('roles/admin/inversores');
	}

	public function validarSesion()
	{
		if (session()->has('dataUsuario')) {
			$rol = session('dataUsuario')->rol;
			$tipo = session('dataUsuario')->tipoUsuario;
			
			if ($rol == 1 && $tipo == 'Admin' || $rol == 0 && $tipo == 'SU') {
				return 2;
			}
			return 1;
		}
		return 0;
	}
}
