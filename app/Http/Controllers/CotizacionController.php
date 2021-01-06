<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\APIModels\APICotizacion;

class CotizacionController extends Controller
{
    protected $cotizacion;

	public function __construct(APICotizacion $cotizacion)
	{
		$this->cotizacion = $cotizacion;
    }
    
	public function generatePDF(Request $request)
    {
		if($request->combinacionesPropuesta == "true"){
			$arrayCompleto["idVendedor"] = session('dataUsuario')->idPersona;
			$arrayCompleto["oficina"] = session('dataUsuario')->oficina;
			$arrayCompleto["idCliente"] = $request->idCliente;
			$arrayCompleto["dataCombinaciones"] = $request->dataCombinaciones;
			$arrayCompleto["combSeleccionada"] = $request->combSeleccionada;
			$arrayCompleto["combinacionesPropuesta"] = $request->combinacionesPropuesta;
		}
		else{
			$arrayCompleto["idVendedor"] = session('dataUsuario')->idPersona;
			$arrayCompleto["oficina"] = session('dataUsuario')->oficina;
			$arrayCompleto["idCliente"] = $request->idCliente;
			$arrayCompleto["objProyecto"] = $request->proyecto;
			$arrayCompleto["combinacionesPropuesta"] = $request->combinacionesPropuesta;
		}
		
		$response = $this->cotizacion->generarPDF(['json' => $arrayCompleto]);
		$response = response()->json($response);

		return $response;
    }
}
