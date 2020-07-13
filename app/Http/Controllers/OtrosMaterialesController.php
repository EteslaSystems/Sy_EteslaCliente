<?php

namespace App\Http\Controllers;

use App\APIModels\APICategoriaMat;
use App\APIModels\APIOtrosMateriales;
use Illuminate\Http\Request;

class OtrosMaterialesController extends Controller
{
	protected $categorias;
	protected $materiales;

	public function __construct(APICategoriaMat $categorias, APIOtrosMateriales $materiales)
	{
		$this->categorias = $categorias;
		$this->materiales = $materiales;
	}

	public function index()
	{
		$vCategorias = $this->categorias->view();
		$vMateriales = $this->materiales->view();

		return view('roles/enginer/otrosmateriales', compact('vCategorias', 'vMateriales'));
	}

	public function destroy($id)
    {
        $data["id"] = $id;

        $vCategorias = $this->categorias->delete([
            'json' => $data
        ]);

        if($vCategorias->status != 200) {
            return redirect('/otros-materiales')->with('status-fail', $vCategorias->message);
        } else {
            return redirect('/otros-materiales')->with('status-success', $vCategorias->message);
        }
    }

    public function edit($id)
    {
        $data["id"] = $id;

        $vCategorias = $this->categorias->search([
            'json' => $data
        ]);

        if($vCategorias->status != 200) {
            return redirect('/otros-materiales')->with('status-fail', $vCategorias->message);
        } else {
            $categoria = $vCategorias->message;

            return view('roles/enginer/forms/form-edit-category', compact('categoria'));
        }
    }

    public function update(Request $request, $id)
    {

        $data["id"] = $id;
        $data["nombreCategoOtrosMats"] = $request->get('c_categorianueva');

        $vCategorias = $this->categorias->edit([
            'json' => $data
        ]);

        if($vCategorias->status != 200){
            return redirect('/otros-materiales')->with('status-fail', $vCategorias->message);
        } else {
            return redirect('/otros-materiales')->with('status-success', $vCategorias->message);
        }
    }

    public function create(Request $request)
    {
        $data["nombreCategoOtrosMats"] = $request->get('c_categorianueva');

        $vCategorias = $this->categorias->add([
            'json' => $data
        ]);

        if($vCategorias->status != 200){
            return redirect('/otros-materiales')->with('status-fail', $vCategorias->message);
        } else {
            return redirect('/otros-materiales')->with('status-success', $vCategorias->message);
        }
    }

    public function destroyMateriales($id)
    {
        $data["id"] = $id;

        $vMateriales = $this->materiales->delete([
            'json' => $data
        ]);

        if($vMateriales->status != 200) {
            return redirect('/otros-materiales')->with('status-fail', $vMateriales->message);
        } else {
            return redirect('/otros-materiales')->with('status-success', $vMateriales->message);
        }
    }

    public function editMateriales($id)
    {
        $data["id"] = $id;

        $vMateriales = $this->materiales->search([
            'json' => $data
        ]);

        if($vMateriales->status != 200) {
            return redirect('/otros-materiales')->with('status-fail', $vMateriales->message);
        } else {
        	$vCategorias = $this->categorias->view();
            $materiales = $vMateriales->message;

            return view('roles/enginer/forms/form-edit-materials', compact('vCategorias', 'materiales'));
        }
    }

    public function updateMateriales(Request $request, $id)
    {

        $data["id"] = $id;
        $data["partida"] = $request->get('m_nombrematerialedit');
        $data["id_CategOtrosMats"] = $request->get('m_agregarcategoriaedit');
        $data["unidad"] = $request->get('m_unidadmaterialedit');
        $data["precioUnitario"] = $request->get('m_preciounitarioedit');

        $vMateriales = $this->materiales->edit([
            'json' => $data
        ]);

        if($vMateriales->status != 200){
            return redirect('/otros-materiales')->with('status-fail', $vMateriales->message);
        } else {
            return redirect('/otros-materiales')->with('status-success', $vMateriales->message);
        }
    }

    public function createMateriales(Request $request)
    {

        $data["partida"] = $request->get('m_nombrematerial');
        $data["id_CategOtrosMats"] = $request->get('m_agregarcategoria');
        $data["unidad"] = $request->get('m_unidadmaterial');
        $data["precioUnitario"] = $request->get('m_preciounitario');

        $vMateriales = $this->materiales->add([
            'json' => $data
        ]);

        if($vMateriales->status != 200){
            return redirect('/otros-materiales')->with('status-fail', $vMateriales->message);
        } else {
            return redirect('/otros-materiales')->with('status-success', $vMateriales->message);
        }
    }
}
