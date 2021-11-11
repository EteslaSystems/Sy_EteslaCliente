<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<style type="text/css">
    /* --------------- ---------------------- */
    *{
        font-family: 'Roboto', sans-serif;
    }
    html{
        margin: 0;
    }
    .marca-de-agua{
        background-image: url('data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/etesla-logo.png')))); ?>');
        background-position: center center;
        background-size: 100%;
        background-repeat: no-repeat;
        position: absolute;
        width: 100%;
        height: 100%;
        margin: 0;
        z-index: 10;
        opacity: 0.5;
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
    /* Tab - Comparativa_Combinaciones */
    .tabCombinaciones{
        width: 100%;
        border-collapse: collapse;
        text-align: center;
    }
    .tabCombinaciones th, .tabCombinaciones td{
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
    .imgLogos{
        height: 40px;
        width: 55px;
        margin-top: 6px;
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
    <!-- Pagina 1 -->
    <div class="container-fluid" style="border-top: 10px solid #5576F2;">
        <table>
            <tr>
                <td>
                    <img id="logoTipoEtesla" src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/etesla-logo.png')))); ?>"> 
                </td>
                <td>
                    <h1 style="font-size:25px; text-align:right; margin-right: 27px;">SISTEMA FOTOVOLTAICO INTERCONECTADO A LA RED DE CFE</h1>
                </td>
            </tr>
        </table>
        <img id="recuadroPaneles" src="data:image/jpg;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/Paneles-solares-tesla.jpg')))); ?>"/>
        <div id="recuadroFlotante">
            <div>
                <p id="fechaCreacion" class="textIncProupesta"><strong>Fecha de creacion: <?php echo e(date('Y-m-d')); ?></strong></p>
                <p id="nombreCliente" class="textIncProupesta"><strong>Cliente: </strong>Eduardo Herrera Aldaraca</p>
                <p id="direccionCliente" class="textIncProupesta"><strong>Direccion: </strong>Calle siempre viva, Springfield</p>
                <p id="asesor" class="textIncProupesta"><strong>Asesor:</strong> Jose Antonio Hernandez Gutierrez</p>
                <p id="sucursal" class="textIncProupesta"><strong>Sucursal: </strong>Veracruz, Veracruz</p>
                <p id="caducidad-propuesta" style="margin-left:13px;"><strong>Validez de <u>30 dias</u></strong></p>
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
                        <td id="marcaPanel">Canadian</td>
                        <td id="cantidadPanel" style="width:10%;">5</td>
                        <td id="modeloPanel" style="font-size: 13px;">Canadian 420 w</td>
                        <td id="costoTotalPanel">$3,000 USD</td>
                    </tr>
                    <tr id="desgloceInversor">
                        <td>Inversor</td>
                        <td id="marcaInversor">ABB Fimer</td>
                        <td id="cantidadInversor" style="width:10%;">4</td>
                        <td id="modeloInversor" style="font-size: 13px;">ABB Fimer 220 w</td>
                        <td id="costoTotalInversor">$1,000 USD</td>
                    </tr>
                    <tr id="desgloceEstructura" style="background-color:#F2F1F0;">
                        <td>Estructura</td>
                        <td id="marcaEstructura">Everest</td>
                        <td id="cantidadEstructura" style="width:10%;">3</td>
                        <td>Estructura de aluminio</td>
                        <td id="costoTotalEstructura">$1,000 USD</td>
                    </tr>
                    <tr>
                        <td>Mano de obra</td>
                        <td></td>
                        <td style="width:10%;"></td>
                        <td></td>
                        <td id="costoTotalMO">$10 USD</td>
                    </tr>
                    <tr style="background-color:#F2F1F0;">
                        <td>Material electrico</td>
                        <td></td>
                        <td style="width:10%;"></td>
                        <td></td>
                        <td id="costoTotalOtros">$2,000 USD</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td style="width:10%;"></td>
                        <td align="center">
                            <img src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/pdf/banderas/estados-unidos.png')))); ?>"/>
                        </td>
                        <td align="center">
                            <img src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/pdf/banderas/mexico.png')))); ?>"/>
                        </td>
                    </tr>
                    <tr style="background-color: #E8E8E8;">
                        <td><strong>Subtotal sin IVA</strong></td>
                        <td></td>
                        <td style="width:10%;"></td>
                        <td id="subtotalSinIVAUSD" align="center">$10,000 USD</td>
                        <td id="subtotalSinIVAMXN" align="center">$20,000 MXN</td>
                    </tr>
                    <tr style="background-color: #E8E8E8;">
                        <td><strong>Total con IVA</strong></td>
                        <td></td>
                        <td style="width:10%;"></td>
                        <td id="totalConIVAUSD" align="center">$15,000 USD</td>
                        <td id="totalConIVAMXN" align="center">$30,000 MXN</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Leyenda - Tipo de cambio -->
        <div id="leyendaTipoDeCambio" style="margin-left:20px; margin-right:20px;">
            <p style="font-size:11px; color: #969696;" align="center"><strong style="color: #2E2D2D;">NOTA: </strong>El tipo de cambio <strong style="color: #2E2D2D;">($20.00 mxn)</strong> se tomará el reportado por Banorte a la Venta del día en que se realice cada pago. Se requiere de un 50% de anticipo a la aprobación del proyecto, 35% antes de realizar el embarque de equipos, y 15% posterior a la instalación. El proyecto se entrega preparado para conexión con CFE.</p>
        </div>
        <!-- Logotipos && garantias de las marcas de los equipos -->
        <table class="table-contenedor">
            <tr>
                <td id="imgLogoPanel" align="center" style="border: none;">
                    <img style="width:140px; height:97px;" src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/equipos/logos/panel/Canadian.png')))); ?>">
                </td>
                <td id="imgLogoInversor" align="center" style="border: none;">
                    <img style="width:140px; height:97px;" src="data:image/jpg;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/equipos/logos/inversor/APSystem.jpg')))); ?>">
                </td>
                <td id="imgLogoInversor" align="center" style="border: none;">
                    <img style="width:140px; height:97px;" src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/equipos/logos/estructura/Everest.png')))); ?>">
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
                            <img height="48px" src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/pdf/complementos/panel-proyecto.png')))); ?>">
                        </div>
                        <div style="margin-top:-50px; margin-left:98px;">
                            <p class="text-inferior-pag1">INCLUYE:</p>
                            <p class="text-inferior-pag1-secundary" style="margin-top:-9px; width: 30%;">*Instalación. *Servicio. *Anclaje. *Fijación. *Garantia. *Mano de obra.</p>
                        </div>
                    </div>
                    <div>
                        <div style="margin-left:20px;">
                            <img height="48px" src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/pdf/complementos/power.png')))); ?>">
                        </div>
                        <div style="margin-top: -50px; margin-left:98px;">
                            <p class="text-inferior-pag1">POTENCIA POR INSTALAR:</p>
                            <p class="text-inferior-pag1-secundary" style="margin-top:-9px;">2.6 KwP</p>
                        </div>
                    </div>
                    <div>
                        <div style="margin-left:20px;">
                            <img height="45px" src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/pdf/complementos/saving.png')))); ?>"/>
                        </div>
                        <div style="margin-top: -50px; margin-left:98px;">
                            <p class="text-inferior-pag1">PORCENTAJE DE AHORRO<br>ENERGETICO:</p>
                            <p class="text-inferior-pag1-secundary" style="margin-top:-11px;">50%</p>
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
                                        <p style="font-size: 9px; margin-left:10px; margin-top:15px;"><strong>CONSUMO (DAC)</strong></p>
                                        <p style="color: #C31801; font-weight: bolder; margin-left:10px;">1,500 kW</p>
                                        <strong style="font-size: 9px; margin-left:10px;">TOTAL A PAGAR</strong>
                                        <p style="color: #C31801; font-weight: bolder; margin-left:10px;">$10,000 MXN</p>
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
                                        <p style="font-size: 9px; margin-left:10px; margin-top:15px;"><strong>CONSUMO (1c)</strong></p>
                                        <p style="color: #1E9F26; font-weight: bolder; margin-left:10px;">5,000 kW</p>
                                        <strong style="font-size: 9px; margin-left:10px;">TOTAL A PAGAR</strong>
                                        <p style="color: #1E9F26; font-weight: bolder; margin-left:10px;">$30,000 MXN</p>
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
    <div class="container-fluid marca-de-agua">
        <table>
            <tr>
                <td>
                    <img id="logoTipoEtesla" src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/etesla-logo.png')))); ?>"> 
                </td>
                <td>
                    <h1 style="font-size:25px;">
                        COMPARATIVA DE PROPUESTAS
                    </h1>
                </td>
            </tr>
        </table>
        <div id="comparativas-combinaciones" class="div-contenedor">
            <table class="table-comparative">
                <thead style="background-color:#D68910; color:#FFFFFF;">
                    <tr>
                        <th id="td-invisible" style="border-left:0px; border-top:0px; border-bottom:0px; background-color:#FFFFFF"></th>
                        <th scope="col"><strong>A</strong></th>
                        <th scope="col"><strong>B</strong></th>
                        <th scope="col"><strong>C</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Costo por watt</strong></td>
                        <td id="tdCostoWattA">$* USD</td>
                        <td id="tdCostoWattB">$* USD</td>
                        <td id="tdCostoWattC">$* USD</td>
                    </tr>
                    <tr>
                        <td><strong>Potencia instalada</strong></td>
                        <td id="tdPotenciaInstaladaA">* Kw</td>
                        <td id="tdPotenciaInstaladaB">* Kw</td>
                        <td id="tdPotenciaInstaladaC">* Kw</td>
                    </tr>
                    <tr>
                        <td><strong>Porcentaje de generacion</strong></td>
                        <td id="tdPorcentajePropuestaA">* %</td>
                        <td id="tdPorcentajePropuestaB">* %</td>
                        <td id="tdPorcentajePropuestaC">* %</td>
                    </tr>
                </tbody> 
            </table>
            <table id="panel" class="table-comparative" style="margin-top:20px;">
                <tr>
                    <td colspan="4" style="background-color:#70D85F; color:#FFFFFF;"><strong>Panel</strong></td>
                </tr>
                <tr>
                    <td><strong>Marca</strong></td>
                    <td id="tdMarcaPanelA">
                        <img id="imgPanelB" class="imgLogos" src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/equipos/logos/panel/Axitec.png')))); ?>">
                    </td>
                    <td id="tdMarcaPanelB">
                        <img id="imgPanelB" class="imgLogos" src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/equipos/logos/panel/Axitec.png')))); ?>">
                    </td>
                    <td id="tdMarcaPanelC">
                        <img id="imgPanelC" class="imgLogos" src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/equipos/logos/panel/Axitec.png')))); ?>">
                    </td>
                </tr>
                <tr>
                    <td><strong>Modelo</strong></td>
                    <td id="tdModeloPanelA">*</td>
                    <td id="tdModeloPanelB">*</td>
                    <td id="tdModeloPanelC">*</td>
                </tr>
                <tr>
                    <td><strong>Cantidad</strong></td>
                    <td id="tdCantidadPanelA">*</td>
                    <td id="tdCantidadPanelB">*</td>
                    <td id="tdCantidadPanelC">*</td>
                </tr>
                <tr>
                    <td><strong>Potencia</strong></td>
                    <td id="tdPotenciaPanelA">* W</td>
                    <td id="tdPotenciaPanelB">* W</td>
                    <td id="tdPotenciaPanelC">* W</td>
                </tr>
            </table>
            <table id="inversor" class="table-comparative" style="margin-top:20px;">
                <tr>
                    <td colspan="4" style="background-color:#31AEC1; color:#FFFFFF;"><strong>Inversor</strong></td>
                </tr>
                <tr>
                    <td><strong>Marca</strong></td>
                    <td id="tdMarcaInversorA">
                        <img id="imgInversorA" class="imgLogos" src="data:image/jpg;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/equipos/logos/inversor/ABB Fimer.jpg')))); ?>">
                    </td>
                    <td id="tdMarcaInversorB">
                        <img id="imgInversorB" class="imgLogos" src="data:image/jpg;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/equipos/logos/inversor/ABB Fimer.jpg')))); ?>">
                    </td>
                    <td id="tdMarcaInversorC">
                        <img id="imgInversorC" class="imgLogos" src="data:image/jpg;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/equipos/logos/inversor/ABB Fimer.jpg')))); ?>">
                    </td>
                </tr>
                <tr>
                    <td><strong>Modelo</strong></td>
                    <td id="tdModeloInversorA">*</td>
                    <td id="tdModeloInversorB">*</td>
                    <td id="tdModeloInversorC">*</td>
                </tr>
                <tr>
                    <td><strong>Cantidad</strong></td>
                    <td id="tdCantidadInversorA">*</td>
                    <td id="tdCantidadInversorB">*</td>
                    <td id="tdCantidadInversorC">*</td>
                </tr>
                <tr>
                    <td><strong>Potencia</strong></td>
                    <td id="tdPotenciaInversorA">* W</td>
                    <td id="tdPotenciaInversorB">* W</td>
                    <td id="tdPotenciaInversorC">* W</td>
                </tr>
            </table>
            <table id="estructura" class="table-comparative" style="margin-top:20px;">
                <tr>
                    <td colspan="4" style="background-color:#C7CACA; color:#FFFFFF;"><strong>Estructura</strong></td>
                </tr>
                <tr>
                    <td><strong>Marca</strong></td>
                    <td id="tdMarcaEstructuraA">
                        <img id="imgEstructuraA" class="imgLogos" src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/equipos/logos/estructura/Everest.png')))); ?>">
                    </td>
                    <td id="tdMarcaEstructuraB">
                        <img id="imgPanelA" class="imgLogos" src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/equipos/logos/panel/Axitec.png')))); ?>">
                    </td>
                    <td id="tdMarcaEstructuraC">
                        <img id="imgEstructuraC" class="imgLogos" src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/equipos/logos/estructura/Everest.png')))); ?>">
                    </td>
                </tr>
                <tr>
                    <td><strong>Modelo</strong></td>
                    <td id="tdModeloEstructuraA">*</td>
                    <td id="tdModeloEstructuraB">*</td>
                    <td id="tdModeloEstructuraC">*</td>
                </tr>
                <tr>
                    <td><strong>Cantidad</strong></td>
                    <td id="tdCantidadEstructuraA">*</td>
                    <td id="tdCantidadEstructuraB">*</td>
                    <td id="tdCantidadEstructuraC">*</td>
                </tr>
            </table>
            <table id="ahorro" class="table-comparative" style="margin-top:20px;">
                <tr>
                    <td colspan="4" style="background-color:#DEEC4A; color:#FFFFFF;"><strong>Ahorro</strong></td>
                </tr>
                <tr>
                    <td><strong>Energetico</strong></td>
                    <td id="tdAhorroEnergeticoA">* Kw/bim</td>
                    <td id="tdAhorroEnergeticoB">* Kw/bim</td>
                    <td id="tdAhorroEnergeticoC">* Kw/bim</td>
                </tr>
                <tr>
                    <td><strong>Economico</strong></td>
                    <td id="tdAhorroEconomicoA">$* MXN</td>
                    <td id="tdAhorroEconomicoB">$* MXN</td>
                    <td id="tdAhorroEconomicoC">$* MXN</td>
                </tr>
            </table>
            <table id="totales" class="table-comparative" style="margin-top:20px;">
                <tr>
                    <td colspan="4" style="background-color:#FFD485; color:#FFFFFF;"><strong>Totales</strong></td>
                </tr>
                <tr>
                    <td><strong>Subtotal s/IVA</strong></td>
                    <td id="tdSubtotalA">$* USD</td>
                    <td id="tdSubtotalB">$* USD</td>
                    <td id="tdSubtotalC">$* USD</td>
                </tr>
                <tr>
                    <td><strong>Total c/IVA</strong></td>
                    <td id="tdTotalA">$* USD</td>
                    <td id="tdTotalB">$* USD</td>
                    <td id="tdTotalC">$* USD</td>
                </tr>
            </table>
            <!-- Nota * Costo por watt -->
            <table></table>
            <!-- Fin - Nota * Costo por watt -->
        
            <table id="nota-costo-watt" class="table-comparative" style="margin-top:70px;">
                <tr>
                    <td style="background-color:#9AC5E7;">
                        <p style="font-size:13px; font-weight:bold; color:#FFFFFF;">NOTA IMPORTANTE</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>
                            Entre los costos, lo más importante a revisar es el <strong style="background-color:#ECFF00;">costo por watt</strong> del proyecto, pues va en función del costo del proyecto y la potencia instalada. Puede ser que un proyecto se note económico pero es posible que estén proponiendo menos potencia y por ende la cotización a comparar no tenga equivalente.
                        </p>
                    </td>
                </tr>
            </table>
        </div>
        <div class="footer-page"></div>
    </div>
    <!-- Fin pagina 2 -->
</body>
</html><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/PDFTemplates/machotes/propuestaCombinaciones.blade.php ENDPATH**/ ?>