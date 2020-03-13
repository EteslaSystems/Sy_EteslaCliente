<?php

namespace App\Http\Controllers;

use App\APIModels\APIPaneles;
use App\APIModels\APIInversores;
use App\APIModels\APIVendedor;
use Illuminate\Http\Request;

class MediaTensionController extends Controller
{
    protected $paneles;
    protected $inversores;

	public function __construct(APIPaneles $paneles, APIInversores $inversores, APIVendedor $vendedor)
	{
		$this->paneles = $paneles;
		$this->inversores = $inversores;
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

		$vPaneles = $this->paneles->view();
		$vInversores = $this->inversores->view();
		$dataUsuario["id"] = session('dataUsuario')->idUsuario;
		$consultarClientes = $this->vendedor->listarPorUsuario(['json' => $dataUsuario]);
		$consultarClientes = $consultarClientes->message;

		return view('roles/seller/cotizador/mediaTension', compact('vPaneles', 'vInversores', 'consultarClientes'));
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