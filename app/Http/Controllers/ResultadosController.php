<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use App\APIModels\APIVendedor;
use Illuminate\Http\Request;

class ResultadosController extends Controller
{
	// protected $vendedor;

	// public function __construct(APIVendedor $vendedor)
	// {
	// 	$this->vendedor = $vendedor;
	// }

	// public function index()
	// {
	// 	if ($this->validarSesion() == 0) {
	// 		return redirect('/')->with('status-fail', 'Debe iniciar sesión para acceder al sistema.');
	// 	}
	// 	if ($this->validarSesion() == 1) {
	// 		return redirect('index')->with('status-fail', 'Solo los vendedores pueden acceder a esta vista.');
	// 	}

	// 	$dataUsuario["id"] = session('dataUsuario')->idUsuario;
	// 	$consultarClientes = $this->vendedor->listarPorUsuario(['json' => $dataUsuario]);
	// 	$consultarClientes = $consultarClientes->message;

	// 	return view('roles/seller/cotizador/resultados-cotizador', compact('consultarClientes'));
	// }

	// public function validarSesion()
	// {
	// 	if (session()->has('dataUsuario')) {
	// 		$rol = session('dataUsuario')->rol;
	// 		$tipo = session('dataUsuario')->tipoUsuario;
			
	// 		if ($rol == 5 && $tipo == 'Vend' || $rol == 1 && $tipo == 'Admin' || $rol == 0 && $tipo == 'SU') {
	// 			return 2;
	// 		}
	// 		return 1;
	// 	}
	// 	return 0;
	// }

	public function index(){
		// return View::make('resultados-cotizador');
		return View::make('roles/seller/cotizador/resultados-cotizador');
	}
}
