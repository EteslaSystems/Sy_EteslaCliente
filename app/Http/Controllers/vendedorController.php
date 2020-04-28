<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\APIModels\APIVendedor;

class vendedorController extends Controller
{
	protected $vendedor;

	public function __construct(APIVendedor $vendedor)
	{
		$this->vendedor = $vendedor;
	}

	public function index()
	{
		if ($this->validarSesion() == 0) {
			return redirect('/')->with('status-fail', 'Debe iniciar sesión para acceder al sistema.');
		}
		if ($this->validarSesion() == 1) {
			return redirect('index')->with('status-fail', 'Solo los vendedores pueden acceder a esta vista.');
		}
		return view('roles.seller.inicioS');
	}

	public function misClientes()
	{
		if ($this->validarSesion() == 0) {
			return redirect('/')->with('status-fail', 'Debe iniciar sesión para acceder al sistema.');
		}
		if ($this->validarSesion() == 1) {
			return redirect('index')->with('status-fail', 'Solo los vendedores pueden acceder a esta vista.');
		}

		$dataUsuario["id"] = session('dataUsuario')->idUsuario;
		$consultarClientes = $this->vendedor->listarPorUsuario(['json' => $dataUsuario]);

		if (gettype($consultarClientes) == "object") {
			$consultarClientes = $consultarClientes->message;
			return view('roles.seller.cotizador.misClientes', compact('consultarClientes', 'consultarClientes'));
		}
		return view('roles.seller.cotizador.misClientes');
	}

	public function todosClientes()
	{
		if ($this->validarSesion() == 0) {
			return redirect('/')->with('status-fail', 'Debe iniciar sesión para acceder al sistema.');
		}
		if ($this->validarSesion() == 1) {
			return redirect('index')->with('status-fail', 'Solo los vendedores pueden acceder a esta vista.');
		}

		$dataUsuario["id"] = session('dataUsuario')->idUsuario;
		$consultarClientes = $this->vendedor->listarPorUsuario(['json' => $dataUsuario]);

		if (gettype($consultarClientes) == "object") {
			$consultarClientes = $consultarClientes->message;
			return view('template.clientes', compact('consultarClientes', 'consultarClientes'));
		}
		return view('template.clientes');
	}

	public function validarSesion()
	{
		if (session()->has('dataUsuario')) {
			$rol = session('dataUsuario')->rol;
			$tipo = session('dataUsuario')->tipoUsuario;
			
			if ($rol == 5 && $tipo == 'Vend' || $rol == 1 && $tipo == 'Admin' || $rol == 0 && $tipo == 'SU') {
				return 2;
			}
			return 1;
		}
		return 0;
	}
}
