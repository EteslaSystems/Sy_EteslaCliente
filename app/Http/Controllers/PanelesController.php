<?php

namespace App\Http\Controllers;

use App\APIModels\APIPaneles;
use Illuminate\Http\Request;

class PanelesController extends Controller
{
    protected $paneles;

	public function __construct(APIPaneles $paneles)
	{
		$this->paneles = $paneles;
	}

	public function index()
    {
        $vPaneles = $this->paneles->view();

		return view('roles/admin/paneles', compact('vPaneles'));
    }

    public function destroy($id)
    {
        $data["id"] = $id;

        $vPaneles = $this->paneles->delete([
            'json' => $data
        ]);

        if($vPaneles->status != 200) {
            return redirect('/paneles')->with('status-fail', $vPaneles->message);
        } else {
            return redirect('/paneles')->with('status-success', $vPaneles->message);
        }
    }

    public function edit($id)
    {
        $data["id"] = $id;

        $vPaneles = $this->paneles->search([
            'json' => $data
        ]);

        if($vPaneles->status != 200) {
            return redirect('/paneles')->with('status-fail', $vPaneles->message);
        } else {
            $panel = $vPaneles->message;

            return view('roles/admin/forms/form-edit-panel', compact('panel'));
        }
    }

    public function update(Request $request, $id)
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

    public function create(Request $request)
    {
        
        $data["nombrematerial"] = $request->get('p_nombrematerial');
        $data["marca"] = $request->get('p_marca');
        $data["precio"] = $request->get('p_precio');
        $data["potencia"] = $request->get('p_potencia');
        $data["isc"] = $request->get('p_isc');
        $data["moneda"] = $request->get('p_tipomoneda');
        $data["voc"] = $request->get('p_voc');
        $data["vmp"] = $request->get('p_vmp');

        $vPaneles = $this->paneles->add([
            'json' => $data
        ]);

        if($vPaneles->status != 200){
            return redirect('/paneles')->with('status-fail', $vPaneles->message);
        } else {
            return redirect('/paneles')->with('status-success', $vPaneles->message);
        }
    }
}
