<?php

namespace App\Http\Controllers;

use App\APIModels\APIEstructuras;
use Illuminate\Http\Request;

class EstructurasController extends Controller
{
    protected $estructuras;

	public function __construct(APIEstructuras $estructuras)
	{
		$this->estructuras = $estructuras;
	}

	public function read()
    {
        $vEstructuras = $this->estructuras->view();
        $vEstructuras = response()->json($vEstructuras);

        return $vEstructuras;
    }

    public function edit($id)
    {
        $data["id"] = $id;

        $vEstructuras = $this->estructuras->search([
            'json' => $data
        ]);

        if($vEstructuras->status != 200) {
            return redirect('/paneles')->with('status-fail', $vEstructuras->message);
        } else {
            $estructura = $vEstructuras->message;

            // return view('roles/admin/forms/form-edit-panel', compact('estructura'));
        }
    }

    public function validarSesion()
    {
        if (session()->has('dataUsuario')) {
            $rol = session('dataUsuario')->rol;
            $tipo = session('dataUsuario')->tipoUsuario;
            
            if ($rol == 1 && $tipo == 'Admin' || $rol == 0 && $tipo == 'SU') {
                return 2;
            }
            return 1;
        }
        return 0;
    }
}
