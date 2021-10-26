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
        border-radius: 10px;
        overflow: hidden;
        text-align: center;
        border-color: #DE1616;
    }

    .table-comparative th, .table-comparative td{
        border: 1px solid black;
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
                <p id="nombreCliente" class="textIncProupesta"><strong>Cliente: </strong><?php echo e($propuesta["cliente"]["vNombrePersona"] ." ". $propuesta["cliente"]["vPrimerApellido"] ." ". $propuesta["cliente"]["vSegundoApellido"]); ?></p>
                <p id="direccionCliente" class="textIncProupesta"><strong>Direccion: </strong><?php echo e($propuesta["cliente"]["vCalle"] .", ". $propuesta["cliente"]["cCodigoPostal"] .", ". $propuesta["cliente"]["vCiudad"] ." ". $propuesta["cliente"]["vEstado"]); ?></p>
                <p id="asesor" class="textIncProupesta"><strong>Asesor: </strong><?php echo e($propuesta["vendedor"]["vNombrePersona"] ." ". $propuesta["vendedor"]["vPrimerApellido"] ." ". $propuesta["vendedor"]["vSegundoApellido"]); ?></p>
                <p id="sucursal" class="textIncProupesta"><strong>Sucursal: </strong><?php echo e($propuesta["vendedor"]["vOficina"]); ?></p>
                <p id="caducidad-propuesta" style="margin-left:13px;"><strong>Validez de <u><?php echo e($propuesta["expiracion"]["cantidad"] . " " . $propuesta["expiracion"]["unidadMedida"]); ?></u></strong></p>
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
                        <td id="marcaPanel"><?php echo e($propuesta["paneles"]["marca"]); ?></td>
                        <td id="cantidadPanel" style="width:10%;"><?php echo e($propuesta["paneles"]["noModulos"]); ?></td>
                        <td id="modeloPanel" style="font-size: 13px;"><?php echo e($propuesta["paneles"]["nombre"]); ?></td>
                        <?php if($PdfConfig["subtotalesDesglozados"] === "true"): ?>
                            <td id="costoTotalPanel">$<?php echo e(number_format($propuesta["paneles"]["costoTotal"],2)); ?> USD</td>
                        <?php else: ?>
                            <td id="costoTotalPanel"></td>
                        <?php endif; ?>
                    </tr>
                    <tr id="desgloceInversor">
                        <td>Inversor</td>
                        <td id="marcaInversor"><?php echo e($propuesta["inversores"]["vMarca"]); ?></td>
                        <td id="cantidadInversor" style="width:10%;"><?php echo e($propuesta["inversores"]["numeroDeInversores"]); ?></td>
                        <td id="modeloInversor" style="font-size: 13px;"><?php echo e($propuesta["inversores"]["vNombreMaterialFot"]); ?></td>
                        <?php if($PdfConfig["subtotalesDesglozados"] === "true"): ?>
                            <td id="costoTotalInversor">$<?php echo e(number_format($propuesta["inversores"]["precioTotal"],2)); ?> USD</td>
                        <?php else: ?>
                            <td id="costoTotalInversor"></td>
                        <?php endif; ?>
                    </tr>
                    <tr id="desgloceEstructura" style="background-color:#F2F1F0;">
                        <td>Estructura</td>
                        <td id="marcaEstructura"><?php echo e($propuesta["estructura"]["_estructuras"]["vMarca"]); ?></td>
                        <td id="cantidadEstructura" style="width:10%;"><?php echo e($propuesta["estructura"]["cantidad"]); ?></td>
                        <td>Estructura de aluminio</td>
                        <?php if($PdfConfig["subtotalesDesglozados"] === "true"): ?>
                            <td id="costoTotalEstructura">$<?php echo e(number_format($propuesta["estructura"]["costoTotal"],2)); ?> USD</td>
                        <?php else: ?>
                            <td id="costoTotalEstructura"></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <td>Mano de obra</td>
                        <td></td>
                        <td style="width:10%;"></td>
                        <td style="font-size:10px;">*Instalacion *Servicio *Anclaje *Fijacion</td>
                        <?php if($PdfConfig["subtotalesDesglozados"] === "true"): ?>
                            <td id="costoTotalMO">$<?php echo e(number_format($propuesta["totales"]["manoDeObra"],2)); ?> USD</td>
                        <?php else: ?>
                            <td id="costoTotalMO"></td>
                        <?php endif; ?>
                    </tr>
                    <tr style="background-color:#F2F1F0;">
                        <td>Otros</td>
                        <td></td>
                        <td style="width:10%;"></td>
                        <td style="font-size:10px;">*Cableado *Protecciones *Tramite CFE *Monitoreo PostVenta (permanente)</td>
                        <?php if($PdfConfig["subtotalesDesglozados"] === "true"): ?>
                            <td id="costoTotalOtros">$<?php echo e(number_format($propuesta["totales"]["otrosTotal"],2)); ?> USD</td>
                        <?php else: ?>
                            <td id="costoTotalOtros"></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td style="width:10%;"></td>
                        <td align="center"><img src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/pdf/complementos/eu.png')))); ?>"/></td>
                        <td align="center"><img src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/pdf/complementos/mx.png')))); ?>"/></td>
                    </tr>
                    <tr style="background-color: #E8E8E8;">
                        <td><strong>Subtotal sin IVA</strong></td>
                        <td></td>
                        <td style="width:10%;"></td>
                        <td id="subtotalSinIVAUSD" align="center">$<?php echo e(number_format($propuesta["totales"]["precio"],2)); ?> USD</td>
                        <td id="subtotalSinIVAMXN" align="center">$<?php echo e(number_format($propuesta["totales"]["precioMasIVA"],2)); ?> MXN</td>
                    </tr>
                    <tr style="background-color: #E8E8E8;">
                        <td><strong>Total con IVA</strong></td>
                        <td></td>
                        <td style="width:10%;"></td>
                        <td id="totalConIVAUSD" align="center">$<?php echo e(number_format($propuesta["totales"]["precioMXNSinIVA"],2)); ?> USD</td>
                        <td id="totalConIVAMXN" align="center">$<?php echo e(number_format($propuesta["totales"]["precioMXNConIVA"],2)); ?> MXN</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Leyenda - Tipo de cambio -->
        <div id="leyendaTipoDeCambio" style="margin-left:20px; margin-right:20px;">
            <p style="font-size:11px; color: #969696;" align="center"><strong style="color: #2E2D2D;">NOTA: </strong>El tipo de cambio <strong style="color: #2E2D2D;">($<?php echo e($propuesta["tipoDeCambio"]); ?> mxn)</strong> se tomará el reportado por Banorte a la Venta del día en que se realice cada pago. Se requiere de un 50% de anticipo a la aprobación del proyecto, 35% antes de realizar el embarque de equipos, y 15% posterior a la instalación. El proyecto se entrega preparado para conexión con CFE.</p>
        </div>
        <!-- Logotipos && garantias de las marcas de los equipos -->
        <table class="table-contenedor">
            <tr>
                <td id="imgLogoPanel" align="center" style="border: none;">
                    <?php ($image = $propuesta['paneles']['marca'] . '.png'); ?>
                    <img style="width: 140px; height: 100px;" src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/equipos/logos/panel/' . $image)))); ?>">
                </td>
                <td id="imgLogoInversor" align="center" style="border: none;">
                    <?php ($image = $propuesta['inversores']['vMarca'] . '.jpg'); ?>
                    <img style="width: 140px; height: 100px;" src="data:image/jpg;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/equipos/logos/inversor/' . $image)))); ?>">
                </td>
                <td id="imgLogoInversor" align="center" style="border: none;">
                    <?php ($image = $propuesta['estructura']['_estructuras']['vMarca'] . '.png'); ?>
                    <img style="width: 140px; height: 100px;" src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/equipos/logos/estructura/' . $image)))); ?>">
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
                            <img height="68px" width="60px" src="data:image/jpg;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/pdf/ance.jpg')))); ?>">
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
                            <img height="68px" width="60px" src="data:image/jpg;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/pdf/wwf.jpg')))); ?>">
                        </div>
                        <div style="margin-top: -50px; margin-left:98px;">
                            <p class="text-inferior-pag1">World Wide Fund For Nature</p>
                            <p class="text-inferior-pag1-secundary" style="margin-top:-9px;">
                                Ren Mx | WWF México
                                www.ren.mx
                                <br>
                                Av. México 51
                                Col. Hipódromo 06100
                                <br> 
                                Ciudad de México
                                <br>
                                +51 (55) 5286 5631
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
                                        <p style="font-size: 9px; margin-left:10px; margin-top:15px;"><strong>CONSUMO (<?php echo e($propuesta["power"]["old_dac_o_nodac"]); ?>)</strong></p>
                                        <p style="color: #C31801; font-weight: bolder; margin-left:10px;"><?php echo e(number_format($propuesta["promedioConsumosBimestrales"],2)); ?> kW/bim</p>
                                        <strong style="font-size: 9px; margin-left:10px;">TOTAL A PAGAR</strong>
                                        <p style="color: #C31801; font-weight: bolder; margin-left:10px;">$<?php echo e(number_format($propuesta["power"]["objConsumoEnPesos"]["pagoPromedioBimestral"],2)); ?> MXN</p>
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
                                        <p style="font-size: 9px; margin-left:10px; margin-top:15px;"><strong>CONSUMO (<?php echo e($propuesta["power"]["new_dac_o_nodac"]); ?>)</strong></p>
                                        <p style="color: #1E9F26; font-weight: bolder; margin-left:10px;"><?php echo e(number_format($propuesta["power"]["nuevosConsumos"]["promedioNuevoConsumoBimestral"],2)); ?> kW/bim</p>
                                        <strong style="font-size: 9px; margin-left:10px;">TOTAL A PAGAR</strong>
                                        <p style="color: #1E9F26; font-weight: bolder; margin-left:10px;">$<?php echo e(number_format($propuesta["power"]["objGeneracionEnpesos"]["pagoPromedioBimestral"],2)); ?> MXN</p>
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
                    <img id="logoTipoEtesla" src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/etesla-logo.png')))); ?>"> 
                </td>
                <td>
                    <h1 style="font-size:25px;">
                        COMPARATIVA DE PROPUESTAS
                    </h1>
                </td>
            </tr>
        </table>
        <div class="div-contenedor">
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
                        <td name="tdInvisible" style="border-left:0px; border-top:0px;"></td>
                        <td>
                            <div style="margin-left:-80px;">
                                <?php ($image = $combinacionEconomica["paneles"]["marca"] . '.png'); ?>
                                <img id="imgPanelA" class="imgLogos" src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/equipos/logos/panel/' . $image)))); ?>">
                            </div>
                            <div style="margin-left:90px; margin-top:-55px;">
                                <?php ($image = $combinacionEconomica["inversores"]["marca"] . '.jpg'); ?>
                                <img id="imgInversorA" class="imgLogos" src="data:image/jpg;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/equipos/logos/inversor/' . $image)))); ?>">
                            </div>
                            <div>
                                <?php ($image = $combinacionEconomica['estructura']['marca'] . '.png'); ?>
                                <img id="imgEstructuraA" class="imgLogos" src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/equipos/logos/estructura/' . $image)))); ?>">
                            </div>
                        </td>
                        <td>
                            <div style="margin-left:-80px;">
                                <?php ($image = $combinacionMediana["paneles"]["marca"] . '.png'); ?>
                                <img id="imgPanelB" class="imgLogos" src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/equipos/logos/panel/' . $image)))); ?>">
                            </div>
                            <div style="margin-left:90px; margin-top:-55px;">
                                <?php ($image = $combinacionMediana["inversores"]["marca"] . '.jpg'); ?>
                                <img id="imgInversorB" class="imgLogos" src="data:image/jpg;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/equipos/logos/inversor/' . $image)))); ?>">
                            </div>
                            <div>
                                <?php ($image = $combinacionMediana['estructura']['marca'] . '.png'); ?>
                                <img id="imgEstructuraB" class="imgLogos" src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/equipos/logos/estructura/' . $image)))); ?>">
                            </div>
                        </td>
                        <td>
                            <div style="margin-left:-80px;">
                                <?php ($image = $combinacionOptima["paneles"]["marca"] . '.png'); ?>
                                <img id="imgPanelC" class="imgLogos" src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/equipos/logos/panel/Axitec.png')))); ?>">
                            </div>
                            <div style="margin-left:90px; margin-top:-55px;">
                                <?php ($image = $combinacionOptima["inversores"]["marca"] . '.jpg'); ?>
                                <img id="imgInversorC" class="imgLogos" src="data:image/jpg;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/equipos/logos/inversor/ABB Fimer.jpg')))); ?>">
                            </div>
                            <div>
                                <?php ($image = $combinacionOptima['estructura']['marca'] . '.png'); ?>
                                <img id="imgEstructuraC" class="imgLogos" src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/equipos/logos/estructura/Everest.png')))); ?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Costo por watt</strong></td>
                        <td id="tdCostoWattA">$<?php echo e(number_format($combinacionEconomica["totales"]["precio_watt"],2)); ?> USD</td>
                        <td id="tdCostoWattB">$<?php echo e(number_format($combinacionMediana["totales"]["precio_watt"],2)); ?> USD</td>
                        <td id="tdCostoWattC">$<?php echo e(number_format($combinacionOptima["totales"]["precio_watt"],2)); ?> USD</td>
                    </tr>
                    <tr>
                        <td><strong>Potencia instalada</strong></td>
                        <td id="tdPotenciaInstaladaA"><?php echo e(number_format($combinacionEconomica["paneles"]["potenciaReal"],2)); ?> Kw</td>
                        <td id="tdPotenciaInstaladaB"><?php echo e(number_format($combinacionMediana["paneles"]["potenciaReal"],2)); ?> Kw</td>
                        <td id="tdPotenciaInstaladaC"><?php echo e(number_format($combinacionOptima["paneles"]["potenciaReal"],2)); ?> Kw</td>
                    </tr>
                    <tr>
                        <td><strong>Porcentaje de generacion</strong></td>
                        <td id="tdPorcentajePropuestaA"><?php echo e($combinacionEconomica["power"]["porcentajePotencia"]); ?>%</td>
                        <td id="tdPorcentajePropuestaB"><?php echo e($combinacionMediana["power"]["porcentajePotencia"]); ?>%</td>
                        <td id="tdPorcentajePropuestaC"><?php echo e($combinacionOptima["power"]["porcentajePotencia"]); ?>%</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="background-color:#70D85F; color:#FFFFFF;"><strong>Panel</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Modelo</strong></td>
                        <td id="tdModeloPanelA"><?php echo e($combinacionEconomica["paneles"]["nombre"]); ?></td>
                        <td id="tdModeloPanelB"><?php echo e($combinacionMediana["paneles"]["nombre"]); ?></td>
                        <td id="tdModeloPanelC"><?php echo e($combinacionOptima["paneles"]["nombre"]); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Cantidad</strong></td>
                        <td id="tdCantidadPanelA"><?php echo e($combinacionEconomica["paneles"]["noModulos"]); ?></td>
                        <td id="tdCantidadPanelB"><?php echo e($combinacionMediana["paneles"]["noModulos"]); ?></td>
                        <td id="tdCantidadPanelC"><?php echo e($combinacionOptima["paneles"]["noModulos"]); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Potencia</strong></td>
                        <td id="tdPotenciaPanelA"><?php echo e(number_format($combinacionEconomica["paneles"]["potencia"],2)); ?> W</td>
                        <td id="tdPotenciaPanelB"><?php echo e(number_format($combinacionMediana["paneles"]["potencia"],2)); ?> W</td>
                        <td id="tdPotenciaPanelC"><?php echo e(number_format($combinacionOptima["paneles"]["potencia"],2)); ?> W</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="background-color:#31AEC1; color:#FFFFFF;"><strong>Inversor</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Modelo</strong></td>
                        <td id="tdModeloInversorA"><?php echo e($combinacionEconomica["inversores"]["vNombreMaterialFot"]); ?></td>
                        <td id="tdModeloInversorB"><?php echo e($combinacionMediana["inversores"]["vNombreMaterialFot"]); ?></td>
                        <td id="tdModeloInversorC"><?php echo e($combinacionOptima["inversores"]["vNombreMaterialFot"]); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Cantidad</strong></td>
                        <td id="tdCantidadInversorA"><?php echo e($combinacionEconomica["inversores"]["numeroDeInversores"]); ?></td>
                        <td id="tdCantidadInversorB"><?php echo e($combinacionMediana["inversores"]["numeroDeInversores"]); ?></td>
                        <td id="tdCantidadInversorC"><?php echo e($combinacionOptima["inversores"]["numeroDeInversores"]); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Potencia</strong></td>
                        <td id="tdPotenciaInversorA"><?php echo e($combinacionEconomica["inversores"]["fPotencia"]); ?> W</td>
                        <td id="tdPotenciaInversorB"><?php echo e($combinacionMediana["inversores"]["fPotencia"]); ?> W</td>
                        <td id="tdPotenciaInversorC"><?php echo e($combinacionOptima["inversores"]["fPotencia"]); ?> W</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="background-color:#C7CACA; color:#FFFFFF;"><strong>Estructura</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Modelo</strong></td>
                        <td id="tdModeloEstructuraA"><?php echo e($combinacionEconomica["estructura"]["marca"]); ?></td>
                        <td id="tdModeloEstructuraB"><?php echo e($combinacionMediana["estructura"]["marca"]); ?></td>
                        <td id="tdModeloEstructuraC"><?php echo e($combinacionOptima["estructura"]["marca"]); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Cantidad</strong></td>
                        <td id="tdCantidadEstructuraA"><?php echo e($combinacionEconomica["estructura"]["cantidad"]); ?></td>
                        <td id="tdCantidadEstructuraB"><?php echo e($combinacionMediana["estructura"]["cantidad"]); ?></td>
                        <td id="tdCantidadEstructuraC"><?php echo e($combinacionOptima["estructura"]["cantidad"]); ?></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="background-color:#DEEC4A; color:#FFFFFF;"><strong>Ahorro</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Energetico</strong></td>
                        <td id="tdAhorroEnergeticoA"><?php echo e($combinacionEconomica["power"]["Ahorro"]["ahorroBimestral"]); ?> Kw/bim</td>
                        <td id="tdAhorroEnergeticoB"><?php echo e($combinacionMediana["power"]["Ahorro"]["ahorroBimestral"]); ?> Kw/bim</td>
                        <td id="tdAhorroEnergeticoC"><?php echo e($combinacionOptima["power"]["Ahorro"]["ahorroBimestral"]); ?> Kw/bim</td>
                    </tr>
                    <tr>
                        <td><strong>Economico</strong></td>
                        <td id="tdAhorroEconomicoA">$<?php echo e(number_format($combinacionEconomica["roi"]["ahorro"]["ahorroBimestralEnPesosMXN"],2)); ?> MXN</td>
                        <td id="tdAhorroEconomicoB">$<?php echo e(number_format($combinacionMediana["roi"]["ahorro"]["ahorroBimestralEnPesosMXN"],2)); ?> MXN</td>
                        <td id="tdAhorroEconomicoC">$<?php echo e(number_format($combinacionOptima["roi"]["ahorro"]["ahorroBimestralEnPesosMXN"],2)); ?> MXN</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="background-color:#FFD485; color:#FFFFFF;"><strong>Totales</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Subtotal s/IVA</strong></td>
                        <td id="tdSubtotalA">$<?php echo e(number_format($combinacionEconomica["totales"]["precio"],2)); ?> USD</td>
                        <td id="tdSubtotalB">$<?php echo e(number_format($combinacionMediana["totales"]["precio"],2)); ?> USD</td>
                        <td id="tdSubtotalC">$<?php echo e(number_format($combinacionOptima["totales"]["precio"],2)); ?> USD</td>
                    </tr>
                    <tr>
                        <td><strong>Total c/IVA</strong></td>
                        <td id="tdTotalA">$<?php echo e(number_format($combinacionEconomica["totales"]["precioMasIVA"],2)); ?> USD</td>
                        <td id="tdTotalB">$<?php echo e(number_format($combinacionMediana["totales"]["precioMasIVA"],2)); ?> USD</td>
                        <td id="tdTotalC">$<?php echo e(number_format($combinacionOptima["totales"]["precioMasIVA"],2)); ?> USD</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Info. sobre los equipos seleccionados -->
        <div class="div-contenedor">
            <p style="text-align:center;">
                <span style="background-color:#718AE2; color:white; font-weight: bolder;">
                    Equipos seleccionados
                </span>
            </p>
            <table>
                <tr name="div-panel">
                    <td name="img-equipo" width="30%">
                        <div class="div-contenedor" style="margin-top:-40px; margin-left:-23px;">
                            <?php ($image = $propuesta['paneles']['marca'] . '.png'); ?>
                            <img height="195px" width="187px" src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/equipos/instrumentos/panel/' . $image)))); ?>">
                        </div>
                    </td>
                    <td name="info-equipo" width="500px">
                        <div class="div-contenedor recuadroInfo" style="margin-top:-35px; margin-left:-300px; margin-right:270px;">
                            <p style="margin-left:10px; margin-right:10px;">AXITEC GmbH fué creada en 2001 y cuenta con su sede en Stuttgart (Alemania). Desde hace años pertenece a las principales empresas productoras de módulos fotovoltaicos a nivel internacional, debido a su calidad. AXITEC está especializada en la producción de módulos fotovoltaicos, y abarca toda la cadena de procesamiento del módulo solar. No sólo se encarga de su diseño y fabricación sino que también es responsable de su comercialización y de su servicio técnico.</p>
                        </div>
                    </td>
                </tr>
                <tr name="div-inversor">
                    <td name="info-equipo" width="500px">
                        <div class="div-contenedor recuadroInfo" style="margin-left:-12px;">
                            <p style="margin-left:10px; margin-right:10px;">Al abandonar paulatinamente los combustibles fósiles, consumiremos más electricidad en los sectores de calefacción (sistemas modernos de calefacción con bomba de calor) y movilidad (automóviles eléctricos). Por lo tanto, es sensato empezar a pensar hoy acerca de cómo se puede satisfacer esta demanda creciente de manera sostenible y rentable.

                            Con una instalación fotovoltaica, no solo podrá alimentar sus electrodomésticos con energía solar, sino también podrá calentar agua para ducharse o cargar su automóvil eléctrico.</p>
                        </div>
                    </td>
                    <td name="img-equipo" width="30%">
                        <div class="div-contenedor">
                            <?php ($image = $propuesta['inversores']['vMarca'] . '.jpg'); ?>
                            <img height="195px" width="187px" style="margin-top:-20px;" src="data:image/jpg;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/equipos/instrumentos/inversor/' . $image)))); ?>">
                        </div>
                    </td>
                </tr>
            </table>
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
                    <img id="logoTipoEtesla" src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/etesla-logo.png')))); ?>"> 
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
                    <td>$<?php echo e(number_format($propuesta["totales"]["precioMXNConIVA"], 2)); ?></td>
                    <th style="background-color: #03BABE;">Ahorro mensual<br>de luz</th>
                    <td style="background-color: #03BABE;">$<?php echo e(number_format($propuesta["roi"]["ahorro"]["ahorroMensualEnPesosMXN"] ,2)); ?></td>
                    <th>Retorno de inversión</th>
                    <td><?php echo e($propuesta["roi"]["roiEnAnios"]); ?> año(s)</td>
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
                    <td>$<?php echo e(number_format($propuesta["financiamiento"]["objMensualidadesCreditCard"]["tresMeses"] ,2)); ?></td>
                    <td>$<?php echo e(number_format($propuesta["financiamiento"]["objMensualidadesCreditCard"]["seisMeses"], 2)); ?></td>
                    <td>$<?php echo e(number_format($propuesta["financiamiento"]["objMensualidadesCreditCard"]["nueveMeses"], 2)); ?></td>
                    <td>$<?php echo e(number_format($propuesta["financiamiento"]["objMensualidadesCreditCard"]["doceMeses"], 2)); ?></td>
                    <td>$<?php echo e(number_format($propuesta["financiamiento"]["objMensualidadesCreditCard"]["dieciochoMeses"], 2)); ?></td>
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
                    <td>$<?php echo e(number_format($propuesta["financiamiento"]["objEnganche"]["quincePorcent"], 2)); ?></td>
                    <td>$<?php echo e(number_format($propuesta["financiamiento"]["objEnganche"]["treintacincoPorcent"], 2)); ?></td>
                    <td>$<?php echo e(number_format($propuesta["financiamiento"]["objEnganche"]["cincuentaPorcent"], 2)); ?></td>
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
                <?php for($x = 12; $x <= 84; $x = $x + 12): ?>
                    <tr>
                        <th>A <?php echo e($x); ?> meses</th>
                        <?php for($i=1; $i<=3; $i++): ?>
                            <?php ($porcent = ''); ?>

                            <?php switch($i):
                                case (1): ?>
                                    <?php echo e($porcent = 'fifteenPorcent'); ?>

                                <?php break; ?>
                                <?php case (2): ?>
                                    <?php echo e($porcent = 'fiftyPorcent'); ?>

                                <?php break; ?>
                                <?php case (3): ?>
                                    <?php echo e($porcent = 'thirtyFive'); ?>

                                <?php break; ?>
                                <?php default: ?>
                                    <?php echo e($i == 3); ?>

                                <?php break; ?>;
                            <?php endswitch; ?>
                            
                            <?php if($propuesta["financiamiento"]["_pagosMensualesPorPlazo"][$x][$porcent] > $propuesta["roi"]["ahorro"]["ahorroMensualEnPesosMXN"] && $propuesta["financiamiento"]["_pagosMensualesPorPlazo"][$x][$porcent] < ($propuesta["roi"]["ahorro"]["ahorroMensualEnPesosMXN"] * 1.10)): ?>
                                <td id="amarillo" style="background-color:#E0D30C">$<?php echo e(number_format($propuesta["financiamiento"]["_pagosMensualesPorPlazo"][$x][$porcent], 2)); ?></td>
                            <?php elseif($propuesta["financiamiento"]["_pagosMensualesPorPlazo"][$x][$porcent] <= $propuesta["roi"]["ahorro"]["ahorroMensualEnPesosMXN"]): ?>
                                <td id="verde" style="background-color:#44C331">$<?php echo e(number_format($propuesta["financiamiento"]["_pagosMensualesPorPlazo"][$x][$porcent], 2)); ?></td>
                            <?php else: ?>
                                <td id="normal" style="background-color:#3A565E">$<?php echo e(number_format($propuesta["financiamiento"]["_pagosMensualesPorPlazo"][$x][$porcent], 2)); ?></td>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </tr>
                <?php endfor; ?>
            </table>
            <!-- Fin_Tabla financiamiento -->
            <!-- Graficas -->
            <!-- Grafico ROI -->
            <div class="container-fluid">
                <!-- Eje X - Grafico Proyeccion -->
                <?php ($anioActual = now()->year); ?>
                <?php ($aniosProyeccion = []); ?>
                <?php ($aniosProyeccion[0] = $anioActual); ?>

                <?php for($i=1; $i<=10; $i++): ?>
                    <?php ($aniosProyeccion[$i] = (int)$anioActual + $i); ?>
                <?php endfor; ?>

                <!--table class="table-contenedor" style="margin-top: -20px;">
                    <tr>
                        <td id="graficaPuntos" align="center" style="border: none;">
                            <h3>Con paneles / Sin paneles</h3>
                            <! Aqui va la grafica 1 - [ Puntos ] >
                        </td>
                        <td id="graficaBarras" align="center" style="border: none;">
                            <h3>Consumo actual <strong>Vs.</strong> Nuevo consumo c/paneles solares</h3>
                            <! Aqui va la grafica 2 - [ Barras ] >
                        </td>
                    </tr>
                </table -->
            </div>
        </div>
        <hr class="linea-division" style="background-color:#5576F2; margin-left:-15px; margin-right:-15px;">
        <table>
            <tr>
                <td style="width: 450px;">
                    <p style="margin-top: -10px; margin-left: 55px; text-align: left; font-weight: bold;">EL SISTEMA FOTOVOLTAICO PRESENTADO EN ESTA PROPUESTA, EQUIVALE A <strong style="color:#8AADCE;"><?php echo e($propuesta["power"]["objImpactoAmbiental"]["numeroArboles"]); ?></strong> ÁRBOLES PLANTADOS AL AÑO.</p>
                </td>
                <td align="center">
                    <img width="30%" height="170px" src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/pdf/complementos/tree.png')))); ?>"/>
                </td>
            </tr>
        </table>
        <div class="footer-page"></div>
    </div>
    <!-- Fin pagina 3 -->
</body>
</html><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/PDFTemplates/propuestaCombinaciones.blade.php ENDPATH**/ ?>