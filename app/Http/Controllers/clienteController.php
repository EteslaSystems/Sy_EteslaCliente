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
            return redirect('registrarCliente')->with('status-success', $registrarCliente->message);
        }
        else {
            return redirect('registrarCliente')->with('status-fail', $registrarCliente->message);
        }
    }

    public function eliminarCliente($id)
    {
        $data["id"] = $id;

        $vClientes = $this->cliente->eliminarCliente(['json' => $data]);

        if($vClientes->status != 200) {
            return redirect('registrarCliente')->with('status-fail', $vClientes->message);
        } else {
            return redirect('registrarCliente')->with('status-success', $vClientes->message);
        }
    }

    public function actualizarCliente(Request $request, $id)
    {
        
        $data["id"] = $id;
        $data["nombrematerial"] = $request->get('p_nombrematerial');
        $data["marca"] = $request->get('p_marca');
        $data["precio"] = $request->get('p_precio');
        $data["potencia"] = $request->get('p_potencia');
        $data["isc"] = $request->get('p_isc');
        $data["moneda"] = $request->get('p_tipomoneda');
        $data["voc"] = $request->get('p_voc');
        $data["vmp"] = $request->get('p_vmp');

        $vPaneles = $this->paneles->edit([
            'json' => $data
        ]);

        if($vPaneles->status != 200){
            return redirect('/paneles')->with('status-fail', $vPaneles->message);
        } else {
            return redirect('/paneles')->with('status-success', $vPaneles->message);
        }
    }

    public function consultarClientePorId(Request $request)
    {
        $dataUsuario["id"] = $request->id;
        $consultarClientePorId = $this->cliente->consultarClientePorId(['json' => $dataUsuario]);
        return response()->json($consultarClientePorId);
    }
}
