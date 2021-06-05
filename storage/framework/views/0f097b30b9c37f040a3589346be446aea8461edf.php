<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<style>
    /* Formato Paginas */
    html{
        margin: 0;
    }
    .footer-page{
        position: fixed; 
        bottom: 0cm; 
        left: 0cm; 
        right: 0cm;
        height: 4cm;

        background-image: url('https://etesla.mx/wp-content/uploads/2020/02/interconexcion.png');
        background-position: 50% 41%;
        background-repeat: no-repeat;
        background-size: cover;
        image-rendering: auto;
    }

    /* Contenedores */
    .container-fluid{
        padding: 0 !important;
    }
    .table-contenedor{
        width: 100%;
        border-collapse: collapse;
    }
    .table-contenedor th, .table-contenedor td{
        border: 1px solid black;
        text-align: center;
    }

    /*Tabla - Financiamiento*/
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

    /* [Jumbotron] Styles */
    .jumbotron{
        background: #eee;
        height: 30%;
        text-align: center;
        padding: 29px 0;
    }
    .bordeLateral{
        margin: 10px;
        border-style: solid;
        border: 5px;
        border-right: none;
        border-bottom: none;
        border-top: none;
    }

    /*Salto de pagina [hr]*/
    hr.salto-pagina{
        page-break-after: always;
        border: 0;
        margin: 0;
        padding: 0;
    }
    hr.linea-division{
        height: 6.5px;
        background-color: #61E137;
        border-style: none;
    } 

    /*Textos*/
    *{
        font-family: Helvetica, sans-serif;
    }

    .texto-encabezado-pagina{
        font-weight: bold;
        font-size: 30px;
    }
    .subtitulo{
        font-family: "Lucida Console", monospace;
        font-size: 15px;
        text-align: center;
    }
    .garantias{
        line-height: 63%;
        text-align: center;
    }
    /*Imagenes*/
    .img-center{
        display: block;
        margin-left: 290px;
        margin-top: 20px;
    }
</style>
<body>
    <!-- Pagina 1 - Portada -->
    <img src="https://drive.google.com/uc?export=view&id=13LRqh_q_IUKdrmeSTN4l-7aYP1Yt2g1R" style="max-width:100%; height: 635px;">
    <p class="subtitulo">efaesefasefasfasfasefs kWp de su sistema fotovoltaico</p>
    <div class="container-fluid" style="margin-top: -25px;">
        <h3 style="text-align: center; text-decoration: underline;">Propuesta solar</h3>
        <div class="jumbotron bordeLateral" style="border-color: #8DEB6A;">
            <h1 id="nombreCliente"><?php echo e($cliente["vNombrePersona"] ." ". $cliente["vPrimerApellido"] ." ". $cliente["vSegundoApellido"]); ?></h1>
            <p id="direccionCliente" class="subtitulo"><?php echo e($cliente["vCalle"] ." ". $cliente["vMunicipio"] ." ". $cliente["vEstado"]); ?></p>
            <p id="fechaActual" class="subtitulo"><?php echo e(now()); ?></p>
        </div>
        <img class="img-center" src="https://etesla.mx/wp-content/uploads/2019/05/eTesla-Logo-2-01.png" style="height: 140px; width: 238px;">
    </div>
    <!-- Fin - Pagina1 -->
    <hr class="salto-pagina">
    <!-- Pagina 2 -->
    <div class="container-fluid">
        <div class="bordeLateral" style="background-color: #fff; border-color: #8CC6F6; height: 13%; text-align: center;">
            <table>
                <tr>
                    <td>
                        <p class="texto-encabezado-pagina" style="font-size: 18px;">¿Cuantos paneles necesito?</p>    
                        <p class="texto-encabezado-pagina">Sistema Fotovoltaico interconectado a la red CFE</p>
                    </td>
                    <td>
                        <img src="https://etesla.mx/wp-content/uploads/2019/05/eTesla-Logo-2-01.png" style="width: 25%; float: right;">
                    </td>
                </tr>9
            </table>
        </div>
        <div style="margin-top: 10px; margin-bottom: 25px; margin-left: 25px; margin-right: 25px;">
            <!-- Tabla desglozado propuesta -->
            <table style="width: 100%; text-align: center; border-collapse: collapse; border-radius: 1em; overflow: hidden;">
                <thead style="background-color: #00A1FF;">
                    <tr>
                        <th scope="col">Tipo</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody style="border:1px solid;">
                    <tr id="desglocePanel">
                        <td>Panel</td>
                        <td><?php echo e($paneles["marca"]); ?></td>
                        <td><?php echo e($paneles["noModulos"]); ?></td>
                        <td><?php echo e($paneles["nombre"]); ?></td>
                        <td><?php echo e($paneles["costoTotal"]); ?>$</td>
                    </tr>
                    <tr id="desgloceInversor">
                        <td>Inversor</td>
                        <td><?php echo e($inversores["vMarca"]); ?></td>
                        <td><?php echo e($inversores["numeroDeInversores"]); ?></td>
                        <td><?php echo e($inversores["vNombreMaterialFot"]); ?></td>
                        <td><?php echo e($inversores["precioTotal"]); ?>$</td>
                    </tr>
                    <tr id="desgloceEstructura">
                        <td>Estructura</td>
                        <td>Supports</td>
                        <td><?php echo e($paneles["noModulos"]); ?></td>
                        <td>Estructura de aluminio</td>
                        <td><?php echo e($paneles["costoDeEstructuras"]); ?>$</td>
                    </tr>
                    <tr>
                        <td>Mano de obra</td>
                        <td>Etesla</td>
                        <td></td>
                        <td>Mano de obra para instalacion</td>
                        <td><?php echo e($totales["manoDeObra"]); ?>$</td>
                    </tr>
                    <tr>
                        <td>Material electrico</td>
                        <td>Etesla</td>
                        <td></td>
                        <td>Material electrico por sistema fotovoltaico</td>
                        <td><?php echo e($totales["otrosTotal"]); ?>$</td>
                    </tr>
                    <tr>
                        <td>Adicional</td>
                        <td>Etesla</td>
                        <td>1</td>
                        <td>Tramites CFE</td>
                        <td>$0.00</td>
                    </tr>
                    <tr>
                        <td>Adicional</td>
                        <td>Etesla</td>
                        <td>1</td>
                        <td>Servicio de UVIE y medidor<br>bidireccional para MT2</td>
                        <td>$0.00</td>
                    </tr>
                    <tr style="background-color: #E8E8E8;">
                        <td><strong>Subtotal</strong></td>
                        <td></td>
                        <td></td>
                        <td align="center"><img src="https://img.icons8.com/color/24/000000/usa-circular.png"/></td>
                        <td align="center">$<?php echo e($totales["precio"]); ?> USD</td>
                    </tr>
                    <tr style="background-color: #E8E8E8;">
                        <td><strong>Total c/ IVA</strong></td>
                        <td></td>
                        <td></td>
                        <td align="center"><img src="https://img.icons8.com/color/24/000000/mexico-circular.png"/></td>
                        <td align="center">$<?php echo e($totales["precioMXN"]); ?> MXN</td>
                    </tr>
                </tbody>
            </table>
            <!-- Fin_Tabla desglozado propuesta -->
        </div>
        <!-- Logotipos && garantias de las marcas de los equipos -->
        <table class="table-contenedor">
            <tr>
                <td id="imgLogoPanel" align="center">
                    <img src="https://drive.google.com/uc?export=view&id=<?php echo e($paneles['imgRuta']); ?>" style="width: 32%;">
                </td>
                <td id="imgLogoInversor" align="center">
                    <img src="https://drive.google.com/uc?export=view&id=<?php echo e($inversores['imgRuta']); ?>" style="width: 32%;">
                </td>
                <td id="imgLogoEstructuras" align="center">
                    <img src="https://tiendapanelsolar.mx/wp-content/uploads/2018/02/marca-everest-solar-icon.png" style="width: 32%;">
                </td>
            </tr>
        </table>
        <!-- Fin logos/marcas equip. -->
        <!-- Garantias de las marcas -->
        <div class="garantias">
            <p>Garantia en el panel <?php echo e($paneles["marca"]); ?> con <?php echo e($paneles["garantia"]); ?> años de garantia</p>
            <p>Garantia en el inversor <?php echo e($inversores["vMarca"]); ?> con <?php echo e($inversores["vGarantia"]); ?> años de garantia</p>
            <p>Garantia de 25 años en la marca de soportes <strong>Everest</strong></p>
        </div>
        <hr class="linea-division">
        <table class="table-contenedor" style="margin-top: -8px;">
            <tr style="line-height: 80%;">
                <td align="center">
                    <p style="font-size: 23px;"><strong>TODO INCLUIDO:</strong></p>
                    <p style="font-size: 18px;">*Instalación. *Servicio. *Anclaje.<br>*Fijación. *Garantia. *Mano de obra.</p>
                </td>
                <td align="center" style="background-color: #DADADA;">
                    <p style="font-size: 23px;">KWP POR INSTALAR:</p>
                    <p style="font-size: 18px;"><strong><?php echo e($paneles["potenciaReal"]); ?> Kwp</strong></p>
                </td>
                <td align="center">
                    <p>PORCENTAJE ENERGÉTICO:</p>
                    <p style="font-size: 23px;"><strong><?php echo e($power["porcentajePotencia"]); ?> %</strong></p>
                </td>
            </tr>
        </table>
        <!-- FooterPagina -->
        <div class="footer-page"></div>
    </div>
    <!-- Fin - Pagina2 -->
    <hr class="salto-pagina">
    <!-- Pagina3 [ROI] -->
    <div class="container-fluid">
        <div class="bordeLateral" style="background-color: #fff; border-color: #8DEB6A; padding: 0; height: 10%; text-align: center;">
            <table>
                <tr>
                    <td>  
                        <p class="texto-encabezado-pagina">Financiamiento y Retorno de Inversión</p>
                    </td>
                    <td>
                        <img src="https://etesla.mx/wp-content/uploads/2019/05/eTesla-Logo-2-01.png" style="width: 25%; float: right;">
                    </td>
                </tr>
            </table>
        </div>
        <!-- Tabla financiamiento -->
        <div style="margin-top: 8px; margin-bottom: 25px; margin-left: 25px; margin-right: 25px;">
            <table class="tabFinanciamiento">
                <tr>
                    <th>Pago de contado</th>
                    <td>$<?php echo e($totales["precioMXN"]); ?></td>
                    <th style="background-color: #03BABE;">Ahorro mensual<br>de luz</th>
                    <td style="background-color: #03BABE;">$<?php echo e($roi["ahorro"]["ahorroMensualEnPesosMXN"]); ?></td>
                    <th>Retorno de inversión</th>
                    <td><?php echo e($roi["roiEnAnios"]); ?> años</td>
                </tr>
            </table>
            <br>
            <table class="tabFinanciamiento">
                <tr>
                    <th>Tarjeta de credito</th>
                    <th>3 meses</th>
                    <th>6 meses</th>
                    <th>9 meses</th>
                    <th>12 meses</th>
                    <th>18 meses</th>
                </tr>
                <tr>
                    <th> Pago mensual</th>
                    <td>$<?php echo e($financiamiento["objMensualidadesCreditCard"]["tresMeses"]); ?></td>
                    <td>$<?php echo e($financiamiento["objMensualidadesCreditCard"]["seisMeses"]); ?></td>
                    <td>$<?php echo e($financiamiento["objMensualidadesCreditCard"]["nueveMeses"]); ?></td>
                    <td>$<?php echo e($financiamiento["objMensualidadesCreditCard"]["doceMeses"]); ?></td>
                    <td>$<?php echo e($financiamiento["objMensualidadesCreditCard"]["dieciochoMeses"]); ?></td>
                </tr>
            </table>
            <br>
            <table id="tabFinanciamient" class="tabFinanciamiento">
                <tr>
                    <th>Financiamiento</th>
                    <th style="background-color: #F5B070;">15%</th>
                    <th style="background-color: #F5B070;">35%</th>
                    <th style="background-color: #F5B070;">50%</th>
                </tr>
                <tr>
                    <th>Enganche</th>
                    <td>$<?php echo e($financiamiento["objEnganche"]["quincePorcent"]); ?></td>
                    <td>$<?php echo e($financiamiento["objEnganche"]["treintacincoPorcent"]); ?></td>
                    <td>$<?php echo e($financiamiento["objEnganche"]["cincuentaPorcent"]); ?></td>
                </tr>
                <tr>
                    <th>Pagos mensuales</br>por plazo</th>
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
                            
                            <?php if($financiamiento["_pagosMensualesPorPlazo"][0][$x][$porcent] > $roi["ahorro"]["ahorroMensualEnPesosMXN"] && $financiamiento["_pagosMensualesPorPlazo"][0][$x][$porcent] < ($roi["ahorro"]["ahorroMensualEnPesosMXN"] * 1.10)): ?>
                                <td id="amarillo" style="background-color:#E0D30C">$<?php echo e($financiamiento["_pagosMensualesPorPlazo"][0][$x][$porcent]); ?></td>
                            <?php elseif($financiamiento["_pagosMensualesPorPlazo"][0][$x][$porcent] <= $roi["ahorro"]["ahorroMensualEnPesosMXN"]): ?>
                                <td id="verde" style="background-color:#44C331">$<?php echo e($financiamiento["_pagosMensualesPorPlazo"][0][$x][$porcent]); ?></td>
                            <?php else: ?>
                                <td id="normal" style="background-color:#3A565E">$<?php echo e($financiamiento["_pagosMensualesPorPlazo"][0][$x][$porcent]); ?></td>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </tr>
                <?php endfor; ?>
            </table>
        </div>
        <!-- Fin_Tabla financiamiento -->

        <hr class="linea-division">
        
        <!-- ROI -->
        <table style="width:80%; border-collapse:collapse;">
            <tr style="height: 30px;">
                <td style="text-align: left; width: 25%;">  
                    <img src="https://www.pngkit.com/png/full/170-1708875_relacionado-dinero-mexico-png.png" style="width: 76%; margin-left: 30px; margin-right: 5px;">
                </td>
                <td style="background-color: #488D3E; color: #fff;">
                    <p style="font-size: 20px; display: inline-block;">RETORNO DE INVERSIÓN:</p>
                    <p style="display: inline-block;">4 años</p>
                </td>
            </tr>
        </table>
        <br>
        <!-- Grafico ROI -->
        <div class="container-fluid" style="text-align: center;">
            <!-- Eje X - Grafico Proyeccion -->
            <?php ($anioActual = now()->year); ?>
            <?php ($aniosProyeccion = []); ?>
            <?php ($aniosProyeccion[0] = $anioActual); ?>

            <?php for($i=1; $i<=10; $i++): ?>
                <?php ($aniosProyeccion[$i] = (int)$anioActual + $i); ?>
            <?php endfor; ?>

            <img style="width: 80%; height: 220px ;" src='https://quickchart.io/chart?c={
                type:"line",
                data:{
                    labels: <?php echo json_encode($aniosProyeccion, 15, 512) ?>,
                    datasets:[{
                        label:"Pago a CFE s/paneles",
                        borderColor:"red",
                        data: <?php echo json_encode($power["objConsumoEnPesos"]["_proyeccion10anios"]["_proyeccionEnDinero"], 15, 512) ?>
                    },{
                        label:"Pago a CFE c/paneles",
                        borderColor: "green",
                        data: <?php echo json_encode($power["objGeneracionEnpesos"]["_proyeccion10anios"]["_proyeccionEnDinero"], 15, 512) ?>
                    }]
                }
            }'>
        </div>
        <!-- Globos de pagina3 [viejo_pdf] -->
        <div class="container-fluid bordeLateral" style="border-color: #8DEB6A; height: 40%;">
            <table style="width:100%; height: 81px; border-collapse:collapse;">
                <tr>
                    <td style="width:100%; display:flex; justify-content:center; align-items: center; text-align:center; margin-left: 35px;">
                        <p style="font-weight: 800; color: #67B03D; margin-top: -35px; font-size: 22px; font-family: 'Segoe UI';">El sistema fotovoltaico presentado en esta propuesta, equivale a #numeroArboles# árboles plantados</p>
                    </td>
                    <td>
                        <img style="float: right;" src="https://s1.significados.com/foto/shutterstock-273030704_sm.jpg">
                    </td>
                </tr>
            </table>
        </div>
        <!-- Fin_ROI -->
    </div>
    <!-- Fin_Pagina3 -->
    <hr class="salto-pagina">
    <!-- Pagina4 [Contraportada] -->
    <img src="https://drive.google.com/uc?export=view&id=11AsS1jtmcJRVrrNYZMZihaeIb7rCJxeT" style="max-width:100%; height: 500px;">
    <div class="bordeLateral" style="border-color: #8DEB6A; border-top: 5px solid #FFFB00; margin-left: 32px; margin-top: 23px; text-align: center;">
        <div>
            <p>Deseamos que la propuesta solar presentada a su nombre:<br><strong><?php echo e($cliente["vNombrePersona"] ." ". $cliente["vPrimerApellido"] ." ". $cliente["vSegundoApellido"]); ?></strong><br>sea de su agrado, quedamos a la espera de la aceptación.</p>
        </div>
        <div style="line-height: 45%;">
            <p>ASESOR: <?php echo e($vendedor["vNombrePersona"] ." ". $vendedor["vPrimerApellido"] ." ". $vendedor["vSegundoApellido"]); ?></p>
            <br>
            <img src="https://etesla.mx/wp-content/uploads/2019/05/eTesla-Logo-2-01.png" style="width: 29%;">
            <p style="text-decoration: underline;">Comunicate con nosotros:</p>
            <p>OFICINA</p>
            <p><img src="https://img.icons8.com/ios/18/000000/cell-phone.png"/><strong>Telefono:</strong> 01 800 849 1725</p>
            <p><img src="https://img.icons8.com/ios/18/000000/domain.png"/><strong>Pagina web:</strong> https://etesla.mx/</p>
            <p><img src="https://img.icons8.com/ios/18/000000/facebook-new.png"/><strong>Facebook:</strong> @eteslasolar</p>
            <p><img src="https://img.icons8.com/ios/18/000000/instagram-new--v1.png"/><strong>Instagram:</strong> @eteslasolar</p>
        </div>
        <br>
        <p><strong>NOTA: </strong>El tipo de cambio ($<?php echo e($tipoDeCambio); ?> mxn) se tomará el reportado por Banorte a la Venta del día en que se realice cada pago. Se requiere de un 50% de anticipo a la aprobación del proyecto, 35% antes de realizar el embarque de equipos, y 15% posterior a la instalación. El proyecto se entrega preparado para conexión con CFE.</p>
    </div>
    <!-- Fin - Pagina4 -->
</body><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/PDFTemplates/exampleDelete.blade.php ENDPATH**/ ?>