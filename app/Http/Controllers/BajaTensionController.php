<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\APIModels\APIPaneles;
use App\APIModels\APIInversores;
use App\APIModels\APICliente;
use App\APIModels\APIVendedor;
use App\APIModels\APICotizacion;

class BajaTensionController extends Controller
{
	protected $paneles;
	protected $inversores;
	protected $vendedor;
	protected $clientes;
	protected $cotizacion;

	public function __construct(APIPaneles $paneles, APIInversores $inversores, APIVendedor $vendedor, APICliente $clientes, APICotizacion $cotizacion)
	{
		$this->paneles = $paneles;
		$this->inversores = $inversores;
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

		return view('roles/seller/cotizador/bajaTension', compact(/*'vPaneles', 'vInversores',*/ 'consultarClientes', 'rol'));
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
		// if (session()->has('dataUsuario')) {
		// 	if (session('dataUsuario')->rol == 5 && session('dataUsuario')->tipoUsuario == 'Vend' || session('dataUsuario')->rol == 1 && session('dataUsuario')->tipoUsuario == 'Admin' || session('dataUsuario')->rol == 0 && session('dataUsuario')->tipoUsuario == 'SU') {
		// 		return 2;
		// 	}
		// 	return 1;
		// }

		if (session()->has('dataUsuario')) {
			if (session('dataUsuario')->rol == 5 || session('dataUsuario')->rol == 1 || session('dataUsuario')->rol == 0 ) {
				return 2;
			}
			return 1;
		}
		return 0;
	}

	public function getCotizacionBT(Request $request){
		$arrayCompleto["origen"] = session('dataUsuario')->oficina;
		$arrayCompleto["destino"] = $request->direccionCliente;
		$arrayCompleto["consumos"] = $request->consumos;
		$arrayCompleto["tarifa"] = $request->tarifa;
		$arrayCompleto["porcentajePropuesta"] = $request->porcentajePropuesta;
		$arrayCompleto["porcentajeDescuento"] = $request->porcentajeDescuento;

		$response = $this->cotizacion->sendPeriodsBT(['json' => $arrayCompleto]);
		$response = response()->json($response);

		return $response;
	}

	public function calculaViaticos_BT(Request $request)
	{
		$arrayCompleto["idUsuario"] = session('dataUsuario')->idPersona;
		$arrayCompleto["idCliente"] = $request->idCliente;
		$arrayCompleto["origen"] = session('dataUsuario')->oficina;
		$arrayCompleto["destino"] = $request->direccionCliente;
		$arrayCompleto["arrayBTI"] = $request->arrayBTI;
		$arrayCompleto["consumos"] = $request->consumos;
		$arrayCompleto["tarifa"] = $request->tarifa;
		$arrayCompleto["descuento"] = $request->descuentoPropuesta;
		$arrayCompleto["aumento"] = $request->aumentoPropuesta;
		$arrayCompleto["estructura"] = $request->estructura;
		$arrayCompleto["tipoCotizacion"] = "bajaTension";
		$arrayCompleto["bInstalacion"] = 1; //1 || true

		$response = $this->cotizacion->calcularViaticosBT(['json' => $arrayCompleto]);
		$response = response()->json($response);

		return $response;
	}

	public function askCombination(Request $request)
	{
		$arrayCompleto["idUsuario"] = session('dataUsuario')->idPersona;
		$arrayCompleto["idCliente"] = $request->idCliente;
		$arrayCompleto["origen"] = session('dataUsuario')->oficina;
		$arrayCompleto["destino"] = $request->direccionCliente;
		$arrayCompleto["consumos"] = $request->consumos;
		$arrayCompleto["tipoCotizacion"] = "bajaTension";
		$arrayCompleto["tarifa"] = $request->tarifa;

		$response = $this->cotizacion->busquedaInteligente(['json' => $arrayCompleto]);
		$response = response()->json($response);

		return $response;
	}
}