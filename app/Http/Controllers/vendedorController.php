<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\APIModels\APIVendedor;

use App\Http\Controllers\clienteController;
use App\Http\Controllers\PropuestasController;

class vendedorController extends Controller
{
	protected $vendedor;
	protected $clienteController;
	protected $propuestaController;

	public function __construct(APIVendedor $vendedor, clienteController $clienteController, PropuestasController $propuestasController)
	{
		$this->vendedor = $vendedor;
		$this->clienteController = $clienteController;
		$this->propuestaController = $propuestasController;
	}

	public function index()
	{
		if ($this->validarSesion() == 0) {
			return redirect('/')->with('status-fail', 'Debe iniciar sesión para acceder al sistema.');
		}
		if ($this->validarSesion() == 1) {
			return redirect('index')->with('status-fail', 'Solo los vendedores pueden acceder a esta vista.');
		}

		$precioDolar = $this->vendedor->precioDelDolar();
		$precioDolar = json_decode($precioDolar->message);

		return view('roles.seller.inicioS', compact('precioDolar'));
	}

	public function clientes()
	{
		if ($this->validarSesion() == 0) {
			return redirect('/')->with('status-fail', 'Debe iniciar sesión para acceder al sistema.');
		}
		if ($this->validarSesion() == 1) {
			return redirect('index')->with('status-fail', 'Solo los vendedores pueden acceder a esta vista.');
		}

		$dataUsuario["id"] = session('dataUsuario')->idUsuario;
		$consultarClientes = $this->vendedor->listarPorUsuario(['json' => $dataUsuario]);

		if($consultarClientes->status == 500){
			return redirect('index')->with('status-fail', 'Error al consultar clientes: '.$consultarClientes->message);
		}

		$consultarClientes = $consultarClientes->message;

		return view('template.clientes', compact('consultarClientes'));
	}

	public function ClienteDetails(Request $request)
	{
		$ClienteInfo = $this->clienteController->consultarClientePorId($request);
		$_propuestas = $this->propuestaController->getPropuestasByClient($ClienteInfo->idCliente);

		return view('template.clienteDetails', compact('ClienteInfo','_propuestas'));
	}

	public function validarSesion()
	{
		if (session()->has('dataUsuario')) {
			$rol = session('dataUsuario')->rol;
			// $tipo = session('dataUsuario')->tipoUsuario;
			
			// if ($rol == 5 && $tipo == 'Vendedor' || $rol == 1 && $tipo == 'Admin' || $rol == 0 && $tipo == 'SU') {
			// 	return 2;
			// }

			if ($rol == 5|| $rol == 1 || $rol == 0) {
				return 2;
			}
			return 1;
		}
		return 0;
	}
}
