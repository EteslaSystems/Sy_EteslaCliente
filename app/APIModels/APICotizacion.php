<?php

namespace App\APIModels;

class APICotizacion extends GuzzleHttpRequest
{
    /*#region GDMTH*/
    public function sendPeriodsGDMTH($request)
    {
        $this->post("sendPeriods",$request);
    }
    /*#endregion GDMTH#*/

}