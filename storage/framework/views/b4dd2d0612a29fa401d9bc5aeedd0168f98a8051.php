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
        margin-top: -20px;
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
                <p id="nombreCliente" class="textIncProupesta"><strong>Cliente: </strong><?php echo e($cliente["vNombrePersona"] ." ". $cliente["vPrimerApellido"] ." ". $cliente["vSegundoApellido"]); ?></p>
                <p id="direccionCliente" class="textIncProupesta"><strong>Direccion: </strong><?php echo e($cliente["vCalle"] ." ". $cliente["vMunicipio"] ." ". $cliente["vEstado"]); ?></p>
                <p id="fechaCreacion" class="textIncProupesta"><strong><?php echo e(now()); ?></strong></p>
                <p id="asesor" class="textIncProupesta"><strong>Asesor:</strong> <?php echo e($vendedor["vNombrePersona"] ." ". $vendedor["vPrimerApellido"] ." ". $vendedor["vSegundoApellido"]); ?></p>
                <p id="sucursal" class="textIncProupesta"><strong>Sucursal: </strong><?php echo e($vendedor["vOficina"]); ?></p>
                <p id="caducidad-propuesta" style="margin-left:13px; margin-top:-7px;"><strong>Validez de <u><?php echo e($expiracion["cantidad"] . " " . $expiracion["unidadMedida"]); ?></u></strong></p>
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
                    <?php if(!is_null($paneles)): ?>
                        <!-- SI LA COTIZACION TIENE *PANELES* -->
                        <tr id="desglocePanel">
                            <td>Panel</td>
                            <td><?php echo e($paneles["vMarca"]); ?></td>
                            <td><?php echo e($paneles["noModulos"]); ?></td>
                            <td><?php echo e($paneles["vNombreMaterialFot"]); ?></td>
                            <td id="costoTotalPanel"></td>
                        </tr>
                    <?php endif; ?>
                    <?php if(!is_null($inversores)): ?>
                        <!-- SI LA COTIZACION TIENE *INVERSORES* -->
                        <tr id="desgloceInversor">
                            <td>Inversor</td>
                            <td id="marcaInversor"><?php echo e($inversores["vMarca"]); ?></td>
                            <td id="cantidadInversor"><?php echo e($inversores["numeroDeInversores"]); ?></td>
                            <td id="modeloInversor"><?php echo e($inversores["vNombreMaterialFot"]); ?></td>
                            <td id="costoTotalInversor"></td>
                        </tr>
                    <?php endif; ?>
                    <?php if(!is_null($estructura["_estructuras"])): ?>
                        <!-- SI LA COTIZACION TIENE *ESTRUCTURAS* -->
                        <tr id="desgloceEstructura">
                            <td>Estructura</td>
                            <td id="marcaEstructura"><?php echo e($estructura["_estructuras"]["vMarca"]); ?></td>
                            <td id="cantidadEstructura"><?php echo e($estructura["cantidad"]); ?></td>
                            <td>Estructura de aluminio</td>
                            <td id="costoTotalEstructura"></td>
                        </tr>
                    <?php endif; ?>
                    <?php if(!is_null($agregados["_agregados"])): ?>
                        <!-- SI LA COTIZACION TIENE *ESTRUCTURAS* -->
                        <tr id="desgloceEstructura">
                            <td>Agregados</td>
                            <td></td>
                            <td></td>
                            <td><strong>Agregados (Desgloce en pag. 2)</strong></td>
                            <td></td>
                        </tr>
                    <?php endif; ?>
                    <?php if($totales["manoDeObra"] > 0): ?>
                        <!-- SI LA COTIZACION TIENE *MANO DE OBRA* -->
                        <tr id="desgloceManoDeObra">
                            <td>Mano de obra</td>
                            <td>Etesla</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php endif; ?>
                    <?php if($totales["otrosTotal"] > 0): ?>
                        <!-- SI LA COTIZACION TIENE *OTROS* -->
                        <tr>
                            <td>Material electrico</td>
                            <td>Etesla</td>
                            <td></td>
                            <td></td>
                            <td id="costoTotalOtros"></td>
                        </tr>
                    <?php endif; ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td align="center"><img src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/pdf/complementos/eu.png')))); ?>"/></td>
                        <td align="center"><img src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/pdf/complementos/mx.png')))); ?>"/></td>
                    </tr>
                    <tr style="background-color: #E8E8E8;">
                        <td><strong>Subtotal sin IVA</strong></td>
                        <td></td>
                        <td></td>
                        <td id="subtotalSinIVAUSD" align="center">$<?php echo e(number_format($totales["precio"], 2)); ?> USD</td>
                        <td id="subtotalSinIVAMXN" align="center">$<?php echo e(number_format($totales["precioMXNSinIVA"], 2)); ?> MXN</td>
                    </tr>
                    <tr style="background-color: #E8E8E8;">
                        <td><strong>Total con IVA</strong></td>
                        <td></td>
                        <td></td>
                        <td id="totalConIVAUSD" align="center">$<?php echo e(number_format($totales["precioMasIVA"], 2)); ?> USD</td>
                        <td id="totalConIVAMXN" align="center">$<?php echo e(number_format($totales["precioMXNConIVA"], 2)); ?> MXN</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Leyenda - Tipo de cambio -->
        <div id="leyendaTipoDeCambio" style="margin-left:20px; margin-right:20px;">
            <p style="font-size:11px; color: #969696;" align="center"><strong style="color: #2E2D2D;">NOTA: </strong>El tipo de cambio <strong style="color: #2E2D2D;">($<?php echo e($tipoDeCambio); ?> mxn)</strong> se tomará el reportado por Banorte a la Venta del día en que se realice cada pago. Se requiere de un 50% de anticipo a la aprobación del proyecto, 35% antes de realizar el embarque de equipos, y 15% posterior a la instalación. El proyecto se entrega preparado para conexión con CFE.</p>
        </div>
        <!-- Logotipos && garantias de las marcas de los equipos -->
        <table class="table-contenedor" style="margin-top: 5px;">
            <tr>
                <?php if(!is_null($paneles)): ?>
                    <?php ($image = $paneles['vMarca'] . '.png'); ?>
                    <td id="imgLogoPanel" align="center" style="border: none;">
                        <img style="width: 140px; height: 78px;" src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/equipos-logos/panel/' . $image)))); ?>">
                    </td>
                <?php endif; ?>
                <?php if(!is_null($inversores)): ?>
                    <?php ($image = $inversores['vMarca'] . '.jpg'); ?>
                    <td id="imgLogoInversor" align="center" style="border: none;">
                        <img style="width: 140px; height: 78px;" src="data:image/jpg;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/equipos-logos/inversor/' . $image)))); ?>">
                    </td>
                <?php endif; ?>
                <?php if(!is_null($estructura["_estructuras"])): ?>
                    <?php ($image = $estructura["_estructuras"]['vMarca'] . '.png'); ?>
                    <td id="imgLogoEstructuras" align="center" style="border: none;">
                        <img style="width: 120px; height: 78px;" src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/equipos-logos/estructura/' . $image)))); ?>">
                    </td>
                <?php endif; ?>
            </tr>
        </table>
        <!-- Fin logos/marcas equip. -->
        <hr class="linea-division" style="background-color: #5576F2; margin-top:5px;">
        <table class="table-contenedor" style="margin-top: 35px;">
            <tr>
                <td>
                    <div>
                        <div style="margin-left:32px;">
                            <img style="margin-top:18px;" src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/pdf/complementos/panel-proyecto.png')))); ?>">
                        </div>
                        <div style="margin-top:-50px; margin-left:100px;">
                            <p class="text-inferior-pag1">INCLUYE:</p>
                            <p class="text-inferior-pag1-secundary" style="margin-top:-9px; width: 65%;">*Instalación. *Servicio. *Anclaje. *Fijación. *Garantia. *Mano de obra.</p>
                        </div>
                    </div>
                </td>
                <td>
                    <div>
                        <div style="margin-left:32px;">
                            <img style="margin-top:10px;" src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/pdf/complementos/power.png')))); ?>">
                        </div>
                        <div style="margin-top: -50px; margin-left:100px;">
                            <p class="text-inferior-pag1">POTENCIA POR INSTALAR:</p>
                            <p class="text-inferior-pag1-secundary" style="margin-top:-9px;">4.43 KwP</p>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
        <div class="footer-page"></div>
        <!-- Fin pagina 1 -->

        <!-- Pagina 2 - Agregados -->
        <?php if(!is_null($agregados["_agregados"])): ?>
            <hr class="salto-pagina">

            <!-- HeaderPage -->
            <table>
                <tr>
                    <td>
                        <!-- LogoTipo Etesla -->
                        <img id="logoTipoEtesla" src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/img/etesla-logo.png')))); ?>"> 
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
                    <?php $__currentLoopData = $agregados["_agregados"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agregado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($agregado["nombreAgregado"]); ?></td>
                            <td><?php echo e($agregado["cantidadAgregado"]); ?></td>
                            <td>$ <?php echo e($agregado["precioAgregado"]); ?> MXN</td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td></td>
                        <td><strong>Costo total</strong></td>
                        <td>$ <?php echo e($agregados["costoTotal"] * $tipoDeCambio); ?> MXN</td>
                    </tr>
                </tbody>
            </table>
        <?php endif; ?>
        <!-- Fin - Pagina2 -->
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/PDFTemplates/individual.blade.php ENDPATH**/ ?>