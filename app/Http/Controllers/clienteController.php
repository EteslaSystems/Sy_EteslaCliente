<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\APIModels\APICliente;

class clienteController extends Controller
{
	protected $cliente;

    public function __construct(APICliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function registrarCliente(Request $request)
    {
        $request["idUsuario"] = session('dataUsuario')->idUsuario;
        $request["consumo"] = 0;
        $request["calle"] = $request->calle . '-' . $request->colonia;

        $registrarCliente = $this->cliente->insertarCliente(['json' => $request->all()]);

        if ($registrarCliente->status == 200) {
            \Session::flash('message', $registrarCliente->message);
            return redirect('mclients');
        }
        else {
            \Session::flash('message', $registrarCliente->message);
            return redirect('mclients');
        }
    }
}
