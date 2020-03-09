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
			return redirect('/login');
		}
		if ($this->validarSesion() == 1) {
			\Session::flash('message', 'Solo los vendedores pueden acceder a esta vista.');
			return redirect('/');
		}
		return view('roles.seller.inicioS');
	}

	public function mediaTension()
	{
		if ($this->validarSesion() == 0) {
			\Session::flash('message', 'Debe iniciar sesión para acceder al sistema.');
			return redirect('/login');
		}
		if ($this->validarSesion() == 1) {
			\Session::flash('message', 'Solo los vendedores pueden acceder a esta vista.');
			return redirect('/');
		}
		return view('roles.seller.cotizador.mediaTension');
	}

	public function bajaTension()
	{
		if ($this->validarSesion() == 0) {
			\Session::flash('message', 'Debe iniciar sesión para acceder al sistema.');
			return redirect('/login');
		}
		if ($this->validarSesion() == 1) {
			\Session::flash('message', 'Solo los vendedores pueden acceder a esta vista.');
			return redirect('/');
		}
		return view('roles.seller.cotizador.bajaTension');
	}

	public function misClientes()
	{
		if ($this->validarSesion() == 0) {
			\Session::flash('message', 'Debe iniciar sesión para acceder al sistema.');
			return redirect('/login');
		}
		if ($this->validarSesion() == 1) {
			\Session::flash('message', 'Solo los vendedores pueden acceder a esta vista.');
			return redirect('/');
		}

		$dataUsuario = session('dataUsuario');
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
			return redirect('/login');
		}
		if ($this->validarSesion() == 1) {
			\Session::flash('message', 'Solo los vendedores pueden acceder a esta vista.');
			return redirect('/');
		}

		$dataUsuario = session('dataUsuario');
		$consultarClientes = $this->vendedor->listarPorUsuario(['json' => $dataUsuario]);

		if (gettype($consultarClientes) == "array") {
			return view('template.clientes', compact('consultarClientes', 'consultarClientes'));
		}
		return view('template.clientes');
	}

	public function validarSesion()
	{
		if (session()->has('dataUsuario')) {
			if (session('dataUsuario')->rol == 5 && session('dataUsuario')->tipoUsuario == 'Vend') {
				return 2;
			}
			return 1;
		}
		return 0;
	}

	public function cerrarSesion()
	{
		if (session()->has('dataUsuario')) {
			session()->forget('dataUsuario');
		}
		\Session::flash('message', 'Salió de la sesión.');
		return redirect('/login');
	}
}
