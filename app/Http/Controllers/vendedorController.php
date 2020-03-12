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
			\Session::flash('message', 'Debe iniciar sesión para acceder al sistema.');
			return redirect('/');
		}
		if ($this->validarSesion() == 1) {
			\Session::flash('message', 'Solo los vendedores pueden acceder a esta vista.');
			return redirect('index');
		}
		return view('roles.seller.inicioS');
	}

	public function mediaTension()
	{
		if ($this->validarSesion() == 0) {
			\Session::flash('message', 'Debe iniciar sesión para acceder al sistema.');
			return redirect('/');
		}
		if ($this->validarSesion() == 1) {
			\Session::flash('message', 'Solo los vendedores pueden acceder a esta vista.');
			return redirect('index');
		}
		return view('roles.seller.cotizador.mediaTension');
	}

	public function bajaTension()
	{
		if ($this->validarSesion() == 0) {
			\Session::flash('message', 'Debe iniciar sesión para acceder al sistema.');
			return redirect('/');
		}
		if ($this->validarSesion() == 1) {
			\Session::flash('message', 'Solo los vendedores pueden acceder a esta vista.');
			return redirect('index');
		}
		return view('roles.seller.cotizador.bajaTension');
	}

	public function misClientes()
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

		if (gettype($consultarClientes) == "array") {
			return view('roles.seller.cotizador.misClientes', compact('consultarClientes', 'consultarClientes'));
		}
		return view('roles.seller.cotizador.misClientes');
	}

	public function todosClientes()
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

		if (gettype($consultarClientes) == "array") {
			return view('template.clientes', compact('consultarClientes', 'consultarClientes'));
		}
		return view('template.clientes');
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

	public function consultarClientes()
	{
		$dataUsuario["id"] = session('dataUsuario')->idUsuario;
		$consultarClientes = $this->vendedor->listarPorUsuario(['json' => $dataUsuario]);
		return response()->json($consultarClientes);
	}
}
