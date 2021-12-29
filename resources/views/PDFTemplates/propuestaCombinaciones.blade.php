<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<style type="text/css">
    /* --------------- ---------------------- */
   /* *{
        font-family: 'Roboto', sans-serif;
    }*/
    html{
        margin: 0;
    }
    .footer-page{
        position: fixed;
        bottom: 0cm; 
        left: 0cm; 
        right: 0cm;
        height: 19px;
        background-color: #5FC055;
    }

    /* Contenedores */
    .container-fluid{
        padding: 0 !important;
    }
    .container-table{
        margin-top: -30px;
        margin-left: 25px;
        margin-right: 20px;
    }
    .div-contenedor{
        margin-left:40px; 
        margin-right:40px; 
        margin-top:7px;
    }
    /* Salto de pagina [hr] */
    hr.salto-pagina{
        page-break-after: always;
        border: 0;
        margin: 0;
        padding: 0;
    }
    hr.linea-division{
        height: 6.5px;
        border-style: none;
    } 

    /* --------------- ---------------------- */

    /* Contenido hoja */
    #logoTipoEtesla{
        width: 22%;
    }

    #recuadroPaneles{
        width:100%;
        height: 315px;
        background-repeat: no-repeat;
        margin-left: 80px;
        border-radius: 15px;
    }

    #recuadroFlotante{
        background-color: white;
        margin-top: -260px;
        margin-left: 80px;
        border-radius: 15px;
        width: 360px;
        height: 260px;
        text-align: left;
    }

    /* Tablas */
    .table-costos-proyecto{
        width: 100%;
        text-align: center;
        border-collapse: collapse; 
        border-radius: 10px;
        border: 1px solid black;
        overflow: hidden;
    }
    .table-costos-proyecto thead{
        background-color: green;
        color: white;
        font-size: 16px;
        font-weight: bold;
    }

    .table-contenedor{
        width: 100%;
        border-collapse: collapse;
    }

    /* Tab - Financiamiento */
    .tabFinanciamiento{
        width: 100%;
        color: #fff;
        background-color: #3A565E;
        border-collapse: collapse;
        border-radius: 20px;
        overflow: hidden;
    }
    .tabFinanciamiento th, .tabFinanciamiento td{
        border: 3px solid white;
        color: white;
        text-align: center;
    }

    /* Tab - Comparativa [Combinaciones] */
    .table-comparative{
        width: 100%;
        border-collapse: collapse;
        border-radius: 20px;
        overflow: hidden;
        text-align: center;
    }

    .table-comparative th, .table-comparative td{
        border: 2px solid #EFEFEF;
        width: 45%;
    }
    .title-tab-comparativa{
        font-size: 13px;
        font-weight: bolder;
    }
    .text-tab-comparativa{
        font-size: 12px;
    }
    .imgLogos{
        width: 62px;
        height: 45px;
    }
    .recuadroInfo{
        /* Recuadro */
        width: 100%;
        border-style: ridge;
        text-align: justify;
        /* Texto */
        font-size: 12px;
    }

    /* Textos */
    .textIncProupesta{
        margin-left: 15px;
        line-height: 90%;
    }
    .text-inferior-pag1{
        font-size: 11px;
        font-weight: bolder;
    }
    .text-inferior-pag1-secundary{
        font-size: 10px;
    }
    .garantias{
        line-height: 5%;
        text-align: center;
    }
    .nota{
        font-size:11px; 
        color: #969696;
        text-align: center;
    }

    /* Cards */
    .card{
        margin-top: 3px;
        width: 175px;
        padding: 20px;
        border-radius: 20px;
    }
    .card-header{
        background: rgb(52, 181, 69); 
        color: rgb(255, 255, 255);
        margin: -20px;
        padding: 10px;
        font-size: 10px;
        height: 10px;
        text-align: center;
    }
    .card-body{ 
        margin: -20px;
        padding: 20px;
        font-size: 18px;
        line-height: 20%;

        border-top: none;
        border-left: 1px solid #D9D9D9;
        border-right: 1px solid #D9D9D9;
        border-bottom: 1px solid #D9D9D9;
    }
    .rectangulo-into-card{
        border-style: groove;
        border: 1px solid;

        width: 160px;
        height: 100px;
        margin-left: 10px;
    }
</style>
<body>
    <!-- Pagina 1 -->
    <div class="container-fluid" style="border-top: 10px solid #5576F2;">
        <table>
            <tr>
                <td>
                    <img id="logoTipoEtesla" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/etesla-logo.png'))) }}"> 
                </td>
                <td>
                    <h1 style="font-size:25px; text-align:right; margin-right: 27px;">SISTEMA FOTOVOLTAICO INTERCONECTADO A LA RED DE CFE</h1>
                </td>
            </tr>
        </table>
        <img id="recuadroPaneles" src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('/img/Paneles-solares-tesla.jpg'))) }}"/>
        <div id="recuadroFlotante">
            <div>
                <p id="fechaCreacion" class="textIncProupesta"><strong>Fecha de creacion: {{ date('Y-m-d') }}</strong></p>
                <p id="nombreCliente" class="textIncProupesta"><strong>Cliente: </strong>{{ $propuesta["cliente"]["vNombrePersona"] ." ". $propuesta["cliente"]["vPrimerApellido"] ." ". $propuesta["cliente"]["vSegundoApellido"] }}</p>
                <p id="direccionCliente" class="textIncProupesta"><strong>Direccion: </strong>{{ $propuesta["cliente"]["vCalle"] .", ". $propuesta["cliente"]["cCodigoPostal"] .", ". $propuesta["cliente"]["vCiudad"] ." ". $propuesta["cliente"]["vEstado"] }}</p>
                <p id="asesor" class="textIncProupesta"><strong>Asesor: </strong>{{ $propuesta["vendedor"]["vNombrePersona"] ." ". $propuesta["vendedor"]["vPrimerApellido"] ." ". $propuesta["vendedor"]["vSegundoApellido"] }}</p>
                <p id="sucursal" class="textIncProupesta"><strong>Sucursal: </strong>{{ $propuesta["vendedor"]["vOficina"] }}</p>
                <p id="caducidad-propuesta" style="margin-left:13px;"><strong>Validez de <u>{{ $propuesta["expiracion"]["cantidad"] . " " . $propuesta["expiracion"]["unidadMedida"] }}</u></strong></p>
            </div>
        </div>
        <div class="container-table">
            <table class="table-costos-proyecto">
                <thead>
                    <tr>
                        <th scope="col">TIPO</th>
                        <th scope="col">MARCA</th>
                        <th scope="col">CANTIDAD</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="desglocePanel" style="background-color:#F2F1F0;">
                        <td>Panel</td>
                        <td id="marcaPanel">{{ $propuesta["paneles"]["vMarca"] }}</td>
                        <td id="cantidadPanel">{{ $propuesta["paneles"]["noModulos"] }}</td>
                        <td id="modeloPanel" style="font-size: 13px;">{{ $propuesta["paneles"]["nombre"] }}</td>
                        @if($PdfConfig["subtotalesDesglozados"] === "true")
                            <td id="costoTotalPanel">${{ number_format($propuesta["paneles"]["costoTotal"],2) }} USD</td>
                        @else
                            <td id="costoTotalPanel"></td>
                        @endif
                    </tr>
                    <tr id="desgloceInversor">
                        <td>Inversor</td>
                        <td id="marcaInversor">
                            {{ $propuesta["inversores"]["vMarca"] }}
                        </td>
                        @if($propuesta["inversores"]["combinacion"] === "true")
                            <td colspan="2">
                                <p style="font-size:10px;">
                                    {{ $propuesta["inversores"]["numeroDeInversores"]["MicroUno"]["vNombreMaterialFot"] }}: {{ $inversores["numeroDeInversores"]["MicroUno"]["numeroDeInversores"] }}
                                </p>
                                <p style="font-size:10px;">
                                    {{ $propuesta["inversores"]["numeroDeInversores"]["MicroDos"]["vNombreMaterialFot"] }}: {{ $inversores["numeroDeInversores"]["MicroDos"]["numeroDeInversores"] }}
                                </p>
                            </td>
                        @else
                            <td id="cantidadInversor">
                                {{ $propuesta["inversores"]["numeroDeInversores"] }}
                            </td>
                            <td id="modeloInversor" style="font-size: 13px;">
                                {{ $propuesta["inversores"]["vNombreMaterialFot"] }}
                            </td>
                        @endif
                        @if($PdfConfig["subtotalesDesglozados"] === "true")
                            <td id="costoTotalInversor">
                                ${{ number_format($propuesta["inversores"]["costoTotal"],2) }} USD
                            </td>
                        @else
                            <td id="costoTotalInversor"></td>
                        @endif
                    </tr>
                    <tr id="desgloceEstructura" style="background-color:#F2F1F0;">
                        <td>Estructura</td>
                        <td id="marcaEstructura">
                            {{ $propuesta["estructura"]["_estructuras"]["vMarca"] }}
                        </td>
                        <td id="cantidadEstructura">
                            {{ $propuesta["estructura"]["cantidad"] }}
                        </td>
                        <td>Estructura de aluminio</td>
                        @if($PdfConfig["subtotalesDesglozados"] === "true")
                            <td id="costoTotalEstructura">${{ number_format($propuesta["estructura"]["costoTotal"],2) }} USD</td>
                        @else
                            <td id="costoTotalEstructura"></td>
                        @endif
                    </tr>
                    <tr>
                        <td>Mano de obra</td>
                        <td></td>
                        <td></td>
                        <td style="font-size:10px;">*Instalacion *Servicio *Anclaje *Fijacion</td>
                        @if($PdfConfig["subtotalesDesglozados"] === "true")
                            <td id="costoTotalMO">
                                ${{ number_format($propuesta["totales"]["manoDeObra"],2) }} USD
                            </td>
                        @else
                            <td id="costoTotalMO"></td>
                        @endif
                    </tr>
                    <tr style="background-color:#F2F1F0;">
                        <td>Otros</td>
                        <td></td>
                        <td></td>
                        <td style="font-size:10px;">*Cableado *Protecciones *Tramite CFE *Monitoreo PostVenta (permanente)</td>
                        @if($PdfConfig["subtotalesDesglozados"] === "true")
                            <td id="costoTotalOtros">
                                ${{ number_format($propuesta["totales"]["otrosTotal"],2) }} USD
                            </td>
                        @else
                            <td id="costoTotalOtros"></td>
                        @endif
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        @if($propuesta["descuento"]["porcentaje"] >= 1)
                            <td id="tdDescuento" style="background-color:green;">
                                <p style="text-align:center; color:white; font-weight:bolder; font-size:12px;">
                                    Descuento ({{ $propuesta["descuento"]["porcentaje"] }}%)
                                </p>
                            </td>
                        @else
                            <td></td>
                        @endif
                        <td align="center">
                            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/banderas/estados-unidos.png'))) }}"/>
                        </td>
                        <td align="center">
                            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/banderas/mexico.png'))) }}"/>
                        </td>
                    </tr>
                    <tr style="background-color: #E8E8E8;">
                        <td><strong>Total sin IVA</strong></td>
                        <td></td>
                         @if($propuesta["descuento"]["porcentaje"] > 0)
                            <td id="descuentoUSD" style="border-right:solid green; border-left:solid green; border-bottom:solid green;">
                                <p style="font-weight:bolder; text-align:center; font-size:15px; background-color:#FFF66D;">
                                    ${{ number_format($propuesta["descuento"]["descuento"],2) }} USD
                                </p>
                            </td>
                        @else
                            <td></td>
                        @endif
                        <td id="subtotalSinIVAUSD" align="center">
                            ${{ number_format($propuesta["totales"]["precio"],2) }} USD
                        </td>
                        <td id="subtotalSinIVAMXN" align="center">
                            ${{ number_format($propuesta["totales"]["precioMasIVA"],2) }} MXN
                        </td>
                    </tr>
                    <tr style="background-color: #E8E8E8;">
                        <td><strong>Total con IVA</strong></td>
                        <td></td>
                        <td></td>
                        <td id="totalConIVAUSD" align="center">
                            ${{ number_format($propuesta["totales"]["precioMXNSinIVA"],2) }} USD
                        </td>
                        <td id="totalConIVAMXN" align="center">
                            ${{ number_format($propuesta["totales"]["precioMXNConIVA"],2) }} MXN
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Leyenda - Tipo de cambio -->
        <div id="leyendaTipoDeCambio" style="margin-left:20px; margin-right:20px;">
            <p  class="nota"><strong style="color: #2E2D2D;">NOTA: </strong>El tipo de cambio <strong style="color: #2E2D2D;">(${{ $propuesta["tipoDeCambio"] }} mxn)</strong> se tomará el reportado por Banorte a la Venta del día en que se realice cada pago. Se requiere de un 50% de anticipo a la aprobación del proyecto, 35% antes de realizar el embarque de equipos, y 15% posterior a la instalación. El proyecto se entrega preparado para conexión con CFE.</p>
        </div>
        <!-- Logotipos && garantias de las marcas de los equipos -->
        <table class="table-contenedor">
            <tr>
                <td id="imgLogoPanel" align="center" style="border: none;">
                    @php($image = $propuesta['paneles']['vMarca'] . '.png')
                    <img style="width: 140px; height: 100px;" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/panel/' . $image))) }}">
                </td>
                <td id="imgLogoInversor" align="center" style="border: none;">
                    @php($image = $propuesta['inversores']['vMarca'] . '.jpg')
                    <img style="width: 140px; height: 100px;" src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/inversor/' . $image))) }}">
                </td>
                <td id="imgLogoInversor" align="center" style="border: none;">
                    @php($image = $propuesta['estructura']['_estructuras']['vMarca'] . '.png')
                    <img style="width: 140px; height: 100px;" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/estructura/' . $image))) }}">
                </td>
            </tr>
        </table>
        <!-- Fin logos/marcas equip. -->    
        <hr class="linea-division" style="background-color:#5576F2;">

        <table class="table-contenedor">
            <tr>
                <td style="padding-right: 60px;">
                    <div name="ANCE">
                        <div style="margin-left:20px;">
                            <img height="68px" width="60px" src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/ance.jpg'))) }}">
                        </div>
                        <div style="margin-top:-50px; margin-left:80px;">
                            <p class="text-inferior-pag1">
                                Certificado de proveedor confiable
                            </p>
                            <p class="text-inferior-pag1-secundary" style="margin-top:-9px; width: 30%;">
                                Clave: 20FIR00010A00R00
                            </p>
                        </div>
                    </div>
                    <div>
                        <div style="margin-left:20px;">
                            <img height="68px" width="60px" src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/wwf.jpg'))) }}">
                        </div>
                        <div style="margin-top: -50px; margin-left:98px;">
                            <p class="text-inferior-pag1">World Wildlife Fund</p>
                            <p class="text-inferior-pag1-secundary" style="margin-top:-9px;">
                                Ren Mx | WWF México
                                <br>
                                <a href="https://www.wwf.org.mx/">
                                    https://www.wwf.org.mx/
                                </a>
                            </p>
                        </div>
                    </div>
                </td>
                <td>
                    <!-- CARDS -->
                    <div style="margin-top:-100px;">
                        <!-- CARD - "ANTES" -->
                        <div>
                            <div class="card" style="margin-left:-250px; margin-top:120px;">
                                <!-- CONSUMO ACTUAL -->
                                <div class="card-header">
                                    <h2 style="margin-top: -4px;">ANTES</h2>
                                </div>
                                <div class="card-body">
                                    <div class="rectangulo-into-card" style="border: #C31801;">
                                        <p style="font-size: 9px; margin-left:10px; margin-top:15px;">
                                            <strong>
                                                CONSUMO [BIM.] ({{ $propuesta["power"]["old_dac_o_nodac"] }})
                                            </strong>
                                        </p>
                                        <p style="color: #C31801; font-weight: bolder; margin-left:10px;">
                                            {{ number_format($propuesta["promedioConsumosBimestrales"],2) }} kW/bim
                                        </p>
                                        <p style="font-size: 9px; margin-left:10px;">
                                            <strong>TOTAL A PAGAR [BIM.]</strong>
                                        </p>
                                        <p style="color: #C31801; font-weight: bolder; margin-left:10px;">
                                            ${{ number_format($propuesta["power"]["objConsumoEnPesos"]["pagoPromedioBimestral"],2) }} MXN
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- CARD - "NUEVO" -->
                        <div>
                            <div class="card" style="margin-right:-70px; margin-top:-163px;">
                                <!-- NUEVO CONSUMO -->
                                <div class="card-header">
                                    <h2 style="margin-top: -4px;">AHORA</h2>
                                </div>
                                <div class="card-body">
                                    <div class="rectangulo-into-card" style="border: #1E9F26;">
                                        <p style="font-size: 9px; margin-left:10px; margin-top:15px;">
                                            <strong>
                                                CONSUMO [BIM.] ({{ $propuesta["power"]["new_dac_o_nodac"] }})
                                            </strong>
                                        </p>
                                        <p style="color: #1E9F26; font-weight: bolder; margin-left:10px;">
                                            {{ number_format($propuesta["power"]["nuevosConsumos"]["promedioNuevoConsumoBimestral"],2) }} kW/bim
                                        </p>
                                        <p style="font-size: 9px; margin-left:10px;">
                                           <strong>TOTAL A PAGAR [BIM.]</strong> 
                                        </p>
                                        <p style="color: #1E9F26; font-weight: bolder; margin-left:10px;">
                                            ${{ number_format($propuesta["power"]["objGeneracionEnpesos"]["pagoPromedioBimestral"],2) }} MXN
                                        </p>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </td>
            </tr>
        </table>
        <div class="footer-page"></div>
    </div>
    <!-- Fin pagina 1 -->
    <hr class="salto-pagina">

    <!-- Pagina 2 - Comparativa[combinaciones] -->
    <div class="container-fluid">
        <table>
            <tr>
                <td>
                    <img id="logoTipoEtesla" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/etesla-logo.png'))) }}"> 
                </td>
                <td>
                    <h1 style="font-size:25px;">
                        COMPARATIVA DE PROPUESTAS
                    </h1>
                </td>
            </tr>
        </table>
        <div id="comparativas-combinaciones"  class="div-contenedor">
            <!-- Tabla comparativa - [ COMBINACIONES ] -->
            <table class="table-comparative">
                <thead style="background-color:#D68910; color:#FFFFFF;">
                    <tr>
                        <th id="td-invisible" style="border-left:0px; border-top:0px; border-bottom:0px; background-color:#FFFFFF"></th>
                        <th scope="col">
                            @if($propuestaSeleccionada === "combinacionEconomica")
                                <img height="29x" width="29x" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/complementos/estrella.png'))) }}" style="margin-top:3px; margin-left:-10px;"/>
                            @endif
                            <strong class="title-tab-comparativa">Economica</strong>
                        </th>
                        <th scope="col">
                            @if($propuestaSeleccionada === "combinacionMediana")
                                <img height="29x" width="29x" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/complementos/estrella.png'))) }}" style="margin-top:3px; margin-left:-10px;"/>
                            @endif
                            <strong class="title-tab-comparativa">Recomendada</strong>
                        </th>
                        <th scope="col">
                            @if($propuestaSeleccionada === "combinacionOptima")
                                <img height="29x" width="29x" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/complementos/estrella.png'))) }}" style="margin-top:3px; margin-left:-10px;"/>
                            @endif
                            <strong class="title-tab-comparativa">Premium</strong>
                        </th>
                    </tr>
                </thead>
                <tbody>
                     <tr>
                        <td class="title-tab-comparativa">
                            Costo por watt
                        </td>
                        <td id="tdCostoWattA" class="text-tab-comparativa">
                            ${{ number_format($combinacionEconomica["totales"]["precio_watt"],2) }} USD
                        </td>
                        <td id="tdCostoWattB" class="text-tab-comparativa">
                            ${{ number_format($combinacionMediana["totales"]["precio_watt"],2) }} USD
                        </td>
                        <td id="tdCostoWattC" class="text-tab-comparativa">
                            ${{ number_format($combinacionOptima["totales"]["precio_watt"],2) }} USD
                        </td>
                    </tr>
                    <tr>
                        <td class="title-tab-comparativa">
                            Potencia instalada
                        </td>
                        <td id="tdPotenciaInstaladaA" class="text-tab-comparativa">
                            {{ number_format($combinacionEconomica["paneles"]["potenciaReal"],2) }} Kw
                        </td>
                        <td id="tdPotenciaInstaladaB" class="text-tab-comparativa">
                            {{ number_format($combinacionMediana["paneles"]["potenciaReal"],2) }} Kw
                        </td>
                        <td id="tdPotenciaInstaladaC" class="text-tab-comparativa">
                            {{ number_format($combinacionOptima["paneles"]["potenciaReal"],2) }} Kw
                        </td>
                    </tr>
                </tbody>
            </table>
            <table id="panel" class="table-comparative" style="margin-top:20px;">
                <tr>
                    <td colspan="4" style="background-color:#70D85F; color:#FFFFFF;"><strong>Panel</strong></td>
                </tr>
                <tr>
                    <td class="title-tab-comparativa">
                        Marca
                    </td>
                    <td id="tdMarcaPanelA">
                        @php($image = $combinacionEconomica["paneles"]["marca"] . '.png')
                        <img id="imgPanelA" class="imgLogos" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/panel/' . $image))) }}">
                    </td>
                    <td id="tdMarcaPanelB">
                        @php($image = $combinacionMediana["paneles"]["marca"] . '.png')
                        <img id="imgPanelB" class="imgLogos" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/panel/' . $image))) }}">
                    </td>
                    <td id="tdMarcaPanelC">
                        @php($image = $combinacionOptima["paneles"]["marca"] . '.png')
                        <img id="imgPanelC" class="imgLogos" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/panel/Axitec.png'))) }}">
                    </td>
                </tr>
                <tr>
                    <td class="title-tab-comparativa">
                        Modelo
                    </td>
                    <td id="tdModeloPanelA" class="text-tab-comparativa">
                        {{ $combinacionEconomica["paneles"]["nombre"] }}
                    </td>
                    <td id="tdModeloPanelB" class="text-tab-comparativa">
                        {{ $combinacionMediana["paneles"]["nombre"] }}
                    </td>
                    <td id="tdModeloPanelC" class="text-tab-comparativa">
                        {{ $combinacionOptima["paneles"]["nombre"] }}
                    </td>
                </tr>
                <tr>
                    <td class="title-tab-comparativa">
                        Cantidad
                    </td>
                    <td id="tdCantidadPanelA" class="text-tab-comparativa">
                        {{ $combinacionEconomica["paneles"]["noModulos"] }}
                    </td>
                    <td id="tdCantidadPanelB" class="text-tab-comparativa">
                        {{ $combinacionMediana["paneles"]["noModulos"] }}
                    </td>
                    <td id="tdCantidadPanelC" class="text-tab-comparativa">
                        {{ $combinacionOptima["paneles"]["noModulos"] }}
                    </td>
                </tr>
                <tr>
                    <td class="title-tab-comparativa">
                        Origen
                    </td>
                    <td id="tdOrigenPanelA">
                        @php($image = $combinacionEconomica['paneles']['origen'] . '.png')
                        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/banderas/' . $image))) }}">
                     </td>
                    <td id="tdOrigenPanelB">
                        @php($image = $combinacionMediana['paneles']['origen'] . '.png')
                        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/banderas/' . $image))) }}">
                    </td>
                    <td id="tdOrigenPanelC">
                        @php($image = $combinacionOptima['paneles']['origen'] . '.png')
                        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/banderas/' . $image))) }}">
                    </td>
                </tr>
            </table>
            <table id="inversor" class="table-comparative" style="margin-top:20px;">
                <tr>
                    <td colspan="4" style="background-color:#31AEC1; color:#FFFFFF;"><strong>Inversor</strong></td>
                </tr>
                <tr>
                    <td class="title-tab-comparativa">
                        Marca
                    </td>
                    <td id="tdMarcaInversorA">
                        @php($image = $combinacionEconomica["inversores"]["marca"] . '.jpg')
                        <img id="imgInversorA" class="imgLogos" src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/inversor/' . $image))) }}">
                    </td>
                    <td id="tdMarcaInversorB">
                        @php($image = $combinacionMediana["inversores"]["marca"] . '.jpg')
                        <img id="imgInversorB" class="imgLogos" src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/inversor/' . $image))) }}">
                    </td>
                    <td id="tdMarcaInversorC">
                        @php($image = $combinacionOptima["inversores"]["marca"] . '.jpg')
                        <img id="imgInversorC" class="imgLogos" src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/inversor/ABB Fimer.jpg'))) }}">
                    </td>
                </tr>
                <tr>
                    <td class="title-tab-comparativa">
                        Modelo
                    </td>
                    <td id="tdModeloInversorA" class="text-tab-comparativa">
                        {{ $combinacionEconomica["inversores"]["vNombreMaterialFot"] }}
                    </td>
                    <td id="tdModeloInversorB" class="text-tab-comparativa">
                        {{ $combinacionMediana["inversores"]["vNombreMaterialFot"] }}
                    </td>
                    <td id="tdModeloInversorC" class="text-tab-comparativa">
                        {{ $combinacionOptima["inversores"]["vNombreMaterialFot"] }}
                    </td>
                </tr>
                <tr>
                    <td class="title-tab-comparativa">
                        Cantidad
                    </td>
                    <td id="tdCantidadInversorA" class="text-tab-comparativa">
                        {{ $combinacionEconomica["inversores"]["numeroDeInversores"] }}
                    </td>
                    <td id="tdCantidadInversorB" class="text-tab-comparativa">
                        {{ $combinacionMediana["inversores"]["numeroDeInversores"] }}
                    </td>
                    <td id="tdCantidadInversorC" class="text-tab-comparativa">
                        {{ $combinacionOptima["inversores"]["numeroDeInversores"] }}
                    </td>
                </tr>
                <tr>
                    <td class="title-tab-comparativa">
                        Potencia
                    </td>
                    <td id="tdPotenciaInversorA" class="text-tab-comparativa">
                        {{ $combinacionEconomica["inversores"]["fPotencia"] }} W
                    </td>
                    <td id="tdPotenciaInversorB" class="text-tab-comparativa">
                        {{ $combinacionMediana["inversores"]["fPotencia"] }} W
                    </td>
                    <td id="tdPotenciaInversorC" class="text-tab-comparativa">
                        {{ $combinacionOptima["inversores"]["fPotencia"] }} W
                    </td>
                </tr>
                <tr>
                    <td class="title-tab-comparativa">
                        Origen
                    </td>
                    <td id="tdOrigenInversorA">
                        @php($image = $combinacionEconomica['inversores']['origen'] . '.png')
                        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/banderas/' . $image))) }}">
                    </td>
                    <td id="tdOrigenInversorB">
                        @php($image = $combinacionMediana['inversores']['origen'] . '.png')
                        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/banderas/' . $image))) }}">
                    </td>
                    <td id="tdOrigenInversorC">
                        @php($image = $combinacionOptima['inversores']['origen'] . '.png')
                        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/banderas/' . $image))) }}">
                    </td>
                </tr>
            </table>
            <table id="estructura" class="table-comparative" style="margin-top:20px;">
                <tr>
                    <td colspan="4" style="background-color:#C7CACA; color:#FFFFFF;"><strong>Estructura</strong></td>
                </tr>
                <tr>
                    <td class="title-tab-comparativa">
                        Marca
                    </td>
                    <td id="tdMarcaEstructuraA">
                        @php($image = $combinacionEconomica['estructura']['marca'] . '.png')
                        <img id="imgEstructuraA" class="imgLogos" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/estructura/' . $image))) }}">
                    </td>
                    <td id="tdMarcaEstructuraB">
                        @php($image = $combinacionMediana['estructura']['marca'] . '.png')
                        <img id="imgEstructuraB" class="imgLogos" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/estructura/' . $image))) }}">
                    </td>
                    <td id="tdMarcaEstructuraC">
                        @php($image = $combinacionOptima['estructura']['marca'] . '.png')
                        <img id="imgEstructuraC" class="imgLogos" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/estructura/' . $image))) }}">
                    </td>
                </tr>
                <tr>
                    <td class="title-tab-comparativa">
                        Modelo
                    </td>
                    <td id="tdModeloEstructuraA" class="text-tab-comparativa">
                        {{ $combinacionEconomica["estructura"]["marca"] }}
                    </td>
                    <td id="tdModeloEstructuraB" class="text-tab-comparativa">
                        {{ $combinacionMediana["estructura"]["marca"] }}
                    </td>
                    <td id="tdModeloEstructuraC" class="text-tab-comparativa">
                        {{ $combinacionOptima["estructura"]["marca"] }}
                    </td>
                </tr>
                <tr>
                    <td class="title-tab-comparativa">
                        Cantidad
                    </td>
                    <td id="tdCantidadEstructuraA" class="text-tab-comparativa">
                        {{ $combinacionEconomica["estructura"]["cantidad"] }}
                    </td>
                    <td id="tdCantidadEstructuraB" class="text-tab-comparativa">
                        {{ $combinacionMediana["estructura"]["cantidad"] }}
                    </td>
                    <td id="tdCantidadEstructuraC" class="text-tab-comparativa">
                        {{ $combinacionOptima["estructura"]["cantidad"] }}
                    </td>
                </tr>
                <tr>
                    <td class="title-tab-comparativa">
                        Origen
                    </td>
                    <td id="tdOrigenEstructuraA">
                        @php($image = $combinacionEconomica['estructura']['origen'] . '.png')
                        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/banderas/' . $image))) }}">
                    </td>
                    <td id="tdOrigenEstructuraB">
                        @php($image = $combinacionMediana['estructura']['origen'] . '.png')
                        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/banderas/' . $image))) }}">
                    </td>
                    <td id="tdOrigenEstructuraC">
                        @php($image = $combinacionOptima['estructura']['origen'] . '.png')
                        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/banderas/' . $image))) }}">
                    </td>
                </tr>  
            </table>
            <table id="ahorro" class="table-comparative" style="margin-top:20px;">
                <tr>
                    <td colspan="4" style="background-color:#DEEC4A; color:#FFFFFF;"><strong>Ahorro</strong></td>
                </tr>
                <tr>
                    <td colspan="4" class="text-tab-comparativa">
                        <strong class="title-tab-comparativa">Consumo sin Paneles</strong>
                        {{ number_format($propuesta["promedioConsumosBimestrales"],2) }} kw  |  ${{ number_format($propuesta["power"]["objConsumoEnPesos"]["pagoPromedioBimestral"],2) }} MXN
                        <strong class="title-tab-comparativa">[ Bimestrales ]</strong>
                    </td>
                </tr>
                <tr>
                    <td class="title-tab-comparativa">
                        % de generacion
                    </td>
                    <td id="tdPorcentajePropuestaA" class="text-tab-comparativa">
                        {{ $combinacionEconomica["power"]["porcentajePotencia"] }}%
                    </td>
                    <td id="tdPorcentajePropuestaB" class="text-tab-comparativa">
                        {{ $combinacionMediana["power"]["porcentajePotencia"] }}%
                    </td>
                    <td id="tdPorcentajePropuestaC" class="text-tab-comparativa">
                        {{ $combinacionOptima["power"]["porcentajePotencia"] }}%
                    </td>
                </tr>
                <tr>
                    <td class="title-tab-comparativa">
                        Nuevo consumo energetico
                    </td>
                    <td id="tdNewConsumoEnergeticoA" class="text-tab-comparativa">
                        {{ $combinacionEconomica["power"]["nuevosConsumos"]["promedioNuevoConsumoBimestral"] }} Kw/bim
                    </td>
                    <td id="tdNewConsumoEnergeticoB" class="text-tab-comparativa">
                        {{ $combinacionMediana["power"]["nuevosConsumos"]["promedioNuevoConsumoBimestral"] }} Kw/bim
                    </td>
                    <td id="tdNewConsumoEnergeticoC" class="text-tab-comparativa">
                        {{ $combinacionOptima["power"]["nuevosConsumos"]["promedioNuevoConsumoBimestral"] }} Kw/bim
                    </td>
                </tr>
                <tr>
                    <td class="title-tab-comparativa">
                        Nuevo pago de luz
                    </td>
                    <td id="tdNewConsumoEconomicoA" class="text-tab-comparativa">
                        ${{ number_format($combinacionEconomica["power"]["objGeneracionEnpesos"]["pagoPromedioBimestral"],2) }} MXN / bim
                    </td>
                    <td id="tdNewConsumoEconomicoB" class="text-tab-comparativa">
                        ${{ number_format($combinacionMediana["power"]["objGeneracionEnpesos"]["pagoPromedioBimestral"],2) }} MXN / bim
                    </td>
                    <td id="tdNewConsumoEconomicoC" class="text-tab-comparativa">
                        ${{ number_format($combinacionOptima["power"]["objGeneracionEnpesos"]["pagoPromedioBimestral"],2) }} MXN / bim
                    </td>
                </tr>
            </table>
            <table id="totales" class="table-comparative" style="margin-top:20px;">
                <tr>
                    <td colspan="4" style="background-color:#FFD485; color:#FFFFFF;"><strong>Totales</strong></td>
                </tr>
                @if($propuesta["descuento"]["porcentaje"] > 0)
                    <tr>
                        <td class="title-tab-comparativa" style="background-color:#2593F0; color:white;">
                            Total s/Descuento  
                        </td>
                        <td id="tdCostoSinDescuentoA" class="text-tab-comparativa" style="background-color:#2593F0; color:white;">
                            ${{ number_format($combinacionEconomica["descuento"]["precioSinDescuento"],2) }} USD
                        </td>
                        <td id="tdCostoSinDescuentoB" class="text-tab-comparativa" style="background-color:#2593F0; color:white;">
                            ${{ number_format($combinacionMediana["descuento"]["precioSinDescuento"],2) }} USD
                        </td>
                        <td id="tdCostoSinDescuentoC" class="text-tab-comparativa" style="background-color:#2593F0; color:white;">
                            ${{ number_format($combinacionOptima["descuento"]["precioSinDescuento"],2) }} USD
                        </td>
                    </tr>
                    <tr>
                        <td class="title-tab-comparativa" style="background-color:green; color:white;">
                            Descuento (<strong>{{ $propuesta["descuento"]["porcentaje"] }}%</strong>)
                        </td>
                        <td id="tdDescuentoA" class="text-tab-comparativa" style="background-color:green; color:white;">
                            ${{ number_format($combinacionEconomica["descuento"]["descuento"],2) }} USD
                        </td>
                        <td id="tdDescuentoB" class="text-tab-comparativa" style="background-color:green; color:white;">
                            ${{ number_format($combinacionMediana["descuento"]["descuento"],2) }} USD
                        </td>
                        <td id="tdDescuentoC" class="text-tab-comparativa" style="background-color:green; color:white;">
                            ${{ number_format($combinacionOptima["descuento"]["descuento"],2) }} USD
                        </td>
                    </tr>
                @endif
                <tr>
                    <td class="title-tab-comparativa">
                        Total s/IVA
                    </td>
                    <td id="tdSubtotalA" class="text-tab-comparativa">
                        ${{ number_format($combinacionEconomica["totales"]["precio"],2) }} USD
                    </td>
                    <td id="tdSubtotalB" class="text-tab-comparativa">
                        ${{ number_format($combinacionMediana["totales"]["precio"],2) }} USD
                    </td>
                    <td id="tdSubtotalC" class="text-tab-comparativa">
                        ${{ number_format($combinacionOptima["totales"]["precio"],2) }} USD
                    </td>
                </tr>
                <tr>
                    <td class="title-tab-comparativa">
                        Total c/IVA
                    </td>
                    <td id="tdTotalA" class="text-tab-comparativa">
                        ${{ number_format($combinacionEconomica["totales"]["precioMasIVA"],2) }} USD
                    </td>
                    <td id="tdTotalB" class="text-tab-comparativa">
                        ${{ number_format($combinacionMediana["totales"]["precioMasIVA"],2) }} USD
                    </td>
                    <td id="tdTotalC" class="text-tab-comparativa">
                        ${{ number_format($combinacionOptima["totales"]["precioMasIVA"],2) }} USD
                    </td>
                </tr>
            </table>
            <!-- Fin - Tabla comparativa - [ COMBINACIONES ] -->
            <!-- Nota * Costo por watt -->
            <table id="nota-costo-watt" class="table-comparative" style="margin-top:25px;">
                <tr>
                    <td style="background-color:#9AC5E7;">
                        <p style="font-size:11px; font-weight:bold;">NOTA IMPORTANTE</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p style="font-size:9px;">
                            Entre los costos, lo más importante a revisar es el <strong style="background-color:#ECFF00;">costo por watt</strong> del proyecto, pues va en función del costo del proyecto y la potencia instalada. Puede ser que un proyecto se note económico pero es posible que estén proponiendo menos potencia y por ende la cotización a comparar no tenga equivalente.
                        </p>
                    </td>
                </tr>
            </table>
            <!-- Fin - Nota * Costo por watt -->
        </div>
        <div class="footer-page"></div>
    </div>
    <!-- Fin pagina 2 -->
    <hr class="salto-pagina">
    <!-- Pagina 3 -->
    <div class="container-fluid" style="border-top: 10px solid #5576F2;">
        <table>
            <tr>
                <td>
                    <!-- LogoTipo Etesla -->
                    <img id="logoTipoEtesla" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/etesla-logo.png'))) }}"> 
                </td>
                <td style="padding-left: 75px;">
                    <h1 style="font-size:25px; text-align:right; margin-right: 27px;">FINANCIAMIENTO Y RETORNO DE INVERSIÓN</h1>
                </td>
            </tr>
        </table>
        <!-- Tabla Financiamiento - ROI -->
        <p class="nota" style="margin-top:-20px; text-align:left; margin-left:60px;">
            <strong>NOTA: </strong>
            El calculo del retorno incluye deduccion fiscal
        </p>
        <div style="margin-left:40px; margin-right:40px;">
            <table>
                <tr>
                    <td>
                       <table class="tabFinanciamiento">
                           <tr>
                                <th style="height:16px;">
                                    <p style="font-size:14px; margin-left:6px; margin-right:6px;">Pago de contado</p>
                                </th>
                                <td style="background-color:#03BABE;">
                                    <p style="font-size:14px; margin-left:6px; margin-right:6px;">
                                        ${{ number_format($propuesta["totales"]["precioMXNConIVA"], 2) }}
                                    </p>
                                </td>
                           </tr>
                       </table> 
                    </td>
                    <td>
                       <table class="tabFinanciamiento">
                           <tr>
                                <th style="height:16px;">
                                    <p style="font-size:14px; margin-left:6px; margin-right:6px;">Ahorro mensual de luz</p>
                                </th>
                                <td style="background-color:#03BABE;">
                                    <p style="font-size:14px; margin-left:6px; margin-right:6px;">
                                        ${{ number_format($propuesta["roi"]["ahorro"]["ahorroMensualEnPesosMXN"] ,2) }}
                                    </p>
                                </td> 
                           </tr>
                       </table> 
                    </td>
                    <td>
                       <table class="tabFinanciamiento">
                           <tr>
                                <th style="height:16px;">
                                    <p style="font-size:14px; margin-left:6px; margin-right:6px;">Retorno de inversión</p>
                                </th>
                                <td style="background-color:#FFB500;">
                                    <p style="font-size:18px; margin-left:6px; margin-right:6px; font-weight:bolder;">
                                        {{ $propuesta["roi"]["roiEnAnios"] }} año(s)
                                    </p>
                                </td>
                           </tr>
                       </table> 
                    </td>
                </tr>
            </table>
            <br>
            <table class="tabFinanciamiento">
                <tr>
                    <th>Tarjeta de credito</th>
                    <th style="background-color: #F5B070;">3 meses</th>
                    <th style="background-color: #F5B070;">6 meses</th>
                    <th style="background-color: #F5B070;">9 meses</th>
                    <th style="background-color: #F5B070;">12 meses</th>
                    <th style="background-color: #F5B070;">18 meses</th>
                </tr>
                <tr>
                    <th> Pago mensual</th>
                    <td>${{ number_format($propuesta["financiamiento"]["objMensualidadesCreditCard"]["tresMeses"] ,2) }}</td>
                    <td>${{ number_format($propuesta["financiamiento"]["objMensualidadesCreditCard"]["seisMeses"], 2) }}</td>
                    <td>${{ number_format($propuesta["financiamiento"]["objMensualidadesCreditCard"]["nueveMeses"], 2) }}</td>
                    <td>${{ number_format($propuesta["financiamiento"]["objMensualidadesCreditCard"]["doceMeses"], 2) }}</td>
                    <td>${{ number_format($propuesta["financiamiento"]["objMensualidadesCreditCard"]["dieciochoMeses"], 2) }}</td>
                </tr>
            </table>
            <br>
            <table class="tabFinanciamiento">
                <tr>
                    <th>Financiamiento</th>
                    <th style="background-color: #F5B070;">15%</th>
                    <th style="background-color: #F5B070;">35%</th>
                    <th style="background-color: #F5B070;">50%</th>
                </tr>
                <tr>
                    <th>Enganche</th>
                    <td>${{ number_format($propuesta["financiamiento"]["objEnganche"]["quincePorcent"], 2) }}</td>
                    <td>${{ number_format($propuesta["financiamiento"]["objEnganche"]["treintacincoPorcent"], 2) }}</td>
                    <td>${{ number_format($propuesta["financiamiento"]["objEnganche"]["cincuentaPorcent"], 2) }}</td>
                </tr>
            </table>
            <p class="nota" style="text-align:left; margin-left:20px;">
                <strong>NOTA: </strong>
                Esa tabla de financiamiento es de referencia y puede variar en funcion de las condiciones de la financiera.
            </p>
            <table id="tabFinanciamient" class="tabFinanciamiento">
                <tr>
                    <th>Pagos mensuales</br> por plazo</th>
                    <th style="background-color: #F5B070;">15%</th>
                    <th style="background-color: #F5B070;">35%</th>
                    <th style="background-color: #F5B070;">50%</th>
                </tr>
                @for($x = 12; $x <= 84; $x = $x + 12)
                    <tr>
                        <th>A {{ $x }} meses</th>
                        @for($i=1; $i<=3; $i++)
                            @php($porcent = '')

                            @switch($i)
                                @case(1)
                                    {{ $porcent = 'fifteenPorcent' }}
                                @break
                                @case(2)
                                    {{ $porcent = 'fiftyPorcent' }}
                                @break
                                @case(3)
                                    {{ $porcent = 'thirtyFive' }}
                                @break
                                @default
                                    {{ $i == 3 }}
                                @break;
                            @endswitch
                            
                            @if($propuesta["financiamiento"]["_pagosMensualesPorPlazo"][$x][$porcent] > $propuesta["roi"]["ahorro"]["ahorroMensualEnPesosMXN"] && $propuesta["financiamiento"]["_pagosMensualesPorPlazo"][$x][$porcent] < ($propuesta["roi"]["ahorro"]["ahorroMensualEnPesosMXN"] * 1.10))
                                <td id="amarillo" style="background-color:#E0D30C">
                                    ${{ number_format($propuesta["financiamiento"]["_pagosMensualesPorPlazo"][$x][$porcent], 2) }}
                                </td>
                            @elseif($propuesta["financiamiento"]["_pagosMensualesPorPlazo"][$x][$porcent] <= $propuesta["roi"]["ahorro"]["ahorroMensualEnPesosMXN"])
                                <td id="verde" style="background-color:#44C331">
                                    ${{ number_format($propuesta["financiamiento"]["_pagosMensualesPorPlazo"][$x][$porcent], 2) }}
                                </td>
                            @else
                                <td id="normal" style="background-color:#3A565E">
                                    ${{ number_format($propuesta["financiamiento"]["_pagosMensualesPorPlazo"][$x][$porcent], 2) }}
                                </td>
                            @endif
                        @endfor
                    </tr>
                @endfor
            </table>
            <!-- Fin_Tabla financiamiento -->
        </div>
        <hr class="linea-division" style="background-color:#5576F2; margin-left:-15px; margin-right:-15px;">
        <table id="tableGraficas">
            <tr>
                <td id="grfEnergetico">
                    <img style="width:40%; height:210px; margin-left:55px;" src='{{ $Chart["chartEnergetico"] }}'/>
                </td>
                <td id="grfEconomico">
                    <img style="width:40%; height:210px; margin-left:85px;" src='{{ $Chart["chartEconomico"] }}'/>
                </td>
            </tr>  
        </table>
        <table>
            <tr>
                <td style="width: 450px;">
                    <p style="margin-top: -10px; margin-left: 55px; text-align: left; font-weight: bold;">EL SISTEMA FOTOVOLTAICO PRESENTADO EN ESTA PROPUESTA, EQUIVALE A <strong style="color:#8AADCE;">{{ $propuesta["power"]["objImpactoAmbiental"]["numeroArboles"] }}</strong> ÁRBOLES PLANTADOS AL AÑO.</p>
                </td>
                <td align="center">
                    <img width="30%" height="170px" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/complementos/tree.png'))) }}"/>
                </td>
            </tr>
        </table>
        <div class="footer-page"></div>
    </div>
    <!-- Fin pagina 3 -->
</body>
</html>
