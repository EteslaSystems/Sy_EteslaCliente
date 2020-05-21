<?php

namespace App\APIModels;

class APICotizacion extends GuzzleHttpRequest
{
    /*#region Media_Tensino*/
    /*#region GDMTH*/
    public function sendPeriodsGDMTH($request)
    {
        return $this->post("sendPeriods",$request);
    }
    /*#endregion*/
    /*#endregion*/
    
    /*#region cotizacion_individual*/
    public function sendSingleQuotation($request)
    {
        return $this->post("cotizacionIndividual",$request);
    }
    /*#endregion*/
}