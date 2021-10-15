<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\APIModels\APIPropuestas;
use Illuminate\Http\Request;

class PropuestasController extends Controller
{
    protected $propuesta;

    public function __construct(APIPropuestas $propuesta)
    {
        $this->propuesta = $propuesta;
    }

    public function getPropuestasByClient(Request $request)
    {
        $solicitudPropuesta["id"] = $request->idCliente;

        $propuestas = $this->propuesta->getPropuestasByCliente(['json' => $solicitudPropuesta]); 

		return response()->json($propuestas);
    }

    public function guardarPropuesta(Request $request){
		$propuesta["idVendedor"] = session('dataUsuario')->idUsuario;
		$propuesta["idCliente"] = $request->idCliente;
		$propuesta["propuesta"] = $request->propuesta;

		$response = $this->propuesta->save(['json' => $propuesta]);
		$response = response()->json($response);

		return $response;
	}




    /* ------ NUEVA FUNCIONALIDAD -------- (BORRAR ESTE COMENT) */

    public function getPropuestaById(Request $request)
    {
        $propuesta["idPropuesta"] = $request->idPropuesta;

        $detailsPropuesta = $this->propuesta->getDetailsPropuestaById(['json' => $propuesta]);
        $detailsPropuesta = response()->json($detailsPropuesta);

        return $detailsPropuesta;
    }

    public function eliminarPropuesta(Request $request)
    {   
        $propuestaa["idPropuesta"] = $request->idPropuesta;
        
        $propuestaDelete = $this->propuesta->delete(['json' => $propuestaa]);

        if($propuestaDelete->status != 200){ //Error
            return redirect('clientes')->with('status-fail', $propuestaDelete->message);
        }
        else{ //Success
            return redirect('clientes')->with('status-success', $propuestaDelete->message);
        }
    }
}
