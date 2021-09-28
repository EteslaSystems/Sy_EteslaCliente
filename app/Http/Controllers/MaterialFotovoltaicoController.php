<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\APIModels\APIPaneles;
use App\APIModels\APIInversores;
use App\APIModels\APIEstructuras;

class MaterialFotovoltaicoController extends Controller
{
    protected $panel;
	protected $inversor;
    protected $estructura;

    public function __construct(APIPaneles $paneles, APIInversores $inversores, APIEstructuras $estructuras)
	{
		$this->panel = $paneles;
		$this->inversor = $inversores;
        $this->estructura = $estructuras;
	}

    public function index()
    {
        $paneles = $this->panel->view();
        $inversores = $this->inversor->view();
        $estructuras = $this->estructura->view();
        $estructuras = $estructuras->message;

        return view('roles/admin/materialFotovoltaico', compact('paneles','inversores','estructuras'));
    }
}
