<?php

namespace App\Http\Controllers;
use PDF;
use Throwable;

class PDFController extends Controller
{
    public function generatePDF($propuesta)
    {  
        try{
            /*#region Variables*/
            $pdfTemplate = '';
            $tipoCotizacion = $propuesta["tipoCotizacion"];
            ///Arrays - Only **Combinaciones**
            /*#region Arrays*/
            $_consumos = [];
            $_combinacionEconomica = [];
            $_combinacionMediana = [];
            $_combinacionOptima = [];
            // $_combinaciones = [];
            $_propuestaSeleccionada = [];
            /*#endregion*/
            /*#endregion*/
            
            ////
            if($tipoCotizacion === "bajaTension"){ //bajaTension || mediaTension
                $pdfTemplate = 'PDFTemplates.bajaTension';
            }
            
            if($tipoCotizacion === "CombinacionCotizacion"){
                $pdfTemplate = 'PDFTemplates.machotes.propuestaCombinaciones';
                $_consumos = $propuesta["_arrayConsumos"]["consumo"];
                $_combinacionEconomica = $propuesta["combinacionEconomica"][0];
                $_combinacionMediana = $propuesta["combinacionMediana"][0];
                $_combinacionOptima = $propuesta["combinacionOptima"][0];
                $_propuestaSeleccionada = $propuesta["propuesta"];
            }

            if($tipoCotizacion === "individual"){ //individual
                $pdfTemplate = 'PDFTemplates.individual';
            }

            /*
                NOTA: Dependiendo de que la propuesta traiga o no -Combinaciones-
                sera como se mande a llamar la funcion de -loadview()-
            */
            //Validar que la propuesta TENGA o NO, -Combinaciones-
            if($tipoCotizacion === "CombinacionCotizacion"){
                $pdf = PDF::loadview($pdfTemplate, $_propuestaSeleccionada);
            }
            else{
                $pdf = PDF::loadview($pdfTemplate, $propuesta);
            }


            $pdf->setOptions(['isRemoteEnabled' => true]);
            $pdf->setPaper('A4');

            //Se comprueba *LA EXISTENCIA* del directorio en donde se almacenaran los PDF
            if(!file_exists(storage_path('/pdfsGenerados'))){
                //Si no existe, SE CREA EL DIRECTORIO
                mkdir(storage_path().'/pdfsGenerados');
            }

            $path = storage_path('/pdfsGenerados'); //Ruta de almacenamiento

            //Nombre del documento PDF
            // $fileName = $this->getFileName($propuesta);
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
        $pdf = PDF::loadview('PDFTemplates.machotes.propuestaCombinaciones')
        ->setOptions(['isRemoteEnabled' => false])
        ->setPaper('A4');

        return $pdf->stream('test.pdf');
    }
}
