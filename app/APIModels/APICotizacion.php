<?php

namespace App\APIModels;

class APICotizacion extends GuzzleHttpRequest
{
    /*#region GDMTH*/
    public function sendPeriodsGDMTH($request)
    {
        $this->post("sendPeriods",$request);
    }
    /*#endregion*/
    /*#region cotizacion_individual*/
    public function sendSingleQuotation($request)
    {
        $this->post("cotizacionIndividual",$request);
    }
    /*#endregion*/
}