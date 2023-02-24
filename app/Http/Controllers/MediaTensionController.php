<?php
namespace App\Http\Controllers;
use DOMDocument;
use App\APIModels\APICliente;
use App\APIModels\APIVendedor;
use App\APIModels\APICotizacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;

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
		$array["idUsuario"] = session('dataUsuario')->idPersona;
		$array["origen"] = session('dataUsuario')->oficina;
		$array["idCliente"] = $request->idCliente;
		$array["destino"] = $request->direccionCliente;
		$array["arrayBTI"] = $request->arrayBTI;
		$array["consumos"] = $request->consumos;
		$array["tarifa"] = $request->tarifa;
		$array["descuento"] = $request->descuentoPropuesta;
		$array["aumento"] = $request->aumentoPropuesta;
		$array["estructura"] = $request->estructura;
		$array["_agregados"] = $request->agregados;
		$array["tipoCotizacion"] = "mediaTension";
		$array["bInstalacion"] = 1; //1 || true

		$response = $this->cotizacion->calcularViaticos_Totales(['json' => $array]);
		$response = response()->json($response);
		
		return $response;
	}

	public function extractInfoCFEXml(Request $request)
	{

		if ($request->hasFile("urlxmlEnero")) {
			$datos = array();
			try {

				$path = $request->file('urlxmlEnero')->store('CFE_XML');
				$parts_route = pathinfo($path);

				$xmlDoc = new DOMDocument();
				$xmlDoc->load(storage_path('/app/CFE_XML/') . $parts_route['basename']);

				return $xmlDoc->saveXML();
			} catch (\Exception $e) {
				$datos += array("error" => "No es posible leer el recibo de luz ");
				$datos += array("code" => " " . $e);
				$response = json_encode($datos);
				return response()->json($response);
			}
		}
	}
}