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
        $solicitudPropuesta["idCliente"] = $request->idCliente;

        $propuestas = $this->propuesta->getPropuestasByCliente(['json' => $solicitudPropuesta]);
        $propuestas = response()->json($propuestas);

		return $propuestas;
    }
}
