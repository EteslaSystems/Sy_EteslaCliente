<?php

namespace App\APIModels;

class APIUsuario extends GuzzleHttpRequest
{
	public function insertar($request)
	{
		return $this->post("insertarUsuario", $request);
	}

	public function validar($request)
	{
		return $this->post("validarUsuario", $request);
	}
}
