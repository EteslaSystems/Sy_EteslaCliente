<?php

namespace App\Http\Controllers;

use App\APIModels\APIPaneles;
use App\APIModels\APIInversores;
use App\APIModels\APICliente;
use App\APIModels\APIVendedor;
use App\APIModels\APICotizacion;
use Illuminate\Http\Request;

class MediaTensionController extends Controller
{

	protected $paneles;
	protected $inversores;
	protected $vendedor;
	protected $clientes;
	protected $cotizacion;

	public function __construct(APIPaneles $paneles, APIInversores $inversores, APIVendedor $vendedor, APICliente $clientes, APICotizacion $cotizacion)
	{
		//$this->paneles = $paneles;
		//$this->inversores = $inversores;
		$this->vendedor = $vendedor;
		$this->clientes = $clientes;
		$this->cotizacion = $cotizacion;
	}

	public function index()
	{
		if ($this->validarSesion() == 0) {
			return redirect('/')->with('status-fail', 'Debe iniciar sesión para acceder al sistema.');
		}
		// if ($this->validarSesion() == 1) {
		// 	return redirect('index')->with('status-fail', 'Solo los vendedores pueden acceder a esta vista.');
		// }

		//$vPaneles = $this->paneles->view();
		//$vInversores = $this->inversores->view();
		$dataUsuario["id"] = session('dataUsuario')->idUsuario;
		$consultarClientes = $this->vendedor->listarPorUsuario(['json' => $dataUsuario]);
		$consultarClientes = $consultarClientes->message;
		$rol = session('dataUsuario')->rol;

		return view('roles/seller/cotizador/mediaTension', compact(/*'vPaneles', 'vInversores',*/ 'consultarClientes', 'rol'));
	}

	public function create(Request $request)
	{
		$request["idUsuario"] = session('dataUsuario')->idUsuario;
		$request["consumo"] = 0;
		$request["calle"] = $request->calle . '-' . $request->colonia;

		$vCliente = $this->clientes->insertarCliente(
			['json' => $request->all()]
		);

		if($vCliente->status != 200) {
			return redirect('/mediaT')->with('status-fail', $vCliente->message)->with('modal-fail', true)->withInput();
		} else {
			return redirect('/mediaT')->with('status-success', $vCliente->message)
			->with('nombre', $request["nombrePersona"] . ' ' . $request["primerApellido"] . ' ' . $request["segundoApellido"])
			->with('direccion', $request["calle"] . ', ' . $request["municipio"] . ', ' . $request["estado"])
			->with('celular', $request["celular"])
			->with('correo', $request["email"])
			->with('telefono', $request["telefono"])
			->with('consumo', $request["consumo"]);
		}
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
  
	//1er. Paso
	public function sendPeriodsToServer(Request $request)
	{
		$array["arrayPeriodosGDMTH"] = $request->arrayPeriodosGDMTH;
		$array["idCliente"] = $request->idCliente;
		$array["destino"] = $request->direccionCliente; //Municipo_Estado (direccion) del Cliente
		$array["idUsuario"] = session('dataUsuario')->idUsuario;
		$array["origen"] = session('dataUsuario')->oficina; //Sucursal Etesla
		
		$response = $this->cotizacion->sendPeriodsGDMTH(['json' => $array]);
		$response = response()->json($response);
		
		return $response;
	}

	//[Hoja_Excel: POWER]
	public function firstStepPower(Request $request)
	{
		$array["arrayPeriodosGDMTH"] = $request->arrayPeriodosGDMTH;
		$array["porcentajePerdida"] = $request->porcentajePerdida;
		$array["potenciaReal"] = $request->potenciaReal;
		$array["tipoCotizacion"] = $request->tipoCotizacion;

		$response = $this->cotizacion->firstStepPOWER(['json' => $array]);
		$response = response()->json($response);
		
		return $response;
	}

	//2do. Paso
	public function sendInversorSelected(Request $request)
	{
		$array["idInversor"] = $request->idInversor;
		$array["potenciaReal"] = $request->_potenciaReal;

		$response = $this->cotizacion->sendInversorSeleccionado(['json' => $array]);
		$response = response()->json($response);
		
		return $response;
	}

	//3er. Paso
	public function calculateViaticsTotals(Request $request)
	{
		$array["arrayPeriodosGDMTH"] = $request->arrayPeriodosGDMTH;
		$array["destino"] = $request->direccionCliente; //Municipo_Estado (direccion) del Cliente
		$array["origen"] = session('dataUsuario')->oficina; //Sucursal Etesla

		$response = $this->cotizacion->calcularViaticos_Totales(['json' => $array]);
		$response = response()->json($response);
		
		return $response;
	}
}