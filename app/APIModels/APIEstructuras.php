<?php
namespace App\APIModels;

class APIEstructuras extends GuzzleHttpRequest
{
	public function view()
	{
		return $this->get("lista-estructuras");
	}

	public function search($request)
	{
		return $this->put("buscar-estructura", $request);
	}
}
