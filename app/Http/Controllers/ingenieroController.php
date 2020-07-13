<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ingenieroController extends Controller
{
	public function index()
	{
		if ($this->validarSesion() == 0) {
			return redirect('/')->with('status-fail', 'Debe iniciar sesión para acceder al sistema.');
		}
		if ($this->validarSesion() == 1) {
			return redirect('index')->with('status-fail', 'Solo los ingenieros pueden acceder a esta vista.');
		}
		return view('roles/enginer');
	}

	public function levantamiento()
	{
		if ($this->validarSesion() == 0) {
			return redirect('/')->with('status-fail', 'Debe iniciar sesión para acceder al sistema.');
		}
		if ($this->validarSesion() == 1) {
			return redirect('index')->with('status-fail', 'Solo los ingenieros pueden acceder a esta vista.');
		}
		return view('roles/enginer/levantamiento');

	}

	public function instalacion()
	{
		if ($this->validarSesion() == 0) {
			return redirect('/')->with('status-fail', 'Debe iniciar sesión para acceder al sistema.');
		}
		if ($this->validarSesion() == 1) {
			return redirect('index')->with('status-fail', 'Solo los ingenieros pueden acceder a esta vista.');
		}
		return view('roles/enginer/instalacion');
	}

	public function configuracion()
	{
		if ($this->validarSesion() == 0) {
			return redirect('/')->with('status-fail', 'Debe iniciar sesión para acceder al sistema.');
		}
		if ($this->validarSesion() == 1) {
			return redirect('index')->with('status-fail', 'Solo los ingenieros pueden acceder a esta vista.');
		}
		return view('roles/enginer/configuracion');
	}

	public function validarSesion()
	{
		if (session()->has('dataUsuario')) {
			$rol = session('dataUsuario')->rol;
			$tipo = session('dataUsuario')->tipoUsuario;
			
			if ($rol == 4 && $tipo == 'Ing' || $rol == 1 && $tipo == 'Admin' || $rol == 0 && $tipo == 'SU') {
				return 2;
			}
			return 1;
		}
		return 0;
	}
}
