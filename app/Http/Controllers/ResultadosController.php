<?php

namespace App\Http\Controllers;

use App\APIModels\APIVendedor;
use Illuminate\Http\Request;

class ResultadosController extends Controller
{
	protected $vendedor;

	public function __construct(APIVendedor $vendedor)
	{
		$this->vendedor = $vendedor;
	}

    public function index()
    {
    	if ($this->validarSesion() == 0) {
			\Session::flash('message', 'Debe iniciar sesión para acceder al sistema.');
			return redirect('/');
		}
		if ($this->validarSesion() == 1) {
			\Session::flash('message', 'Solo los vendedores pueden acceder a esta vista.');
			return redirect('index');
		}

		$dataUsuario["id"] = session('dataUsuario')->idUsuario;
		$consultarClientes = $this->vendedor->listarPorUsuario(['json' => $dataUsuario]);
		$consultarClientes = $consultarClientes->message;

		return view('roles/seller/cotizador/resultados-cotizador', compact('consultarClientes'));
    }

    public function validarSesion()
	{
		if (session()->has('dataUsuario')) {
			if (session('dataUsuario')->rol == 5 && session('dataUsuario')->tipoUsuario == 'Vend' || session('dataUsuario')->rol == 1 && session('dataUsuario')->tipoUsuario == 'Admin' || session('dataUsuario')->rol == 0 && session('dataUsuario')->tipoUsuario == 'SU') {
				return 2;
			}
			return 1;
		}
		return 0;
	}
}
