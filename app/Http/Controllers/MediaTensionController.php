<?php

namespace App\Http\Controllers;

use App\APIModels\APIPaneles;
use App\APIModels\APIInversores;
use App\APIModels\APICliente;
use Illuminate\Http\Request;

class MediaTensionController extends Controller
{
    protected $paneles;
    protected $inversores;

	public function __construct(APIPaneles $paneles, APIInversores $inversores, APICliente $clientes)
	{
		$this->paneles = $paneles;
		$this->inversores = $inversores;
		$this->clientes = $clientes;
	}

	public function index()
    {
        $vPaneles = $this->paneles->view();
        $vInversores = $this->inversores->view();

		return view('roles/seller/cotizador/mediaTension', compact('vPaneles', 'vInversores'));
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
            return redirect('/mediaT')->with('status-success', $vCliente->message);
        }
    }
}