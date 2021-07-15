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

    public function create(Request $request)
    {
        $data["vNombreMaterialFot"] = $request->get('p_nombrematerial');
        $data["vMarca"] = $request->get('p_marca');
        $data["fPrecio"] = $request->get('p_precio');
        $data["vGarantia"] = $request->get('p_garantia');
        $data["vOrigen"] = $request->get('p_origen');
        $data["imgRuta"] = $request->get('p_imgRuta');

        $vEstructuras = $this->estructuras->add([
            'json' => $data
        ]);

        if($vEstructuras->status != 200){
            return redirect('/material-fotovoltaico')->with('status-fail', $vEstructuras->message);
        } else {
            return redirect('/material-fotovoltaico')->with('status-success', $vEstructuras->message);
        }
    }

    public function destroy($id)
    {
        $data["id"] = $id;
        
        $vEstructuras = $this->estructuras->delete([
            'json' => $data
        ]);

        if($vEstructuras->status != 200) {
            return redirect('material-fotovoltaico')->with('status-fail', $vEstructuras->message);
        } else {
            return redirect('material-fotovoltaico')->with('status-success', $vEstructuras->message);
        }
    }

	public function read()
    {
        $vEstructuras = $this->estructuras->view();
        $vEstructuras = response()->json($vEstructuras);

        return $vEstructuras;
    }

    public function searcH(Request $request)
    {
        $data["id"] = $request->id;
        
        $vEstructuras = $this->estructuras->search(['json' => $data]);
		
        return response()->json($vEstructuras);
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
