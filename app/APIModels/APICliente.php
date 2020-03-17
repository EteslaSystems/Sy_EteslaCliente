<?php

namespace App\APIModels;

class APICliente extends GuzzleHttpRequest
{
	public function insertarCliente($request)
	{
		return $this->post("agregar-cliente", $request);
	}
}
