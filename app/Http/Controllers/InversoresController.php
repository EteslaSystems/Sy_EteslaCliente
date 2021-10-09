<?php

namespace App\Http\Controllers;

use App\APIModels\APIInversores;
use Illuminate\Http\Request;

class InversoresController extends Controller
{
    protected $inversores;

	public function __construct(APIInversores $inversores)
	{
		$this->inversores = $inversores;
	}

	public function index()
    {
        if ($this->validarSesion() == 0) {
            return redirect('/')->with('status-fail', 'Debe iniciar sesión para acceder al sistema.');
        }
        if ($this->validarSesion() == 1) {
            return redirect('index')->with('status-fail', 'Solo los administradores pueden acceder a esta vista.');
        }
        $vInversores = $this->inversores->view();

        return view('roles/admin/inversores', compact('vInversores'));
    }

    public function destroy($id)
    {
        $data["id"] = $id;

        $vInversores = $this->inversores->delete([
            'json' => $data
        ]);

        if($vInversores->status != 200) {
            return redirect('material-fotovoltaico')->with('status-fail', $vInversores->message);
        } else {
            return redirect('material-fotovoltaico')->with('status-success', $vInversores->message);
        }
    }

    public function edit($id)
    {
        $data["id"] = $id;

        $vInversores = $this->inversores->search([
            'json' => $data
        ]);

        if($vInversores->status != 200) {
            return redirect('/inversores')->with('status-fail', $vInversores->message);
        } else {
            $inversor = $vInversores->message;

            return view('roles/admin/forms/form-edit-investor', compact('inversor'));
        }
    }

    public function update(Request $request, $id)
    {

        $data["id"] = $id;
        $data["nombrematerial"] = $request->get('i_nombrematerial');
        $data["marca"] = $request->get('i_marca');
        $data["precio"] = $request->get('i_precio');
        $data["potencia"] = $request->get('i_potencia');
        $data["isc"] = $request->get('i_isc');
        $data["moneda"] = $request->get('i_tipomoneda');
        $data["garantia"] = $request->get('i_garantia');
        $data["origen"] = $request->get('i_origen');
        $data["ivmin"] = $request->get('i_vmin');
        $data["ivmax"] = $request->get('i_vmax');
        $data["ipmin"] = $request->get('i_pmin');
        $data["ipmax"] = $request->get('i_pmax');
        $data["imgRuta"] = $request->get('i_imgRuta');

        $vInversores = $this->inversores->edit([
            'json' => $data
        ]);

        if($vInversores->status != 200){
            return redirect('/inversores')->with('status-fail', $vInversores->message);
        } else {
            return redirect('/inversores')->with('status-success', $vInversores->message);
        }
    }

    public function create(Request $request)
    {
        $data["vTipoInversor"] = $request->get('sctTipoInversor');
        $data["panelesSoportados"] = $request->get('i_paneleSoportados');
        $data["nombrematerial"] = $request->get('i_nombrematerial');
        $data["marca"] = $request->get('i_marca');
        $data["precio"] = $request->get('i_precio');
        $data["potencia"] = $request->get('i_potencia');
        $data["isc"] = $request->get('i_isc');
        $data["moneda"] = $request->get('i_tipomoneda');
        $data["garantia"] = $request->get('i_garantia');
        $data["origen"] = $request->get('i_origen');
        $data["ivmin"] = $request->get('i_vmin');
        $data["ivmax"] = $request->get('i_vmax');
        $data["ipmin"] = $request->get('i_pmin');
        $data["ipmax"] = $request->get('i_pmax');
        $data["imgRuta"] = $request->get('i_imgRuta');

        /* */
        $data["microInversor1"] = $request->get('sctMicroInv1');
        $data["microInversor2"] = $request->get('sctMicroInv2');

        $vInversores = $this->inversores->add(['json' => $data]);

        if($vInversores->status != 200){
            return redirect('/material-fotovoltaico')->with('status-fail', $vInversores->message);
        } else {
            return redirect('/material-fotovoltaico')->with('status-success', $vInversores->message);
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

    public function getInversoresSelectos(Request $request)
    {
        $array["objPanelSelect"] = $request->objPanelSelect;
        $vInversores = $this->inversores->inversores_selectos(['json' => $array]);
        $vInversores = response()->json($vInversores);

        return $vInversores;
    }

    public function getMicroInversores(Request $request)
    {
        $micros["vTipoInversor"] = $request->vTipoInversor;
        $micros = $this->inversores->obtenerMicroInversores(['json' => $micros]);

        return response()->json($micros);
    }
}
