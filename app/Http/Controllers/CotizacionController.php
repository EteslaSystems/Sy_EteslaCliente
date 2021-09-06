<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PDFController;
use Illuminate\Http\Request;
use App\APIModels\APICotizacion;

class CotizacionController extends Controller
{
    protected $cotizacion;

	public function __construct(APICotizacion $cotizacion, PDFController $pdfi)
	{
		$this->cotizacion = $cotizacion;
		$this->pdfi = $pdfi;
    }
    
	public function generatePDF(Request $request)
    {
		if($request->isMethod('post')){
			return $this->pdfi->generatePDF($request);
		}
    }

	public function guardarPropuesta(Request $request){
		$propuesta["idVendedor"] = session('dataUsuario')->idPersona;
		$propuesta["idCliente"] = $request->idCliente;
		$propuesta["propuesta"] = $request->propuesta;

		$response = $this->cotizacion->guardarPropuesta(['json' => $propuesta]);
		$response = response()->json($response);

		return $response;
	}
}
