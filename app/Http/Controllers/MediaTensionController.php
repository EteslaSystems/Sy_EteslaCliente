<?php

namespace App\Http\Controllers;

use App\APIModels\APIPaneles;
use App\APIModels\APIInversores;
use Illuminate\Http\Request;

class MediaTensionController extends Controller
{
    protected $paneles;
    protected $inversores;

	public function __construct(APIPaneles $paneles, APIInversores $inversores)
	{
		$this->paneles = $paneles;
		$this->inversores = $inversores;
	}

	public function index()
    {
        $vPaneles = $this->paneles->view();
        $vInversores = $this->inversores->view();

		return view('roles/seller/cotizador/mediaTension', compact('vPaneles', 'vInversores'));
    }
}