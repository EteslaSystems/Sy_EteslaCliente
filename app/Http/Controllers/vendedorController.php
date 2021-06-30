<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\APIModels\APIVendedor;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class vendedorController extends Controller
{
	protected $vendedor;

	public function __construct(APIVendedor $vendedor)
	{
		$this->vendedor = $vendedor;
	}

	public function index()
	{
		if ($this->validarSesion() == 0) {
			return redirect('/')->with('status-fail', 'Debe iniciar sesión para acceder al sistema.');
		}
		if ($this->validarSesion() == 1) {
			return redirect('index')->with('status-fail', 'Solo los vendedores pueden acceder a esta vista.');
		}

		$precioDolar = $this->vendedor->precioDelDolar();
		$precioDolar = json_decode($precioDolar->message);

		return view('roles.seller.inicioS', compact('precioDolar'));
	}

	public function misClientes()
	{
		return view('template.clientes');
	}

	public function clientes()
	{
		if ($this->validarSesion() == 0) {
			return redirect('/')->with('status-fail', 'Debe iniciar sesión para acceder al sistema.');
		}
		if ($this->validarSesion() == 1) {
			return redirect('index')->with('status-fail', 'Solo los vendedores pueden acceder a esta vista.');
		}

		$dataUsuario["id"] = session('dataUsuario')->idUsuario;
		$consultarClientes = $this->vendedor->listarPorUsuario(['json' => $dataUsuario]);
		$consultarClientes = $consultarClientes->message;

		$consultarClientes = $this->paginate($consultarClientes);

		return view('template.clientes', compact('consultarClientes'));
	}

	public function validarSesion()
	{
		if (session()->has('dataUsuario')) {
			$rol = session('dataUsuario')->rol;
			$tipo = session('dataUsuario')->tipoUsuario;
			
			if ($rol == 5 && $tipo == 'Vendedor' || $rol == 1 && $tipo == 'Admin' || $rol == 0 && $tipo == 'SU') {
				return 2;
			}
			return 1;
		}
		return 0;
	}

	public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
