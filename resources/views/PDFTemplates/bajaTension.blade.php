<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<style type="text/css">
    /* --------------- ---------------------- */
    *{
        font-family: "Calibri, sans-serif";
    }
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
        margin-top: -25px;
        margin-left: 25px;
        margin-right: 20px;
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
    /* Tab - Agregados */
    .table-agregados{
        width: 100%;
        text-align: center;
        border: 1px solid black;
        border-collapse: collapse;
        margin-top:25px; 
        margin-left:25px; 
        margin-right:25px;
    }
    .table-agregados td{
        border: 1px solid black;
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
    /* Textos */
    .textIncProupesta{
        margin-left: 15px;
        line-height: 75%;
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
        width: 175px;
        padding: 20px;
        text-align:center;
        border-width:3px;
        border-style:solid;
        border-color:green;
        border-top-left-radius: 30px 30px;
        border-top-right-radius: 30px 30px;
        border-bottom-left-radius: 30px 30px;
        border-bottom-right-radius: 30px 30px;
    }
    .card-header{
        background: green; 
        color: #FFFFFF;
        margin: -20px;
        padding: 10px;
        font-size: 10px;
        height: 2px;
        border-top-left-radius: 30px 30px;
        border-top-right-radius: 30px 30px;
    }
    .card-body{ 
        height:115px;
        background: #FCFAEB;
        margin: -20px;
        padding: 20px;
        font-size: 18px;
        line-height: 20%;
        border-bottom-left-radius: 30px 30px;
        border-bottom-right-radius: 30px 30px;
    }
</style>
<body>
    <!-- Page 1 -->
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
                <p id="nombreCliente" class="textIncProupesta">
                    <strong>Cliente: </strong>
                    {{ $cliente["vNombrePersona"] ." ". $cliente["vPrimerApellido"] ." ". $cliente["vSegundoApellido"] }}
                </p>
                <p id="direccionCliente" class="textIncProupesta">
                    <strong>Direccion: </strong>
                    {{ $cliente["vCalle"] .", ". $cliente["cCodigoPostal"] .", ". $cliente["vMunicipio"] ." ". $cliente["vCiudad"] ." ". $cliente["vEstado"] }}
                </p>
                <p id="asesor" class="textIncProupesta">
                    <strong>Asesor:</strong> 
                    {{ $vendedor["vNombrePersona"] ." ". $vendedor["vPrimerApellido"] ." ". $vendedor["vSegundoApellido"] }}
                </p>
                <p id="sucursal" class="textIncProupesta">
                    <strong>Sucursal: </strong>{{ $vendedor["vOficina"] }}
                </p>
                <p id="caducidad-propuesta" style="margin-left:13px;">
                    <strong>
                        Validez de <u>{{ $expiracion["cantidad"] . " " . $expiracion["unidadMedida"] }}</u>
                    </strong>
                </p>
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
                        <td id="marcaPanel">{{ $paneles["vMarca"] }}</td>
                        <td id="cantidadPanel">{{ $paneles["noModulos"] }}</td>
                        <td id="modeloPanel" style="font-size: 13px;">{{ $paneles["nombre"] }}</td>
                        @if($PdfConfig["subtotalesDesglozados"] === "true")
                            <td id="costoTotalPanel">
                                ${{ number_format($paneles["costoTotal"],2) }} USD
                            </td>
                        @else
                            <td id="costoTotalPanel"></td>
                        @endif
                    </tr>
                    <tr id="desgloceInversor">
                        <td>Inversor</td>
                        <td id="marcaInversor">
                            {{ $inversores["vMarca"] }}
                        </td>
                        @if($inversores["combinacion"] === "true")
                            <td colspan="2">
                                <p style="font-size:10px;">
                                    {{ $inversores["numeroDeInversores"]["MicroUno"]["vNombreMaterialFot"] }}: {{ $inversores["numeroDeInversores"]["MicroUno"]["numeroDeInversores"] }}
                                </p>
                                <p style="font-size:10px;">
                                    {{ $inversores["numeroDeInversores"]["MicroDos"]["vNombreMaterialFot"] }}: {{ $inversores["numeroDeInversores"]["MicroDos"]["numeroDeInversores"] }}
                                </p>
                            </td>
                        @else
                            <td id="cantidadInversor">
                                {{ $inversores["numeroDeInversores"] }}
                            </td>
                            <td id="modeloInversor" style="font-size: 13px;">
                                {{ $inversores["vNombreMaterialFot"] }}
                            </td>
                        @endif
                        @if($PdfConfig["subtotalesDesglozados"] === "true")
                            <td id="costoTotalInversor">
                                ${{ number_format($inversores["costoTotal"],2) }} USD
                            </td>
                        @else
                            <td></td>
                        @endif
                    </tr>
                    <tr id="desgloceEstructura" style="background-color:#F2F1F0;">
                        <td>Estructura</td>
                        <td id="marcaEstructura">{{ $estructura["_estructuras"]["vMarca"] }}</td>
                        <td id="cantidadEstructura">{{ $estructura["cantidad"] }}</td>
                        <td>Estructura de aluminio</td>
                        @if($PdfConfig["subtotalesDesglozados"] === "true")
                            <td id="costoTotalEstructura">
                                ${{ number_format($estructura["costoTotal"],2) }} USD
                            </td>
                        @else
                            <td></td>
                        @endif
                    </tr>
                    @if(!is_null($agregados["_agregados"]))
                        <!-- SI LA COTIZACION TIENE *ESTRUCTURAS* -->
                        <tr id="desgloceAgregados">
                            <td>Agregados</td>
                            <td></td>
                            <td></td>
                            <td>
                                <strong>Agregados (Desgloce en pag. 2)</strong>
                            </td>
                            <td></td>
                        </tr>
                    @endif
                    <tr>
                        <td>Mano de obra</td>
                        <td></td>
                        <td></td>
                        <td style="font-size:10px;">*Instalacion *Servicio *Anclaje *Fijacion</td>
                        @if($PdfConfig["subtotalesDesglozados"] === "true")
                            <td id="costoTotalMO">
                                ${{ number_format($totales["manoDeObra"],2) }} USD
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
                                ${{ number_format($totales["otrosTotal"],2) }} USD
                            </td>
                        @else
                            <td></td>
                        @endif
                    </tr>
                    <tr>
                        <td></td>
                        @if($descuento["porcentaje"] > 0)
                            <td style="background-color:#2593F0;">
                                <p style="text-align:center; color:white; font-weight:bolder; font-size:12px;">
                                    Total s/Descuento
                                </p>
                            </td>
                        @else
                            <td></td>
                        @endif
                        @if($descuento["porcentaje"] > 0)
                            <td id="tdDescuento" style="background-color:green;">
                                <p style="text-align:center; color:white; font-weight:bolder; font-size:12px;">
                                    Descuento ({{ $descuento["porcentaje"] }}%)
                                </p>
                            </td>
                        @else
                            <td></td>
                        @endif
                        <td align="center"><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/banderas/estados-unidos.png'))) }}"/></td>
                        <td align="center"><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/banderas/mexico.png'))) }}"/></td>
                    </tr>
                    <tr style="background-color: #E8E8E8;">
                        <td><strong>Total sin IVA</strong></td>
                        @if($descuento["porcentaje"] > 0)
                            <td id="tdTotalAntesDeDescuento" style="border-right:solid #2593F0; border-left:solid #2593F0; border-bottom:solid #2593F0;">
                                <p style="font-weight:bolder; text-align:center; font-size:15px; background-color:#FFF66D;">
                                    ${{ number_format($descuento["precioSinDescuento"]) }} USD
                                </p>
                            </td>
                        @else
                            <td></td>
                        @endif
                        @if($descuento["porcentaje"] > 0)
                            <td id="descuentoUSD" style="border-right:solid green; border-left:solid green; border-bottom:solid green;">
                                <p style="font-weight:bolder; text-align:center; font-size:15px; background-color:#FFF66D;">
                                    ${{ number_format($descuento["descuento"],2) }} USD
                                </p>
                            </td>
                        @else
                            <td></td>
                        @endif
                        <td id="subtotalSinIVAUSD" align="center">
                            ${{ number_format($totales["precio"], 2) }} USD
                        </td>
                        <td id="subtotalSinIVAMXN" align="center">
                            ${{ number_format($totales["precioMXNSinIVA"], 2) }} MXN
                        </td>
                    </tr>
                    <tr style="background-color: #E8E8E8;">
                        <td><strong>Total con IVA</strong></td>
                        <td></td>
                        <td></td>
                        <td id="totalConIVAUSD" align="center">
                            ${{ number_format($totales["precioMasIVA"], 2) }} USD
                        </td>
                        <td id="totalConIVAMXN" align="center">
                            ${{ number_format($totales["precioMXNConIVA"], 2) }} MXN
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Leyenda - Tipo de cambio -->
        <div id="leyendaTipoDeCambio" style="margin-left:20px; margin-right:20px;">
            <p class="nota"><strong style="color: #2E2D2D;">NOTA: </strong>El tipo de cambio <strong style="color: #2E2D2D;">(${{ $tipoDeCambio }} mxn)</strong> se tomará el reportado por Banorte a la Venta del día en que se realice cada pago. Se requiere de un 50% de anticipo a la aprobación del proyecto, 35% antes de realizar el embarque de equipos, y 15% posterior a la instalación. El proyecto se entrega preparado para conexión con CFE.</p>
        </div>
        <!-- Logotipos && garantias de las marcas de los equipos -->
        <table class="table-contenedor" style="margin-top:20px;">
            <tr>
                <td id="imgLogoPanel" align="center" style="border: none;">
                    @php($image = $paneles['vMarca'] . '.png')
                    <img style="width: 140px; height: 67px;" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/panel/' . $image))) }}">
                </td>
                <td id="imgLogoInversor" align="center" style="border: none;">
                    @php($image = $inversores['vMarca'] . '.jpg')
                    <img style="width: 140px; height: 67px;" src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/inversor/' . $image))) }}">
                </td>
                <td id="imgLogoInversor" align="center" style="border: none;">
                    @php($image = $estructura["_estructuras"]['vMarca'] . '.png')
                    <img style="width: 140px; height: 67px;" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/estructura/' . $image))) }}">
                </td>
            </tr>
        </table>
        <!-- Fin logos/marcas equip. -->

        <hr class="linea-division" style="background-color:green;">

        <table class="table-contenedor" style="margin-top:115px;">
            <tr>
                <td style="padding-right:60px;">
                    <div name="ANCE" style="margin-top:-80px;">
                        <div style="margin-left:20px;">
                            <img height="68px" width="60px" src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/ance.jpg'))) }}">
                        </div>
                        <div style="margin-top:-50px; margin-left:100px;">
                            <p class="text-inferior-pag1">
                                Certificado de proveedor confiable
                            </p>
                            <p class="text-inferior-pag1-secundary" style="margin-top:-9px; width: 30%;">
                                Clave: 20FIR00010A00R00
                            </p>
                        </div>
                    </div>
                    <div name="WWF" style="margin-top:-130px;">
                        <div style="margin-left:20px;">
                            <img height="68px" width="60px" src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/wwf.jpg'))) }}">
                        </div>
                        <div style="margin-top:-60px; margin-left:92px;">
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
                    <div style="margin-top:-80px;">
                        <!-- CARD - "ANTES" -->
                        <div style="margin-left:-230px; margin-top:-15px;">
                            <div class="card" style="margin-right:-65px; margin-left:10px;">
                                <!-- CONSUMO ACTUAL -->
                                <div class="card-header">
                                    <p style="color:#FFFFFF; margin-top:-6px; font-weight:bolder;">
                                        Total a pagar del periodo facturado
                                    </p>
                                </div>
                                <div class="card-body">
                                    <p style="font-weight:bolder; margin-top:10px; font-size:29px;">
                                        ${{ number_format($power["objConsumoEnPesos"]["pagoPromedioBimestral"],2) }}
                                    </p>
                                    <hr class="linea-division" style="background-color:green; margin-top:-17px; margin-left:-20px; margin-right:-22px; height:15px;">
                                    <img height="19px" width="19px" style="margin-top:2px; margin-left:-152px;" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/icon/flecha.png'))) }}"/>
                                    <p style="font-size:14px; margin-top:-10px;">
                                        Pago actual s/paneles
                                    </p>
                                    <img height="19px" width="19px" style="margin-left:155px; margin-top:-29px;" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/icon/flecha.png'))) }}"/>
                                    <hr class="linea-division" style="background-color:green; margin-top:-5px; margin-left:-22px; margin-right:-22px; height:15px;">
                                    <p style="font-weight:bolder; margin-top:25px; font-size:19px;">
                                        {{ number_format($power["_consumos"]["_promCons"]["promConsumosBimestrales"]) }} Kw
                                    </p>
                                    <p style="font-size:9px; background-color:#F7FB0C; width:15%; font-weight:bolder; margin-top:-12px; margin-left:72px; ">({{ $power["old_dac_o_nodac"] }})</p>
                                </div>
                            </div>
                        </div>
                        <!-- CARD - "NUEVO_CONSUMO" -->
                        <div style="margin-top:-300px; margin-right:-26px;">
                            <div class="card" style="margin-right:-65px; margin-left:10px;">
                                <!-- CONSUMO ACTUAL -->
                                <div class="card-header">
                                    <p style="color:#FFFFFF; margin-top:-6px; font-weight:bolder;">
                                        Total a pagar del periodo facturado
                                    </p>
                                </div>
                                <div class="card-body">
                                    <p style="font-weight:bolder; margin-top:10px; font-size:29px;">
                                        ${{ number_format($power["objGeneracionEnpesos"]["pagoPromedioBimestral"] ,2) }}
                                    </p>
                                    <hr class="linea-division" style="background-color:green; margin-top:-17px; margin-left:-20px; margin-right:-22px; height:15px;">
                                    <img height="19px" width="19px" style="margin-top:2px; margin-left:-152px;" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/icon/flecha.png'))) }}"/>
                                    <p style="font-size:14px; margin-top:-10px;">
                                        Nuevo pago c/paneles
                                    </p>
                                    <img height="19px" width="19px" style="margin-left:155px; margin-top:-29px;" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/icon/flecha.png'))) }}"/>
                                    <hr class="linea-division" style="background-color:green; margin-top:-5px; margin-left:-22px; margin-right:-22px; height:15px;">
                                    <p style="font-weight:bolder; text-align:center; margin-top:25px; font-size:19px;">
                                        {{ number_format($power["nuevosConsumos"]["promedioNuevoConsumoBimestral"],2) }} Kw
                                    </p>
                                    <p style="font-size:9px; background-color:#F7FB0C; width:15%; font-weight:bolder; margin-top:-12px; margin-left:72px; ">({{ $power["new_dac_o_nodac"] }})</p>
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

    <!-- Pagina 2 -->
    <div class="container-fluid" style="border-top: 10px solid #5576F2;">
        <table>
            <tr>
                <td>
                    <!-- LogoTipo Etesla -->
                    <img id="logoTipoEtesla" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/etesla-logo.png'))) }}"> 
                </td>
                <td style="padding-left: 75px;">
                    <h1 style="font-size:25px; text-align:right; margin-right: 27px;">
                        FINANCIAMIENTO Y RETORNO DE INVERSIÓN
                    </h1>
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
                                    <p style="font-size:14px; margin-left:6px; margin-right:6px;">
                                        Pago de contado
                                    </p>
                                </th>
                                <td style="background-color:#03BABE;">
                                    <p style="font-size:14px; margin-left:6px; margin-right:6px;">
                                        ${{ number_format($totales["precioMXNConIVA"], 2) }}
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
                                        ${{ number_format($roi["ahorro"]["ahorroMensualEnPesosMXN"] ,2) }}
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
                                    <p style="font-size:16px; margin-left:6px; margin-right:6px; font-weight:bolder;">
                                        {{ $roi["roiEnAnios"] }} año(s)
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
                    <td>
                        ${{ number_format($financiamiento["objMensualidadesCreditCard"]["tresMeses"] ,2) }}
                    </td>
                    <td>
                        ${{ number_format($financiamiento["objMensualidadesCreditCard"]["seisMeses"], 2) }}
                    </td>
                    <td>
                        ${{ number_format($financiamiento["objMensualidadesCreditCard"]["nueveMeses"], 2) }}
                    </td>
                    <td>
                        ${{ number_format($financiamiento["objMensualidadesCreditCard"]["doceMeses"], 2) }}
                    </td>
                    <td>
                        ${{ number_format($financiamiento["objMensualidadesCreditCard"]["dieciochoMeses"], 2) }}
                    </td>
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
                    <td>
                        ${{ number_format($financiamiento["objEnganche"]["quincePorcent"], 2) }}
                    </td>
                    <td>
                        ${{ number_format($financiamiento["objEnganche"]["treintacincoPorcent"], 2) }}
                    </td>
                    <td>
                        ${{ number_format($financiamiento["objEnganche"]["cincuentaPorcent"], 2) }}
                    </td>
                </tr>
            </table>
            <p class="nota" style="text-align:left; margin-left:20px;">
                <strong>NOTA: </strong>
                Esa tabla de financiamiento es de referencia y puede variar en funcion de las condiciones de la financiera.
            </p>
            <table id="tabFinanciamient" class="tabFinanciamiento">
                <tr>
                    <th>Pagos mensuales por plazo</th>
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
                            
                            @if($financiamiento["_pagosMensualesPorPlazo"][$x][$porcent] > $roi["ahorro"]["ahorroMensualEnPesosMXN"] && $financiamiento["_pagosMensualesPorPlazo"][$x][$porcent] < ($roi["ahorro"]["ahorroMensualEnPesosMXN"] * 1.10))
                                <td id="amarillo" style="background-color:#E0D30C">
                                    ${{ number_format($financiamiento["_pagosMensualesPorPlazo"][$x][$porcent], 2) }}
                                </td>
                            @elseif($financiamiento["_pagosMensualesPorPlazo"][$x][$porcent] <= $roi["ahorro"]["ahorroMensualEnPesosMXN"])
                                <td id="verde" style="background-color:#44C331">
                                    ${{ number_format($financiamiento["_pagosMensualesPorPlazo"][$x][$porcent], 2) }}
                                </td>
                            @else
                                <td id="normal" style="background-color:#3A565E">
                                    ${{ number_format($financiamiento["_pagosMensualesPorPlazo"][$x][$porcent], 2) }}
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
                    <img style="width:40%; height:210px; margin-left:85px;" src='{{ $Chart["chartEnergetico"] }}'/>
                </td>
                <td id="grfEconomico">
                    <img style="width:40%; height:210px; margin-left:85px;" src='{{ $Chart["chartEconomico"] }}'/>
                </td>
            </tr>  
        </table>
        <table id="tableArboles">
            <tr>
                <td style="width: 450px;">
                    <p style="margin-top: -10px; margin-left: 55px; text-align: left; font-weight: bold;">
                        EL SISTEMA FOTOVOLTAICO PRESENTADO EN ESTA PROPUESTA, EQUIVALE A <strong style="color:#8AADCE;">{{ $power["objImpactoAmbiental"]["numeroArboles"] }}</strong> ÁRBOLES PLANTADOS AL AÑO.
                    </p>
                </td>
                <td align="center">
                    <img width="30%" height="170px" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/complementos/tree.png'))) }}"/>
                </td>
            </tr>
        </table>
        <div class="footer-page"></div>
    </div>
    <!-- Fin pagina 2 -->
    <!-- Pagina 3 - Agregados -->
    @if(!is_null($agregados["_agregados"]))
        <hr class="salto-pagina">

        <!-- HeaderPage -->
        <table>
            <tr>
                <td>
                    <!-- LogoTipo Etesla -->
                    <img id="logoTipoEtesla" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/etesla-logo.png'))) }}"> 
                </td>
                <td>
                    <h1 style="font-size:35px; margin-left: 425px;">Agregados</h1>
                </td>
            </tr>
        </table>

        <!-- Tabla de agregados -->
        <table class="table-agregados">
            <thead>
                <tr>
                    <th>Agregado</th>
                    <th>Cantidad</th>
                    <th>Precio unit.</th>
                </tr>
            </thead>
            <tbody>
                @foreach($agregados["_agregados"] as $agregado)
                    <tr>
                        <td>{{ $agregado["nombreAgregado"] }}</td>
                        <td>{{ $agregado["cantidadAgregado"] }}</td>
                        <td>$ {{ $agregado["precioUnitarioMXN"] }} MXN</td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td><strong>Costo total</strong></td>
                    <td>$ {{ $agregados["costoTotal"] * $tipoDeCambio }} MXN</td>
                </tr>
            </tbody>
        </table>
    @endif
    <!-- Fin pagina 3 -->
</body>
</html>
