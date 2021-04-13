<?php
namespace App\Http\Controllers;

use App\APIModels\APICliente;
use App\APIModels\APIVendedor;
use App\APIModels\APICotizacion;
use Illuminate\Http\Request;

class MediaTensionController extends Controller
{
	protected $vendedor;
	protected $clientes;
	protected $cotizacion;

	public function __construct(APIVendedor $vendedor, APICliente $clientes, APICotizacion $cotizacion)
	{
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

		$dataUsuario["id"] = session('dataUsuario')->idUsuario;
		$consultarClientes = $this->vendedor->listarPorUsuario(['json' => $dataUsuario]);
		$consultarClientes = $consultarClientes->message;
		$rol = session('dataUsuario')->rol;

		return view('roles/seller/cotizador/mediaTension', compact('consultarClientes', 'rol'));
	}

	public function create(Request $request)
	{
		$ruta = str_replace(url('/'), '', url()->previous());

		$request["idUsuario"] = session('dataUsuario')->idUsuario;
		$request["consumo"] = 0;
		$request["calle"] = $request->calle . '-' . $request->colonia;

		$vCliente = $this->clientes->insertarCliente(
			['json' => $request->all()]
		);

		if($vCliente->status != 200) {
			return redirect($ruta)->with('status-fail', $vCliente->message)->with('modal-fail', true)->withInput();
		} else {
			return redirect($ruta)->with('status-success', $vCliente->message)
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
		$array["arrayPeriodos"] = $request->arrayPeriodos;
		$array["idCliente"] = $request->idCliente;
		$array["destino"] = $request->direccionCliente; //Municipo_Estado (direccion) del Cliente
		$array["idUsuario"] = session('dataUsuario')->idUsuario;
		$array["origen"] = session('dataUsuario')->oficina; //Sucursal Etesla
		$array["tarifa"] = $request->tarifa;
		$array["porcentajePropuesta"] = $request->porcentajePropuesta;
		
		$response = $this->cotizacion->sendPeriodsGDMTH(['json' => $array]);
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
		$array["idCliente"] = $request->idCliente;
		$array["propuesta"] = $request->propuesta;
		$array["destino"] = $request->direccionCliente; //Municipo_Estado (direccion) del Cliente
		$array["origen"] = session('dataUsuario')->oficina; //Sucursal Etesla
		$array["tarifa"] = $request->tarifa; //tarifaMT
		$array["_agregados"] = $request->_agregados; //Agregados
		$array["tipoCotizacion"] = "mediaTension";

		$response = $this->cotizacion->calcularViaticos_Totales(['json' => $array]);
		$response = response()->json($response);
		
		return $response;
	}
}