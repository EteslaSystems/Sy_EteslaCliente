<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\APIModels\APIPaneles;
use App\APIModels\APIInversores;
use App\APIModels\APICliente;
use App\APIModels\APIVendedor;
use App\APIModels\APICotizacion;
use DOMDocument;
use File;

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
		$arrayCompleto["origen"] = session('dataUsuario')->oficina;
		$arrayCompleto["idCliente"] = $request->idCliente;
		$arrayCompleto["destino"] = $request->direccionCliente;
		$arrayCompleto["arrayBTI"] = $request->arrayBTI;
		$arrayCompleto["consumos"] = $request->consumos;
		$arrayCompleto["tarifa"] = $request->tarifa;
		$arrayCompleto["descuento"] = $request->descuentoPropuesta;
		$arrayCompleto["aumento"] = $request->aumentoPropuesta;
		$arrayCompleto["estructura"] = $request->estructura;
		$arrayCompleto["_agregados"] = $request->agregados;
		$arrayCompleto["tipoCotizacion"] = "bajaTension";
		$arrayCompleto["bInstalacion"] = 1; //1 || true

		$response = $this->cotizacion->calcularViaticosBT(['json' => $arrayCompleto]);
		$response = response()->json($response);

		return $response;
	}

	public function askCombination(Request $request)
	{
		$cotizacion["idUsuario"] = session('dataUsuario')->idPersona;
		$cotizacion["idCliente"] = $request->idCliente;
		$cotizacion["origen"] = session('dataUsuario')->oficina;
		$cotizacion["destino"] = $request->direccionCliente;
		$cotizacion["consumos"] = $request->consumos;
		$cotizacion["tipoCotizacion"] = "bajaTension";
		$cotizacion["tarifa"] = $request->tarifa;
		$cotizacion["porcentajeDescuento"] = $request->porcentajeDescuento;
		$cotizacion["porcentajePropuesta"] = $request->porcentajePropuesta;

		$response = $this->cotizacion->busquedaInteligente(['json' => $cotizacion]);
		$response = response()->json($response);

		return $response;
	}

    public function extractInfoCFE(Request $request){
        if($request->hasFile("urlpdf")){
	        $datos = array();

			try {
				$file = $request->file("urlpdf");

				$nombre = "pdf_" . time() . "." . $file->guessExtension();

				$ruta = public_path($nombre);
				$newLocation = $ruta . "/" . $nombre;
				$parts_route = pathinfo($newLocation);
				$fileNameXML = $parts_route['filename'] . ".xml";

				if ($file->guessExtension() == "pdf") {
					copy($file, $ruta);
					$command = "pdftohtml -xml -i -c " . $ruta;
					exec($command);
					$xmlDoc = new DOMDocument();
					$xmlDoc->load($parts_route['filename'] . ".xml") or die("ERROR: No se pudo cargar el archivo");

					$xmlPage = $xmlDoc->getElementsByTagName("page");

					$pageOne = $xmlDoc->getElementsByTagName('page')->item(0);
					$numberTagsTextPageOne = $pageOne->getElementsByTagName('text')->length;
					$textPageOne = $pageOne->getElementsByTagName('text');

					$pageTwo = $xmlDoc->getElementsByTagName('page')->item(1);
					$numberTagsTextPageTwo = $pageTwo->getElementsByTagName('text')->length;
					$textPageTwo = $pageTwo->getElementsByTagName('text');

					$valuesPageOne = array();

					for ($i = 0; $i < $numberTagsTextPageOne; $i++) {
						$valueText = $textPageOne->item($i)->nodeValue;
						$top = $textPageOne->item($i)->getAttribute('top');
						$left = $textPageOne->item($i)->getAttribute('left');
						$width = $textPageOne->item($i)->getAttribute('width');
						$height = $textPageOne->item($i)->getAttribute('height');

						$valuesPageOne[] = array(
							"texto" => $valueText,
							"top" => $top,
							"left" => $left,
							"width" => $width,
							"height" => $height
						);
					}

					$valuesPageTwo = array();

					for ($i = 0; $i < $numberTagsTextPageTwo; $i++) {
						$valueText = $textPageTwo->item($i)->nodeValue;
						$top = $textPageTwo->item($i)->getAttribute('top');
						$left = $textPageTwo->item($i)->getAttribute('left');
						$width = $textPageTwo->item($i)->getAttribute('width');
						$height = $textPageTwo->item($i)->getAttribute('height');

						$valuesPageTwo[] = array(
							"texto" => $valueText,
							"top" => $top,
							"left" => $left,
							"width" => $width,
							"height" => $height
						);
					}
// EXTRACCION DE PAGINA 1

					$rmu_tmp1 = array();
					$rmu_tmp2 = array();
					$leftAddress = "";
					$heightAddress = "";
					$address = array();
					$leftCut = "";
					$topReadTmp = array();
					$topBasic = "";
					$topInter = "";
					$topExc = "";
					$exc = array();
					$topSum = "";
					$varAux = array();
					$inter = array();
					$sum = array();
					$tempPeriods = array();
					$kwhTmp = array();
					$tmpKwh = array();

					foreach ($valuesPageOne as $v) {

						# Nombre del Cliente
						if (preg_match("/(^[A-Z]+\s[A-Z]+$)|(^[A-Z]+\s[A-Z]+\s[A-Z]+$)|(^[A-Z]+\s[A-Z]+\s[A-Z]+\s[A-Z]+\s[A-Z]+$)/", $v["texto"]))
							$name = $v["texto"];

						# Direccion del cliente
						if (preg_match('/.(C.P.)./', $v["texto"])) {
							$cp = explode('C.P.', $v["texto"]);
							$leftAddress = $v["left"];
							$heightAddress = $v["height"];
						}

						# Total a Pagar
						if (preg_match('/TOTAL\sA\sPAGAR:/', $v["texto"]))
							$leftTotal = $v["left"];

						# No. de Servicio
						if (preg_match('/^NO.\sDE\sSERVICIO:\s\d{12}$/', $v["texto"])) {
							$noServiceTmp = explode(':', $v["texto"]);
							$noService = $noServiceTmp[1];
						} else if (preg_match('/\d{12}$/', $v["texto"]))
							$noService = $v["texto"];

						# RMU
						if (preg_match('/^RMU:\s.+CFE$/', $v["texto"]))
							$rmu_tmp1 = explode(':', $v["texto"]);
						else if (preg_match('/\d{5}\s.+CFE$/', $v["texto"])) {
							if (in_array($v["texto"], $rmu_tmp1))
								continue;
							else
								$rmu_tmp2[] = $v["texto"];
						}

						# Corte a Partir
						if (preg_match('/^CORTE\sA\sPARTIR:$/', $v["texto"]))
							$leftCut = $v["left"];

						if ($leftCut == $v["left"] and preg_match('/^\d{2}\s[A-Z]{3}\s\d{2}$/', $v["texto"]))
							$curt = $v["texto"];
						else if (preg_match('/^CORTE.+/', $v["texto"])) {
							$tmp = explode(':', $v["texto"]);
							$curt = $tmp[1];
						}

						# Límite de Pago
						if (preg_match('/^LÍMITE.+/', $v["texto"])) {
							$tmp = explode(':', $v["texto"]);
							$limit = $tmp[1];
						}

						# Tarifa y Medidor
						if (preg_match('/^\w{2}\sNO.\sMEDIDOR:\w{6}$/', $v["texto"])) {
							$tmp = explode('NO. MEDIDOR:', $v["texto"]);
							$rate = $tmp[0];
							$meter = $tmp[1];
						} else if (preg_match('/^TARIFA:\s\w{2}/', $v["texto"])) {
							$tmp = explode(' ', $v["texto"]);
							$rate = $tmp[1];
							$meter = $tmp[4];
						}

						# Multiplicador
						if (preg_match('/^\d{1}$/', $v["texto"]))
							$multiplier = $v["texto"];
						else if (preg_match('/MULTIPLICADOR:\s\d{1}/', $v["texto"])) {
							$tmp = explode(':', $v["texto"]);
							$multiplier = $tmp[1];
						}

						# Periodo Facturado
						if (preg_match('/^\d{2}\s[A-Z]{3}\s\d{2}\s-/', $v["texto"])) {
							$tmp = explode('-', $v["texto"]);
							$dateStart = $tmp[0];
							$dateEnd = $tmp[1];
						} else if (preg_match('/^PERIODO\sFACTURADO:\s\d{2}/', $v["texto"])) {
							$tmp = explode(':', $v["texto"]);
							$varAux = explode('-', $tmp[1]);
							$dateStart = $varAux[0];
							$dateEnd = $varAux[1];
						}

						# Tabla Fila Energia Top Temporal
						if (preg_match('/^\d{3}$/', $v["texto"]))
							$topReadTmp[] = $v["top"];

						# Tabla Fila Básico
						if (preg_match('/\bBásico\b/', $v["texto"]))
							$topBasic = $v["top"];

						if ($v["top"] == $topBasic)
							$basic[] = $v["texto"];

						# Tabla Fila Intermedio
						if (preg_match('/Intermedio/', $v["texto"]))
							$topInter = $v["top"];

						if ($v["top"] == $topInter)
							$inter[] = $v["texto"];

						# Tabla Fila Excedente
						if (preg_match('/Excedente/', $v["texto"]))
							$topExc = $v["top"];

						if ($v["top"] == $topExc)
							$exc[] = $v["texto"];

						# Tabla Fila Suma
						if (preg_match('/Suma/', $v["texto"]))
							$topSum = $v["top"];

						if ($v["top"] == $topSum)
							$sum[] = $v["texto"];

					}

# Top Tabla Energia (kWh)
					$topRead = $topReadTmp[0];

					foreach ($valuesPageOne as $v) {

						# Dirección del cliente
						$coincidence = preg_match('/\bBásico\b|\bIntermedio\b|\bSuma\b/', $v["texto"]);
						if ($leftAddress == $v["left"] and $heightAddress == $v["height"] and $coincidence == 0)
							$address[] = $v["texto"];

						# Total a Pagar en Número
						if ($leftTotal == $v["left"] and preg_match('/^\$\d{3}$/', $v["texto"]))
							$totalNo = $v["texto"];

						# Total a Pagar en Letra
						if ($leftTotal == $v["left"] and preg_match('/^\(.+\sPESOS\s\sM.N.\)/', $v["texto"]))
							$totalLetter = $v["texto"];

						# Tabla Energia
						if ($v["top"] == $topRead)
							$energy[] = $v["texto"];

					}

#RMU
					if (empty($rmu_tmp1))
						$rmu = $rmu_tmp2[0];
					else {
						if ($rmu_tmp1[1] == $rmu_tmp2[0])
							$rmu = $rmu_tmp2[0];
						else
							$rmu = $rmu_tmp2[0];
					}

// EXTRACCION DE PAGINA 1

// EXTRACCION DE PAGINA 2

					$kwhLeft = "";

					foreach ($valuesPageTwo as $v) {

						# Periodos y kWh
						if (preg_match('/^del\s\d{2}\s[A-Z]{3}\s\d{2}\sal\s\d{2}\s[A-Z]{3}\s\d{2}/', $v["texto"]))
							$tempPeriods[] = preg_split('/^del\s(\d{2}\s[A-Z]{3}\s\d{2})\sal\s(\d{2}\s[A-Z]{3}\s\d{2})/', $v["texto"], 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
						if (preg_match('/^\d{3}$/', $v["texto"]))
							$kwhTmp[] = $v["texto"];

						# Pagos
						if (preg_match('/^\$(\d,)?\d{2,3}\.0{2}/', $v["texto"]))
							$payTmp[] = $v["texto"];
					}

# Pagos
					$p = 0;
					for ($i = 0; $i < count($payTmp); $i++) {
						if ($i == 0 || $i % 2 == 0) {
							$pay[$p] = $payTmp[$i];
							$p++;
						}
					}

					$lastPos = count($kwhTmp) - 1;

					foreach ($valuesPageTwo as $v) {
						# Periodos
						if ($v["texto"] == $kwhTmp[$lastPos]) {
							$kwhLeft = $v["left"];
							$kwhHeight = $v["height"];
						}
					}

					foreach ($valuesPageTwo as $v) {

						# kWH
						if (preg_match('/^\d{3}$|^\d{2}$/', $v["texto"]) and ($v["left"] == $kwhLeft or $v["height"] == $kwhHeight))
							$tmpKwh[] = $v["texto"];

					}

					$l = 0;

					$sizeTmp = count($tempPeriods);
					for ($i = 0; $i < $sizeTmp; $i++) {
						if (empty($tempPeriods[$i][2])) {
							$tempPeriods[$i][2] = $tmpKwh[$l];
							$l++;
						}
					}


// EXTRACCION DE PAGINA 2

/////////////////////////////////////////////////////////////////

# CREACIÓN DEL ARRAY PARA CONVERTIRLO EN JSON

					$datos = array(
						"Nombre" => $name,
						"Direccion" => $address,
						"Total a Pagar" => array(
							"Numero" => $totalNo,
							"Letra" => $totalLetter
						),
						"No. de Servicio" => $noService,
						"RMU" => $rmu,
						"Corte a Partir" => $curt,
						"Limite de Pago" => $limit,
						"Tarifa" => $rate,
						"Medidor" => $meter,
						"Multiplicador" => $multiplier,
						"Periodo Facturado" => array(
							"Fecha Inicio" => $dateStart,
							"Fecha Fin" => $dateEnd
						),

					);

					if (empty($sum[1])) {
						$period0 = array(
							"Periodo" => 0,
							"Fecha Inicio" => $dateStart,
							"Fecha Fin" => $dateEnd,
							"kwh" => $energy[2],
							"pago" => $totalNo
						);
					} else {
						$period0 = array(
							"Periodo" => 0,
							"Fecha Inicio" => $dateStart,
							"Fecha Fin" => $dateEnd,
							"kwh" => $sum[1],
							"pago" => $totalNo
						);
					}

					$prioTmp = array();

					$noPeriodos = 11;
					for ($i = 0; $i < count($tempPeriods); $i++) {

						if (empty($pay[$i])) {
							$periodoTemp = array(
								"Periodo" => $noPeriodos,
								"Fecha Inicio" => $tempPeriods[$i][0],
								"Fecha Fin" => $tempPeriods[$i][1],
								"kwh" => $tempPeriods[$i][2],
								"pago" => 0
							);

						} else {
							$periodoTemp = array(
								"Periodo " => $noPeriodos,
								"Fecha Inicio" => $tempPeriods[$i][0],
								"Fecha Fin" => $tempPeriods[$i][1],
								"kwh" => $tempPeriods[$i][2],
								"pago" => $pay[$i]
							);

						}
						array_push($prioTmp, $periodoTemp);
						$noPeriodos--;
					}

					$prio = array_reverse($prioTmp);
					array_unshift($prio, $period0);

					$datos += array(
						"Periodos" => $prio
					);

					$json = json_encode($datos);

					//echo "<pre>";
					//print_r($datos);
					//echo "<pre/><br/><br/>";
					/*if (File::exists($ruta)) {
						File::delete($ruta);
					}

					if (File::exists($fileNameXML)) {
						File::delete($fileNameXML);
					}*/

					$datos += array("error"=>"");
					$response = json_encode($datos);
					$response = response()->json($response);
					return $response;
				} else {
					$datos += array("error"=>"NO ES UN PDF");
					$response = response()->json($datos);
					return $response;
				}
			}catch (\Exception $e){
				/*if (File::exists($ruta)) {
					File::delete($ruta);
				}
				if (File::exists($fileNameXML)) {
					File::delete($fileNameXML);
				}*/
				$datos += array("error"=>"No es posible leer el recibo de luz " + $e);
				$response = response()->json($datos);
				return $response;
			}
        }
    }
}