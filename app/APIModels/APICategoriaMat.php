<?php

namespace App\APIModels;

class APICategoriaMat extends GuzzleHttpRequest
{
	public function view()
	{
		return $this->get("listar-categoriaMateriales");
	}

	public function delete($request)
	{
		return $this->put("eliminar-categoriaMateriales", $request);
	}

	public function edit($request)
	{
		return $this->put("editar-categoriaMateriales", $request);
	}

	public function add($request)
	{
		return $this->post("agregar-categoriaMateriales", $request);
	}

	public function search($request)
	{
		return $this->put("buscar-categoriaMateriales", $request);
	}
}
