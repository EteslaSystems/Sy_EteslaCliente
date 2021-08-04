<?php

namespace App\Http\Controllers;
use PDF;

class PDFController extends Controller
{
    public function generatePDF($propuesta)
    {   
        $pdfTemplate = '';

        if($propuesta["tipoCotizacion"] === "bajaTension"){ //bajaTension || mediaTension
            $pdfTemplate = 'PDFTemplates.bajaTensionPDF';
        }
        else{ //individual
            $pdfTemplate = 'PDFTemplates.individualPDF';
        }

        $pdf = PDF::loadview($pdfTemplate,$propuesta)
        ->setOptions(['isRemoteEnabled' => true])
        ->setPaper('A4');

        $path = public_path('/pdfsGenerados'); //Ruta de almacenamiento
        $fileName = $this->getFileName($propuesta); //Nombre del documento PDF

        $pdf->save($path . '/' . $fileName); ///Se guarda el pdf elaborado en el server (root)

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
        // $pdf = PDF::loadview('PDFTemplates.exampleDeleteCopia')
        $pdf = PDF::loadview('PDFTemplates.machotes.bajaTension')
        ->setOptions(['isRemoteEnabled' => true])
        ->setPaper('A4');

        return $pdf->stream('test.pdf');
    }
}
