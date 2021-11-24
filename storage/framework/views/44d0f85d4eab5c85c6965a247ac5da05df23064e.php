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
    <!-- Page 1 -->
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
                <p id="nombreCliente" class="textIncProupesta">
                    <strong>Cliente: </strong>
                    <?php echo e($cliente["vNombrePersona"] ." ". $cliente["vPrimerApellido"] ." ". $cliente["vSegundoApellido"]); ?>

                </p>
                <p id="direccionCliente" class="textIncProupesta">
                    <strong>Direccion: </strong>
                    <?php echo e($cliente["vCalle"] .", ". $cliente["cCodigoPostal"] .", ". $cliente["vMunicipio"] ." ". $cliente["vCiudad"] ." ". $cliente["vEstado"]); ?>

                </p>
                <p id="asesor" class="textIncProupesta">
                    <strong>Asesor:</strong> 
                    <?php echo e($vendedor["vNombrePersona"] ." ". $vendedor["vPrimerApellido"] ." ". $vendedor["vSegundoApellido"]); ?>

                </p>
                <p id="sucursal" class="textIncProupesta">
                    <strong>Sucursal: </strong><?php echo e($vendedor["vOficina"]); ?>

                </p>
                <p id="caducidad-propuesta" style="margin-left:13px;">
                    <strong>
                        Validez de <u><?php echo e($expiracion["cantidad"] . " " . $expiracion["unidadMedida"]); ?></u>
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
                        <td id="marcaPanel"><?php echo e($paneles["vMarca"]); ?></td>
                        <td id="cantidadPanel"><?php echo e($paneles["noModulos"]); ?></td>
                        <td id="modeloPanel" style="font-size: 13px;"><?php echo e($paneles["nombre"]); ?></td>
                        <?php if($PdfConfig["subtotalesDesglozados"] === "true"): ?>
                            <td id="costoTotalPanel">
                                $<?php echo e(number_format($paneles["costoTotal"],2)); ?> USD
                            </td>
                        <?php else: ?>
                            <td id="costoTotalPanel"></td>
                        <?php endif; ?>
                    </tr>
                    <tr id="desgloceInversor">
                        <td>Inversor</td>
                        <td id="marcaInversor">
                            <?php echo e($inversores["vMarca"]); ?>

                        </td>
                        <?php if($inversores["combinacion"] === "true"): ?>
                            <td colspan="2">
                                <p style="font-size:10px;">
                                    <?php echo e($inversores["numeroDeInversores"]["MicroUno"]["vNombreMaterialFot"]); ?>: <?php echo e($inversores["numeroDeInversores"]["MicroUno"]["numeroDeInversores"]); ?>

                                </p>
                                <p style="font-size:10px;">
                                    <?php echo e($inversores["numeroDeInversores"]["MicroDos"]["vNombreMaterialFot"]); ?>: <?php echo e($inversores["numeroDeInversores"]["MicroDos"]["numeroDeInversores"]); ?>

                                </p>
                            </td>
                        <?php else: ?>
                            <td id="cantidadInversor">
                                <?php echo e($inversores["numeroDeInversores"]); ?>

                            </td>
                            <td id="modeloInversor" style="font-size: 13px;">
                                <?php echo e($inversores["vNombreMaterialFot"]); ?>

                            </td>
                        <?php endif; ?>
                        <?php if($PdfConfig["subtotalesDesglozados"] === "true"): ?>
                            <td id="costoTotalInversor">
                                $<?php echo e(number_format($inversores["costoTotal"],2)); ?> USD
                            </td>
                        <?php else: ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                    <tr id="desgloceEstructura" style="background-color:#F2F1F0;">
                        <td>Estructura</td>
                        <td id="marcaEstructura"><?php echo e($estructura["_estructuras"]["vMarca"]); ?></td>
                        <td id="cantidadEstructura"><?php echo e($estructura["cantidad"]); ?></td>
                        <td>Estructura de aluminio</td>
                        <?php if($PdfConfig["subtotalesDesglozados"] === "true"): ?>
                            <td id="costoTotalEstructura">
                                $<?php echo e(number_format($estructura["costoTotal"],2)); ?> USD
                            </td>
                        <?php else: ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <td>Mano de obra</td>
                        <td></td>
                        <td></td>
                        <td style="font-size:10px;">*Instalacion *Servicio *Anclaje *Fijacion</td>
                        <?php if($PdfConfig["subtotalesDesglozados"] === "true"): ?>
                            <td id="costoTotalMO">
                                $<?php echo e(number_format($totales["manoDeObra"],2)); ?> USD
                            </td>
                        <?php else: ?>
                            <td id="costoTotalMO"></td>
                        <?php endif; ?>
                    </tr>
                    <tr style="background-color:#F2F1F0;">
                        <td>Otros</td>
                        <td></td>
                        <td></td>
                        <td style="font-size:10px;">*Cableado *Protecciones *Tramite CFE *Monitoreo PostVenta (permanente)</td>
                        <?php if($PdfConfig["subtotalesDesglozados"] === "true"): ?>
                            <td id="costoTotalOtros">
                                $<?php echo e(number_format($totales["otrosTotal"],2)); ?> USD
                            </td>
                        <?php else: ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <td></td>
                        <?php if($descuento["porcentaje"] > 0): ?>
                            <td style="background-color:#2593F0;">
                                <p style="text-align:center; color:white; font-weight:bolder; font-size:12px;">
                                    Total s/Descuento
                                </p>
                            </td>
                        <?php else: ?>
                            <td></td>
                        <?php endif; ?>
                        <?php if($descuento["porcentaje"] > 0): ?>
                            <td id="tdDescuento" style="background-color:green;">
                                <p style="text-align:center; color:white; font-weight:bolder; font-size:12px;">
                                    Descuento (<?php echo e($descuento["porcentaje"]); ?>%)
                                </p>
                            </td>
                        <?php else: ?>
                            <td></td>
                        <?php endif; ?>
                        <td align="center"><img src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/pdf/banderas/estados-unidos.png')))); ?>"/></td>
                        <td align="center"><img src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/pdf/banderas/mexico.png')))); ?>"/></td>
                    </tr>
                    <tr style="background-color: #E8E8E8;">
                        <td><strong>Total sin IVA</strong></td>
                        <?php if($descuento["porcentaje"] > 0): ?>
                            <td id="tdTotalAntesDeDescuento" style="border-right:solid #2593F0; border-left:solid #2593F0; border-bottom:solid #2593F0;">
                                <p style="font-weight:bolder; text-align:center; font-size:15px; background-color:#FFF66D;">
                                    $<?php echo e(number_format($descuento["precioSinDescuento"])); ?> USD
                                </p>
                            </td>
                        <?php else: ?>
                            <td></td>
                        <?php endif; ?>
                        <?php if($descuento["porcentaje"] > 0): ?>
                            <td id="descuentoUSD" style="border-right:solid green; border-left:solid green; border-bottom:solid green;">
                                <p style="font-weight:bolder; text-align:center; font-size:15px; background-color:#FFF66D;">
                                    $<?php echo e(number_format($descuento["descuento"],2)); ?> USD
                                </p>
                            </td>
                        <?php else: ?>
                            <td></td>
                        <?php endif; ?>
                        <td id="subtotalSinIVAUSD" align="center">
                            $<?php echo e(number_format($totales["precio"], 2)); ?> USD
                        </td>
                        <td id="subtotalSinIVAMXN" align="center">
                            $<?php echo e(number_format($totales["precioMXNSinIVA"], 2)); ?> MXN
                        </td>
                    </tr>
                    <tr style="background-color: #E8E8E8;">
                        <td><strong>Total con IVA</strong></td>
                        <td></td>
                        <td></td>
                        <td id="totalConIVAUSD" align="center">
                            $<?php echo e(number_format($totales["precioMasIVA"], 2)); ?> USD
                        </td>
                        <td id="totalConIVAMXN" align="center">
                            $<?php echo e(number_format($totales["precioMXNConIVA"], 2)); ?> MXN
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Leyenda - Tipo de cambio -->
        <div id="leyendaTipoDeCambio" style="margin-left:20px; margin-right:20px;">
            <p class="nota"><strong style="color: #2E2D2D;">NOTA: </strong>El tipo de cambio <strong style="color: #2E2D2D;">($<?php echo e($tipoDeCambio); ?> mxn)</strong> se tomará el reportado por Banorte a la Venta del día en que se realice cada pago. Se requiere de un 50% de anticipo a la aprobación del proyecto, 35% antes de realizar el embarque de equipos, y 15% posterior a la instalación. El proyecto se entrega preparado para conexión con CFE.</p>
        </div>
        <!-- Logotipos && garantias de las marcas de los equipos -->
        <table class="table-contenedor" style="margin-top:20px;">
            <tr>
                <td id="imgLogoPanel" align="center" style="border: none;">
                    <?php ($image = $paneles['vMarca'] . '.png'); ?>
                    <img style="width: 140px; height: 67px;" src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/equipos/logos/panel/' . $image)))); ?>">
                </td>
                <td id="imgLogoInversor" align="center" style="border: none;">
                    <?php ($image = $inversores['vMarca'] . '.jpg'); ?>
                    <img style="width: 140px; height: 67px;" src="data:image/jpg;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/equipos/logos/inversor/' . $image)))); ?>">
                </td>
                <td id="imgLogoInversor" align="center" style="border: none;">
                    <?php ($image = $estructura["_estructuras"]['vMarca'] . '.png'); ?>
                    <img style="width: 140px; height: 67px;" src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/equipos/logos/estructura/' . $image)))); ?>">
                </td>
            </tr>
        </table>
        <!-- Fin logos/marcas equip. -->

        <table class="table-contenedor" style="margin-top:20px;">
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
                                                CONSUMO [BIM.] (<?php echo e($power["old_dac_o_nodac"]); ?>)
                                            </strong>
                                        </p>
                                        <p style="color: #C31801; font-weight: bolder; margin-left:10px;">
                                            <?php echo e($power["_consumos"]["_promCons"]["promConsumosBimestrales"]); ?> kW
                                        </p>
                                        <p>
                                            <strong style="font-size: 9px; margin-left:10px;">
                                                TOTAL A PAGAR [BIM.]
                                            </strong>
                                        </p>
                                        <p style="color: #C31801; font-weight: bolder; margin-left:10px;">
                                            $<?php echo e(number_format($power["objConsumoEnPesos"]["pagoPromedioBimestral"], 2)); ?> MXN
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
                                                CONSUMO [BIM.] (<?php echo e($power["new_dac_o_nodac"]); ?>)
                                            </strong>
                                        </p>
                                        <p style="color: #1E9F26; font-weight: bolder; margin-left:10px;">
                                            <?php echo e($power["nuevosConsumos"]["promedioNuevoConsumoBimestral"]); ?> kW
                                        </p>
                                        <p style="font-size: 9px; margin-left:10px;">
                                            <strong>TOTAL A PAGAR [BIM.]</strong>
                                        </p>
                                        <p style="color: #1E9F26; font-weight: bolder; margin-left:10px;">
                                            $<?php echo e(number_format($power["objGeneracionEnpesos"]["pagoPromedioBimestral"] ,2)); ?> MXN
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

    <!-- Pagina 2 -->
    <div class="container-fluid" style="border-top: 10px solid #5576F2;">
        <table>
            <tr>
                <td>
                    <!-- LogoTipo Etesla -->
                    <img id="logoTipoEtesla" src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/etesla-logo.png')))); ?>"> 
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
                                        $<?php echo e(number_format($totales["precioMXNConIVA"], 2)); ?>

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
                                        $<?php echo e(number_format($roi["ahorro"]["ahorroMensualEnPesosMXN"] ,2)); ?>

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
                                        <?php echo e($roi["roiEnAnios"]); ?> año(s)
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
                        $<?php echo e(number_format($financiamiento["objMensualidadesCreditCard"]["tresMeses"] ,2)); ?>

                    </td>
                    <td>
                        $<?php echo e(number_format($financiamiento["objMensualidadesCreditCard"]["seisMeses"], 2)); ?>

                    </td>
                    <td>
                        $<?php echo e(number_format($financiamiento["objMensualidadesCreditCard"]["nueveMeses"], 2)); ?>

                    </td>
                    <td>
                        $<?php echo e(number_format($financiamiento["objMensualidadesCreditCard"]["doceMeses"], 2)); ?>

                    </td>
                    <td>
                        $<?php echo e(number_format($financiamiento["objMensualidadesCreditCard"]["dieciochoMeses"], 2)); ?>

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
                        $<?php echo e(number_format($financiamiento["objEnganche"]["quincePorcent"], 2)); ?>

                    </td>
                    <td>
                        $<?php echo e(number_format($financiamiento["objEnganche"]["treintacincoPorcent"], 2)); ?>

                    </td>
                    <td>
                        $<?php echo e(number_format($financiamiento["objEnganche"]["cincuentaPorcent"], 2)); ?>

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
                            
                            <?php if($financiamiento["_pagosMensualesPorPlazo"][$x][$porcent] > $roi["ahorro"]["ahorroMensualEnPesosMXN"] && $financiamiento["_pagosMensualesPorPlazo"][$x][$porcent] < ($roi["ahorro"]["ahorroMensualEnPesosMXN"] * 1.10)): ?>
                                <td id="amarillo" style="background-color:#E0D30C">
                                    $<?php echo e(number_format($financiamiento["_pagosMensualesPorPlazo"][$x][$porcent], 2)); ?>

                                </td>
                            <?php elseif($financiamiento["_pagosMensualesPorPlazo"][$x][$porcent] <= $roi["ahorro"]["ahorroMensualEnPesosMXN"]): ?>
                                <td id="verde" style="background-color:#44C331">
                                    $<?php echo e(number_format($financiamiento["_pagosMensualesPorPlazo"][$x][$porcent], 2)); ?>

                                </td>
                            <?php else: ?>
                                <td id="normal" style="background-color:#3A565E">
                                    $<?php echo e(number_format($financiamiento["_pagosMensualesPorPlazo"][$x][$porcent], 2)); ?>

                                </td>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </tr>
                <?php endfor; ?>
            </table>
            <!-- Fin_Tabla financiamiento -->
        </div>
        <hr class="linea-division" style="background-color:#5576F2; margin-left:-15px; margin-right:-15px;">
        <table id="tableGraficas">
            <tr>
                <td id="grfEnergetico">
                    <img style="width:40%; height:210px; margin-left:55px;" src='https://quickchart.io/chart?c={
                        type: "bar",
                        data:{
                            labels: ["1er", "2do", "3ro", "4to", "5to", "6to"],
                            datasets: [
                                {
                                    label: "Consumo s/paneles [Bimestral]",
                                    data: [1,2,3,4,5,6],
                                    backgroundColor: "rgba(245, 62, 29, 0.61)",
                                    borderColor: "rgba(245, 62, 29, 1)",
                                    borderWidth: 1
                                },
                                {
                                    label: "Generacion [Bimestral]",
                                    data: [1,2,3,4,5,6],
                                    backgroundColor: "rgba(102, 196, 79, 0.54)",
                                    borderColor: "rgba(85, 177, 62, 1)",
                                    borderWidth: 1
                                },
                                {
                                    label: "Nuevo consumo c/paneles [Bimestral]",
                                    data: [1,2,3,4,5,6],
                                    backgroundColor: "rgba(29, 170, 245, 0.55)",
                                    borderColor: "rgba(29, 170, 245, 1)",
                                    borderWidth: 1
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: true,
                            title:{
                                display: true,
                                position: "bottom",
                                text: "Consumo electrico"
                            },
                            scales: {
                                y: {
                                    ticks: {
                                        callback: function(value, index, values) {
                                            return value.toLocaleString("es-MX") + " kw";
                                        }
                                    }
                                }
                            } 
                        }
                    }
                '/>
                </td>
                <td id="grfEconomico">
                    <img style="width:40%; height:210px; margin-left:85px;" src='https://quickchart.io/chart?c={
                        type: "bar",
                        data: {
                            labels: ["1er", "2do", "3ro", "4to", "5to", "6to"],
                            datasets: [
                                {
                                    label: "Consumo s/paneles [Bimestral]",
                                    data: [1,2,3,4,5,6],
                                    backgroundColor: "rgba(245, 62, 29, 0.61)",
                                    borderColor: "rgba(245, 62, 29, 1)",
                                    borderWidth: 1
                                },
                                {
                                    label: "Consumo c/paneles [Bimestral]",
                                    data: [1,2,3,4,5,6],
                                    backgroundColor: "rgba(102, 196, 79, 0.54)",
                                    borderColor: "rgba(85, 177, 62, 1)",
                                    borderWidth: 1
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            title:{
                                display: true,
                                position: "bottom",
                                text: "Consumo economico"
                            },
                            scales: {
                                y: {
                                    ticks: {
                                        callback: function(value, index, values) {
                                            return "$" + value.toLocaleString("es-MX") + "mxn";
                                        }
                                    }
                                }
                            } 
                        }
                    }'/>
                </td>
            </tr>  
        </table>
        <table id="tableArboles">
            <tr>
                <td style="width: 450px;">
                    <p style="margin-top: -10px; margin-left: 55px; text-align: left; font-weight: bold;">
                        EL SISTEMA FOTOVOLTAICO PRESENTADO EN ESTA PROPUESTA, EQUIVALE A <strong style="color:#8AADCE;"><?php echo e($power["objImpactoAmbiental"]["numeroArboles"]); ?></strong> ÁRBOLES PLANTADOS AL AÑO.
                    </p>
                </td>
                <td align="center">
                    <img width="30%" height="170px" src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/pdf/complementos/tree.png')))); ?>"/>
                </td>
            </tr>
        </table>
        <div class="footer-page"></div>
    </div>
    <!-- Fin pagina 2 -->
</body>
</html><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/PDFTemplates/bajaTension.blade.php ENDPATH**/ ?>