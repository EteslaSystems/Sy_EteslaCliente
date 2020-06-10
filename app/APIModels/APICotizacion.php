<?php

namespace App\APIModels;

class APICotizacion extends GuzzleHttpRequest
{
    /*#region Media_Tensino*/
    /*#region GDMTH*/
    //1er. Paso
    public function sendPeriodsGDMTH($request)
    {
        return $this->post("sendPeriods",$request);
    }

    //2do. Paso
    public function sendInversorSeleccionado($request)
    {
        return $this->post("sendInversorSelected",$request);
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