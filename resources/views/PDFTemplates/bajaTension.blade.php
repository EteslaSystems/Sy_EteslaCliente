<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
</head>
<style type="text/css">
    /* --------------- ---------------------- */
    *{
        font-family: 'Roboto', sans-serif;
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
    <!-- Page 1 -->
    <div class="container-fluid" style="border-top: 10px solid #5576F2;">
        <table>
            <tr>
                <td>
                    <!-- LogoTipo Etesla -->
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
                <p id="nombreCliente" class="textIncProupesta"><strong>Cliente: </strong>{{ $cliente["vNombrePersona"] ." ". $cliente["vPrimerApellido"] ." ". $cliente["vSegundoApellido"] }}</p>
                <p id="direccionCliente" class="textIncProupesta"><strong>Direccion: </strong>{{ $cliente["vCalle"] ." ". $cliente["vMunicipio"] ." ". $cliente["vCiudad"] ." ". $cliente["vEstado"] }}</p>
                <p id="asesor" class="textIncProupesta"><strong>Asesor:</strong> {{ $vendedor["vNombrePersona"] ." ". $vendedor["vPrimerApellido"] ." ". $vendedor["vSegundoApellido"] }}</p>
                <p id="sucursal" class="textIncProupesta"><strong>Sucursal: </strong>{{ $vendedor["vOficina"] }}</p>
                <p id="caducidad-propuesta" style="margin-left:13px;"><strong>Validez de <u>{{ $expiracion["cantidad"] . " " . $expiracion["unidadMedida"] }}</u></strong></p>
            </div>
        </div>
        <div class="container-table">
            <table class="table-costos-proyecto">
                <thead>
                    <tr>
                        <th scope="col">TIPO</th>
                        <th scope="col">MARCA</th>
                        <th scope="col" style="width:10%;">CANTIDAD</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="desglocePanel" style="background-color:#F2F1F0;">
                        <td>Panel</td>
                        <td id="marcaPanel">{{ $paneles["marca"] }}</td>
                        <td id="cantidadPanel" style="width:10%;">{{ $paneles["noModulos"] }}</td>
                        <td id="modeloPanel" style="font-size: 13px;">{{ $paneles["nombre"] }}</td>
                        @if($PdfConfig["subtotalesDesglozados"] === "true")
                            <td id="costoTotalPanel">${{ number_format($paneles["costoTotal"],2) }} USD</td>
                        @else
                            <td></td>
                        @endif
                    </tr>
                    <tr id="desgloceInversor">
                        <td>Inversor</td>
                        <td id="marcaInversor">{{ $inversores["vMarca"] }}</td>
                        <td id="cantidadInversor" style="width:10%;">{{ $inversores["numeroDeInversores"] }}</td>
                        <td id="modeloInversor" style="font-size: 13px;">{{ $inversores["vNombreMaterialFot"] }}</td>
                        @if($PdfConfig["subtotalesDesglozados"] === "true")
                            <td id="costoTotalInversor">${{ number_format($inversores["precioTotal"],2) }} USD</td>
                        @else
                            <td></td>
                        @endif
                    </tr>
                    <tr id="desgloceEstructura" style="background-color:#F2F1F0;">
                        <td>Estructura</td>
                        <td id="marcaEstructura">{{ $estructura["_estructuras"]["vMarca"] }}</td>
                        <td id="cantidadEstructura" style="width:10%;">{{ $estructura["cantidad"] }}</td>
                        <td>Estructura de aluminio</td>
                        @if($PdfConfig["subtotalesDesglozados"] === "true")
                            <td id="costoTotalEstructura">${{ number_format($estructura["costoTotal"],2) }} USD</td>
                        @else
                            <td></td>
                        @endif
                    </tr>
                    <tr>
                        <td>Mano de obra</td>
                        <td></td>
                        <td style="width:10%;"></td>
                        <td></td>
                        @if($PdfConfig["subtotalesDesglozados"] === "true")
                            <td id="costoTotalMO">${{ number_format($totales["manoDeObra"],2) }} USD</td>
                        @else
                            <td></td>
                        @endif
                    </tr>
                    <tr style="background-color:#F2F1F0;">
                        <td>Material electrico</td>
                        <td></td>
                        <td style="width:10%;"></td>
                        <td></td>
                        @if($PdfConfig["subtotalesDesglozados"] === "true")
                            <td id="costoTotalOtros">${{ number_format($totales["otrosTotal"],2) }} USD</td>
                        @else
                            <td></td>
                        @endif
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td style="width:10%;"></td>
                        <td align="center"><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/complementos/eu.png'))) }}"/></td>
                        <td align="center"><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/complementos/mx.png'))) }}"/></td>
                    </tr>
                    <tr style="background-color: #E8E8E8;">
                        <td><strong>Subtotal sin IVA</strong></td>
                        <td></td>
                        <td style="width:10%;"></td>
                        <td id="subtotalSinIVAUSD" align="center">${{ number_format($totales["precio"], 2) }} USD</td>
                        <td id="subtotalSinIVAMXN" align="center">${{ number_format($totales["precioMXNSinIVA"], 2) }} MXN</td>
                    </tr>
                    <tr style="background-color: #E8E8E8;">
                        <td><strong>Total con IVA</strong></td>
                        <td></td>
                        <td style="width:10%;"></td>
                        <td id="totalConIVAUSD" align="center">${{ number_format($totales["precioMasIVA"], 2) }} USD</td>
                        <td id="totalConIVAMXN" align="center">${{ number_format($totales["precioMXNConIVA"], 2) }} MXN</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Leyenda - Tipo de cambio -->
        <div id="leyendaTipoDeCambio" style="margin-left:20px; margin-right:20px;">
            <p style="font-size:11px; color: #969696;" align="center"><strong style="color: #2E2D2D;">NOTA: </strong>El tipo de cambio <strong style="color: #2E2D2D;">(${{ $tipoDeCambio }} mxn)</strong> se tomará el reportado por Banorte a la Venta del día en que se realice cada pago. Se requiere de un 50% de anticipo a la aprobación del proyecto, 35% antes de realizar el embarque de equipos, y 15% posterior a la instalación. El proyecto se entrega preparado para conexión con CFE.</p>
        </div>
        <!-- Logotipos && garantias de las marcas de los equipos -->
        <table class="table-contenedor">
            <tr>
                <td id="imgLogoPanel" align="center" style="border: none;">
                    @php($image = $paneles['marca'] . '.png')
                    <img style="width: 140px; height: 67px;" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos-logos/panel/' . $image))) }}">
                </td>
                <td id="imgLogoInversor" align="center" style="border: none;">
                    @php($image = $inversores['vMarca'] . '.jpg')
                    <img style="width: 140px; height: 67px;" src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos-logos/inversor/' . $image))) }}">
                </td>
                <td id="imgLogoInversor" align="center" style="border: none;">
                    @php($image = $estructura["_estructuras"]['vMarca'] . '.png')
                    <img style="width: 140px; height: 67px;" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos-logos/estructura/' . $image))) }}">
                </td>
            </tr>
        </table>
        <!-- Fin logos/marcas equip. -->

        <hr class="linea-division" style="background-color:#5576F2;">

        <table class="table-contenedor">
            <tr>
                <td style="padding-right: 60px;">
                    <div>
                        <div style="margin-left:20px;">
                            <img height="48px" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/complementos/panel-proyecto.png'))) }}">
                        </div>
                        <div style="margin-top:-50px; margin-left:98px;">
                            <p class="text-inferior-pag1">INCLUYE:</p>
                            <p class="text-inferior-pag1-secundary" style="margin-top:-9px; width: 30%;">*Instalación. *Servicio. *Anclaje. *Fijación. *Garantia. *Mano de obra.</p>
                        </div>
                    </div>
                    <div>
                        <div style="margin-left:20px;">
                            <img height="48px" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/complementos/power.png'))) }}">
                        </div>
                        <div style="margin-top: -50px; margin-left:98px;">
                            <p class="text-inferior-pag1">POTENCIA POR INSTALAR:</p>
                            <p class="text-inferior-pag1-secundary" style="margin-top:-9px;">{{ $paneles["potenciaReal"] }} KwP</p>
                        </div>
                    </div>
                    <div>
                        <div style="margin-left:20px;">
                            <img height="45px" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/complementos/saving.png'))) }}"/>
                        </div>
                        <div style="margin-top: -50px; margin-left:98px;">
                            <p class="text-inferior-pag1">PORCENTAJE DE AHORRO<br>ENERGETICO:</p>
                            <p class="text-inferior-pag1-secundary" style="margin-top:-11px;">{{ $power["porcentajePotencia"] }}%</p>
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
                                        <p style="font-size: 9px; margin-left:10px; margin-top:15px;"><strong>CONSUMO ({{ $power["old_dac_o_nodac"] }})</strong></p>
                                        <p style="color: #C31801; font-weight: bolder; margin-left:10px;">{{ $power["_consumos"]["_promCons"]["promConsumosBimestrales"] }} kW</p>
                                        <strong style="font-size: 9px; margin-left:10px;">TOTAL A PAGAR</strong>
                                        <p style="color: #C31801; font-weight: bolder; margin-left:10px;">${{ number_format($power["objConsumoEnPesos"]["pagoPromedioBimestralConIva"], 2) }} MXN</p>
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
                                        <p style="font-size: 9px; margin-left:10px; margin-top:15px;"><strong>CONSUMO ({{ $power["new_dac_o_nodac"] }})</strong></p>
                                        <p style="color: #1E9F26; font-weight: bolder; margin-left:10px;">{{ $power["nuevosConsumos"]["promedioNuevoConsumoBimestral"] }} kW</p>
                                        <strong style="font-size: 9px; margin-left:10px;">TOTAL A PAGAR</strong>
                                        <p style="color: #1E9F26; font-weight: bolder; margin-left:10px;">${{ number_format($power["objGeneracionEnpesos"]["pagoPromedioBimestralConIva"] ,2) }} MXN</p>
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

    <!-- Pagina 2 -->
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
        <div style="margin-left:40px; margin-right:40px; margin-top:20px;">
            <table class="tabFinanciamiento">
                <tr>
                    <th>Pago de contado</th>
                    <td>${{ number_format($totales["precioMXNConIVA"], 2) }}</td>
                    <th style="background-color: #03BABE;">Ahorro mensual<br>de luz</th>
                    <td style="background-color: #03BABE;">${{ number_format($roi["ahorro"]["ahorroMensualEnPesosMXN"] ,2) }}</td>
                    <th>Retorno de inversión</th>
                    <td>{{ $roi["roiEnAnios"] }} año(s)</td>
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
                    <td>${{ number_format($financiamiento["objMensualidadesCreditCard"]["tresMeses"] ,2) }}</td>
                    <td>${{ number_format($financiamiento["objMensualidadesCreditCard"]["seisMeses"], 2) }}</td>
                    <td>${{ number_format($financiamiento["objMensualidadesCreditCard"]["nueveMeses"], 2) }}</td>
                    <td>${{ number_format($financiamiento["objMensualidadesCreditCard"]["doceMeses"], 2) }}</td>
                    <td>${{ number_format($financiamiento["objMensualidadesCreditCard"]["dieciochoMeses"], 2) }}</td>
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
                    <td>${{ number_format($financiamiento["objEnganche"]["quincePorcent"], 2) }}</td>
                    <td>${{ number_format($financiamiento["objEnganche"]["treintacincoPorcent"], 2) }}</td>
                    <td>${{ number_format($financiamiento["objEnganche"]["cincuentaPorcent"], 2) }}</td>
                </tr>
            </table>
            <br>
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
                            
                            @if($financiamiento["_pagosMensualesPorPlazo"][$x][$porcent] > $roi["ahorro"]["ahorroMensualEnPesosMXN"] && $financiamiento["_pagosMensualesPorPlazo"][$x][$porcent] < ($roi["ahorro"]["ahorroMensualEnPesosMXN"] * 1.10))
                                <td id="amarillo" style="background-color:#E0D30C">${{ number_format($financiamiento["_pagosMensualesPorPlazo"][$x][$porcent], 2) }}</td>
                            @elseif($financiamiento["_pagosMensualesPorPlazo"][$x][$porcent] <= $roi["ahorro"]["ahorroMensualEnPesosMXN"])
                                <td id="verde" style="background-color:#44C331">${{ number_format($financiamiento["_pagosMensualesPorPlazo"][$x][$porcent], 2) }}</td>
                            @else
                                <td id="normal" style="background-color:#3A565E">${{ number_format($financiamiento["_pagosMensualesPorPlazo"][$x][$porcent], 2) }}</td>
                            @endif
                        @endfor
                    </tr>
                @endfor
            </table>
            <!-- Fin_Tabla financiamiento -->
            <!-- Graficas -->
            <!-- Grafico ROI -->
            <div class="container-fluid">
                <!-- Eje X - Grafico Proyeccion -->
                @php($anioActual = now()->year)
                @php($aniosProyeccion = [])
                @php($aniosProyeccion[0] = $anioActual)

                @for($i=1; $i<=10; $i++)
                    @php($aniosProyeccion[$i] = (int)$anioActual + $i)
                @endfor

                <table class="table-contenedor" style="margin-top: -20px;">
                    <tr>
                        <td id="graficaPuntos" align="center" style="border: none;">
                            <h3>Con paneles / Sin paneles</h3>
                            <!-- Aqui va la grafica 1 - [ Puntos ] -->
                        </td>
                        <td id="graficaBarras" align="center" style="border: none;">
                            <h3>Consumo actual <strong>Vs.</strong> Nuevo consumo c/paneles solares</h3>
                            <!-- Aqui va la grafica 2 - [ Barras ] -->
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <hr class="linea-division" style="background-color:#5576F2; margin-left:-15px; margin-right:-15px;">
        <table>
            <tr>
                <td style="width: 450px;">
                    <p style="margin-top: -10px; margin-left: 55px; text-align: left; font-weight: bold;">EL SISTEMA FOTOVOLTAICO PRESENTADO EN ESTA PROPUESTA, EQUIVALE A <strong style="color:#8AADCE;">{{ $power["objImpactoAmbiental"]["numeroArboles"] }}</strong> ÁRBOLES PLANTADOS AL AÑO.</p>
                </td>
                <td align="center">
                    <img width="30%" height="170px" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/complementos/tree.png'))) }}"/>
                </td>
            </tr>
        </table>
        <div class="footer-page"></div>
    </div>
    <!-- Fin pagina 2 -->
    <!-- Fin pagina 2 -->
</body>
</html>