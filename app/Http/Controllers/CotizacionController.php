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
		$arrayCompleto["idVendedor"] = session('dataUsuario')->idPersona;
		$arrayCompleto["oficina"] = session('dataUsuario')->oficina;
		$arrayCompleto["idCliente"] = $request->idCliente;
		$arrayCompleto["tipoPropuesta"] = $request->tipoPropuesta;

		if($request->combinacionesPropuesta == "true"){ ///Combinacinoes (BajaTension)
			$arrayCompleto["dataCombinaciones"] = $request->dataCombinaciones;
			$arrayCompleto["combSeleccionada"] = $request->combSeleccionada;
			$arrayCompleto["combinacionesPropuesta"] = $request->combinacionesPropuesta;
		}
		else if($request->combinacionesPropuesta == "false"){///Equipo seleccionado (BajaTension y MediaTension)
			$arrayCompleto["consumos"] = $request->consumos;
			$arrayCompleto["propuesta"] = $request->propuesta;
			$arrayCompleto["combinacionesPropuesta"] = $request->combinacionesPropuesta;
		}
		else{
			$arrayCompleto["propuesta_individual"] = $request->ssPropuestaIndividual;
		}
		
		$response = $this->cotizacion->generarPDF(['json' => $arrayCompleto]);
		$response = response()->json($response);

		return $response;
    }

	public function guardarPropuesta(Request $request){
		$propuesta[""] = $request->x;

		$response = $this->cotizacion->generarPDF(['json' => $propuesta]);
		$response = response()->json($response);

		return $response;
	}
}
