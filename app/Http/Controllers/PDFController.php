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

            if($propuesta["tipoCotizacion"] === "bajaTension"){ //bajaTension || mediaTension
                // if(isset($propuesta->combinaciones)){ //Con Combinaciones
                //     echo 'hello world!';
                // }
                // else{ //Sin Combinaciones
                    
                // }

                // $pdfTemplate = 'PDFTemplates.bajaTension';
                $pdfTemplate = 'PDFTemplates.propuestaCombinaciones';
            }
            
            if($propuesta["tipoCotizacion"] === "individual"){ //individual
                $pdfTemplate = 'PDFTemplates.individual';
            }

            $pdf = PDF::loadview($pdfTemplate, $propuesta)
            ->setOptions(['isRemoteEnabled' => true])
            ->setPaper('A4');

            //Se comprueba *LA EXISTENCIA* del directorio en donde se almacenaran los PDF
            if(!file_exists(public_path('/pdfsGenerados'))){
                //Si no existe, SE CREA EL DIRECTORIO
                mkdir(public_path().'/pdfsGenerados');
            }

            $path = public_path('/pdfsGenerados'); //Ruta de almacenamiento

            // $fileName = $this->getFileName($propuesta); //Nombre del documento PDF
            $fileName = 'test.pdf';

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
        try{
            /* Nombre del cliente - Estructurado */
            $nombre = is_null($data->cliente["vNombrePersona"]) ? ' ' : $data->cliente["vNombrePersona"];
            $primerApellido = is_null($data->cliente["vPrimerApellido"]) ? ' ' : $data->cliente["vPrimerApellido"];
            $segundoApellido = is_null($data->cliente["vSegundoApellido"]) ? ' ' : $data->cliente["vSegundoApellido"];
            
            /* Nombre del cliente - Completo */
            $fullName = $nombre . $primerApellido . $segundoApellido;

            $tipoCotizacion = $data->tipoCotizacion;

            $nombrePropuesta = $fullName . '_' . $tipoCotizacion . '_'  . time() . '.pdf';

            return $nombrePropuesta;
        }
        catch(Throwable $error){
            throw $error;
        }
    }

    public function visualizarPDF()
    {
        $pdf = PDF::loadview('PDFTemplates.machotes.bajaTension')
        ->setOptions(['isRemoteEnabled' => true])
        ->setPaper('A4');

        return $pdf->stream('test.pdf');
    }
}
