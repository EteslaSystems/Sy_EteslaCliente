<?php

namespace App\Http\Controllers;
use PDF;
use Throwable;

class PDFController extends Controller
{
    public function generatePDF($propuesta)
    {  
        try{
            $pdfTemplate = '';
            $tipoCotizacion = $propuesta["tipoCotizacion"];

            //Nombre del documento PDF
            $fileName = $this->getFileName($propuesta);

            if($tipoCotizacion === "bajaTension"){
                $pdfTemplate = 'PDFTemplates.bajaTension';
            }

            if($tipoCotizacion === "CombinacionCotizacion"){
                $pdfTemplate = 'PDFTemplates.propuestaCombinaciones';
            }

            if($tipoCotizacion === "individual"){
                $pdfTemplate = 'PDFTemplates.individual';
            }

            $pdf = PDF::loadview($pdfTemplate, $propuesta)
            ->setOptions(['isRemoteEnabled' => true])
            ->setPaper('A4');

            //Se comprueba *LA EXISTENCIA* del directorio en donde se almacenaran los PDF
            if(!file_exists(storage_path('/pdfsGenerados'))){
                //Si no existe, SE CREA EL DIRECTORIO
                mkdir(storage_path().'/pdfsGenerados');
            }

            $path = storage_path('/pdfsGenerados'); //Ruta de almacenamiento

            $pdf->save($path . '/' . $fileName); ///Se guarda el pdf elaborado en el server (root)

            $pdf = $path . '/' . $fileName; ///Nombre path + Nombre documento.pdf

            return response()->download($pdf);
        }
        catch(Throwable $error){
            report($error);
        }
    }

    public function getFileName($data)
    {
        if($data["tipoCotizacion"] != "CombinacionCotizacion"){
            /* La *data.tipioCotizacion* que sea diferente a "CombinacionCotizacion"
               es un [object:request]. Obtener el arrayData del Object:Request, para
               que este sea manipulable y no genere un error.
            */
            $data = $data->all();
        }
        else{ ///Combinaciones
            $data = $data["propuesta"];
        }

        try{
            /* Nombre del cliente - Estructurado */
            $nombre = is_null($data["cliente"]["vNombrePersona"]) ? ' ' : $data["cliente"]["vNombrePersona"];
            $primerApellido = is_null($data["cliente"]["vPrimerApellido"]) ? ' ' : $data["cliente"]["vPrimerApellido"];
            $segundoApellido = is_null($data["cliente"]["vSegundoApellido"]) ? ' ' : $data["cliente"]["vSegundoApellido"];
            
            /* Nombre del cliente - Completo */
            $fullName = $nombre . $primerApellido . $segundoApellido;

            $tipoCotizacion = $data["tipoCotizacion"];

            $nombrePropuesta = $fullName . '_' . $tipoCotizacion . '_'  . time() . '.pdf';

            return $nombrePropuesta;
        }
        catch(Throwable $error){
            throw $error;
        }
    }

    public function visualizarPDF()
    {
        $pdf = PDF::loadview('PDFTemplates.machotes.propuestaCombinaciones')
        ->setOptions(['isRemoteEnabled' => false])
        ->setPaper('A4');

        return $pdf->stream('test.pdf');
    }
}
