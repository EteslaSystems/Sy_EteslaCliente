<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sunra\PhpSimple\HtmlDomParser;

class sellerController extends Controller
{
    //public function index()
    //{
        /* #region PanelPrecioDolar*/
        /* #region TodayDate*/
    //    $fecha = new \DateTime();
    //    $fecha->format('d-m-Y');
        /* #endregion */

    //    $sPrecioDolar = $this->precioDelDolar();
    //    $compraDolar = substr($sPrecioDolar["1.0"],1);
    //    $ventaDolar = substr($sPrecioDolar["1.1"],1);
        /* #endregion */

    //    return view('roles/seller/inicioS',['compraDolar' => $compraDolar,'ventaDolar' => $ventaDolar,'fecha' => $fecha]);
    //}

    public function precioDelDolar()
    {
        $dato = HTMLDomParser::str_get_html();

        //$paginaBanorte = file_get_html('https://www.banorte.com/wps/portal/ixe/Home/indicadores/tipo-de-cambio');
        
        /*preg_match_all('/"tag">(.*?)</',$paginaBanorte,$matches);

        $datos = \Arr::only($matches,[1]);
        $precioDolar = \Arr::dot($datos); 

        $subCompra = $precioDolar["1.0"];
        $subVenta = $precioDolar["1.1"];*/

        dd($paginaBanorte);
        
        //return $precioDolar;
    }
}
