<?php

namespace App\APIModels;

class APIOtrosMateriales extends GuzzleHttpRequest
{
	public function view()
	{
		return $this->get("listar-otroMaterial");
	}

	public function delete($request)
	{
		return $this->put("eliminar-otroMaterial", $request);
	}

	public function edit($request)
	{
		return $this->put("editar-otroMaterial", $request);
	}

	public function add($request)
	{
		return $this->post("agregar-otroMaterial", $request);
	}

	public function search($request)
	{
		return $this->put("buscar-otroMaterial", $request);
	}
}
