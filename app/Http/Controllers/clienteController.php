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
        $ruta = str_replace(url('/'), '', url()->previous());

        $cliente["idUsuario"] = session('dataUsuario')->idUsuario; //IdVendedor
        $cliente["nombre"] = $request->inpClienteNombre;
        $cliente["primerApellido"] = $request->inpClientePrimerAp;
        $cliente["segundoApellido"] = $request->inpClienteSegundoAp;
        $cliente["telefono"] = $request->inpClienteTelefono;
        $cliente["celular"] = $request->inpClienteCelular;
        $cliente["mail"] = $request->inpClienteMail;
        $cliente["calle"] = $request->inpClienteCalle;
        $cliente["ciudad"] = $request->inpClienteCiudad;
        $cliente["estado"] = $request->inpClienteEstado;

        $registrarCliente = $this->cliente->insertarCliente(['json' => $cliente]);

        if ($registrarCliente->status == 200) {
            return redirect($ruta)->with('status-success', $registrarCliente->message);
        }
        else {
            return redirect($ruta)->with('status-fail', $registrarCliente->message);
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

    public function mostrarCliente($id)
    {
        $data["id"] = $id;
        $cliente = $this->cliente->consultarClientePorId(['json' => $data]);

        if($cliente->status != 200) {
            return redirect('registrarCliente')->with('status-fail', $cliente->message);
        } else {
            $clienteInfo = $cliente->message;
            return view('roles/seller/cotizador/form-edit-cliente', compact('clienteInfo'));
        }
    }

    public function actualizarCliente(Request $request, $id)
    {
        $data["idPersona"] = $id;
        $data["consumo"] = $request->get('consumo');
        $data["nombrePersona"] = $request->get('nombrePersona');
        $data["primerApellido"] = $request->get('primerApellido');
        $data["segundoApellido"] = $request->get('segundoApellido');
        $data["telefono"] = $request->get('telefono');
        $data["celular"] = $request->get('celular');
        $data["email"] = $request->get('email');
        $data["calle"] = $request->calle . '-' . $request->colonia;
        $data["municipio"] = $request->get('municipio');
        $data["estado"] = $request->get('estado');

        $vCliente = $this->cliente->actualizarCliente(['json' => $data]);

        if($vCliente->status != 200) {
            return redirect('registrarCliente')->with('status-fail', $vCliente->message);
        } else {
            return redirect('registrarCliente')->with('status-success', $vCliente->message);
        }
    }

    public function consultarClientePorId(Request $request)
    {
        $dataUsuario["id"] = $request->id;
        $consultarClientePorId = $this->cliente->consultarClientePorId(['json' => $dataUsuario]);
        return response()->json($consultarClientePorId);
    }

    public function consultarClientePorNombre(Request $request)
    {
        $clientee["idUsuario"] = session('dataUsuario')->idUsuario; //IdVendedor
        $clientee["nombre"] = $request->nombre;
        $clienteResult = $this->cliente->buscarClientePorNombre(['json' => $clientee]);
        return response()->json($clienteResult);
    }
}
