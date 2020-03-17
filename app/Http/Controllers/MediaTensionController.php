<?php

namespace App\Http\Controllers;

use App\APIModels\APIPaneles;
use App\APIModels\APIInversores;
use App\APIModels\APICliente;
use App\APIModels\APIVendedor;
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

	public function __construct(APIPaneles $paneles, APIInversores $inversores, APIVendedor $vendedor)
	{
		$this->paneles = $paneles;
		$this->inversores = $inversores;
		$this->vendedor = $vendedor;
	}

	public function index()
	{
		if ($this->validarSesion() == 0) {
			\Session::flash('message', 'Debe iniciar sesión para acceder al sistema.');
			return redirect('/');
		}
		if ($this->validarSesion() == 1) {
			\Session::flash('message', 'Solo los vendedores pueden acceder a esta vista.');
			return redirect('index');
		}

		$vPaneles = $this->paneles->view();
		$vInversores = $this->inversores->view();
		$dataUsuario["id"] = session('dataUsuario')->idUsuario;
		$consultarClientes = $this->vendedor->listarPorUsuario(['json' => $dataUsuario]);
		$consultarClientes = $consultarClientes->message;

		return view('roles/seller/cotizador/mediaTension', compact('vPaneles', 'vInversores', 'consultarClientes'));
	}

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

	public function validarSesion()
	{
		if (session()->has('dataUsuario')) {
			if (session('dataUsuario')->rol == 5 && session('dataUsuario')->tipoUsuario == 'Vend' || session('dataUsuario')->rol == 1 && session('dataUsuario')->tipoUsuario == 'Admin' || session('dataUsuario')->rol == 0 && session('dataUsuario')->tipoUsuario == 'SU') {
				return 2;
			}
			return 1;
		}
		return 0;
	}

}