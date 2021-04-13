<?php

namespace App\Http\Controllers;
use PDF;


class PDFController extends Controller
{
    //Aqui se programara todo lo relacionado al PDF (nombrado del archivo, la generacion, etc)

    public function generatePDF($data)
    {   
        // $data = [ 
        //     'nombre' => 'LaloHer420',
        //     'imgRouteCode' => 'https://drive.google.com/thumbnail?id=1N2wEt4wgaqz2iJacrll-WJW8ygDqgfUN'
        // ];

        $pdf = PDF::loadview('PDFTemplates.pdfBajaTension', $data)
        ->setOptions(['isRemoteEnabled' => true])
        ->setPaper('A4');

        $path = public_path('pdfsGenerados/'); //Ruta de almacenamiento
        // $fileName = $data->;

        // return $pdf->stream('pdfPrueba.pdf');
    }

    public function getFileName($data)
    {
        $nombreCliente = $data->cliente->vNombrePersona . $data->cliente->vPrimerApellido . $data->cliente->vSegundoApellido;
        $tipoCotizacion = $data->tipoCotizacion;
        $potencia = $data->paneles->fPotencia . 'W'; //Potencia a instalar
    }
}
