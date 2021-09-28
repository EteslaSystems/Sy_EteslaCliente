<?php

namespace App\APIModels;

class APIPropuestas extends GuzzleHttpRequest
{
    public function getPropuestasByCliente($request)
    {
        return $this->post("getPropuestaByCliente", $request);
    }
}