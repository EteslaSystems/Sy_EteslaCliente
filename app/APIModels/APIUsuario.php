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

	public function verificacion($request)
	{
		return $this->post("verificar-email", $request);
	}

	public function recuperarContra($request)
	{
		return $this->post("recuperar-password", $request);
	}
}
