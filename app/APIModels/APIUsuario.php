<?php

namespace App\APIModels;

class APIUsuario extends GuzzleHttpRequest
{
	public function insertar($request)
	{
		return $this->post("agregar-usuario", $request);
	}

	public function validar($request)
	{
		return $this->post("validar-usuario", $request);
	}
}
