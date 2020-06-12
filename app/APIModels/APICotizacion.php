<?php

namespace App\APIModels;

class APICotizacion extends GuzzleHttpRequest
{
    /*#region Media_Tensino*/
    /*#region GDMTH*/
    //1er. Paso - Energia requerida y paneles
    public function sendPeriodsGDMTH($request)
    {
        return $this->post("sendPeriods",$request);
    }

    //2do. Paso - Inversores requeridos
    public function sendInversorSeleccionado($request)
    {
        return $this->post("sendInversorSelected",$request);
    }

    //3er Paso -
    public function calcularViaticos_Totales($request)
    {
        return $this->post("calcularVT",$request);
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