<?php

namespace App\Http\Controllers;
use PDF;


class PDFController extends Controller
{
    //Aqui se programara todo lo relacionado al PDF (nombrado del archivo, la generacion, etc)

    public function generatePDF($propuesta)
    {   
        $pdf = PDF::loadview('PDFTemplates.exampleDelete',$propuesta)
        ->setOptions(['isRemoteEnabled' => true])
        ->setPaper('A4');

        $path = public_path('/pdfsGenerados'); //Ruta de almacenamiento
        $fileName = $this->getFileName($propuesta);

        $pdf->save($path . '/' . $fileName); ///Se guarda el pdf elaborado en el server(root)

        $pdf = $path . '/' . $fileName; ///Nombre path + Nombre documento.pdf

        return response()->download($pdf);
    }

    public function getFileName($data)
    {
        $nombreCliente = $data->cliente["vNombrePersona"] . $data->cliente["vPrimerApellido"] . $data->cliente["vSegundoApellido"];
        $tipoCotizacion = $data->tipoCotizacion;
        $potencia = $data->paneles["potencia"] . 'W'; //Potencia a instalar

        $nombrePropuesta = $nombreCliente . '_' . $tipoCotizacion . '_' . $potencia . '_' . time() . '.pdf';

        return $nombrePropuesta;
    }

    public function visualizarPDF()
    {
        $pdf = PDF::loadview('PDFTemplates.exampleDelete')
        ->setOptions(['isRemoteEnabled' => true])
        ->setPaper('A4');

        return $pdf->stream('test.pdf');
    }
}
