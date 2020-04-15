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
}
