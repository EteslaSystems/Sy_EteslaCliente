<?php

namespace App\APIModels;

class APIVendedor extends GuzzleHttpRequest
{
	public function listarPorUsuario($request)
	{
		return $this->post("listarClientePorUsuario", $request);
	}
}
