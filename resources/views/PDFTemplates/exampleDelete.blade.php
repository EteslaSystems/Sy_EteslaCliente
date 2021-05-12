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
            <h1 id="nombreCliente">Nombre completo cliente</h1>
            <p id="direccionCliente" class="subtitulo">Direccion cliente</p>
            <p id="fechaActual" class="subtitulo">Fecha de hoy</p>
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
                    <tr>
                        <td>Mano de obra</td>
                        <td>Etesla</td>
                        <td></td>
                        <td>Mano de obra para instalacion</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Material electrico</td>
                        <td>Etesla</td>
                        <td></td>
                        <td>Material electrico por sistema fotovoltaico</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Adicional</td>
                        <td>Etesla</td>
                        <td>1</td>
                        <td>Tramites CFE</td>
                        <td>$0.00 MXN</td>
                    </tr>
                    <tr>
                        <td>Adicional</td>
                        <td>Etesla</td>
                        <td>1</td>
                        <td>Servicio de UVIE y medidor<br>bidireccional para MT2</td>
                        <td>$70000.00</td>
                    </tr>
                    <tr style="background-color: #E8E8E8;">
                        <td><strong>Subtotal</strong></td>
                        <td></td>
                        <td></td>
                        <td align="center"><img src="https://img.icons8.com/color/24/000000/usa-circular.png"/></td>
                        <td align="center">$ 123 USD</td>
                    </tr>
                    <tr style="background-color: #E8E8E8;">
                        <td><strong>Total c/ IVA</strong></td>
                        <td></td>
                        <td></td>
                        <td align="center"><img src="https://img.icons8.com/color/24/000000/mexico-circular.png"/></td>
                        <td align="center">$ 123 MXN</td>
                    </tr>
                </tbody>
            </table>
            <!-- Fin_Tabla desglozado propuesta -->
        </div>
        <!-- Logotipos && garantias de las marcas de los equipos -->
        <table class="table-contenedor">
            <tr>
                <td id="imgLogoPanel" align="center">
                    <img src="https://etesla.mx/wp-content/uploads/2019/05/eTesla-Logo-2-01.png" style="width: 32%;">
                </td>
                <td id="imgLogoInversor" align="center">
                    <img src="https://etesla.mx/wp-content/uploads/2019/05/eTesla-Logo-2-01.png" style="width: 32%;">
                </td>
                <td id="imgLogoEstructuras" align="center">
                    <img src="https://etesla.mx/wp-content/uploads/2019/05/eTesla-Logo-2-01.png" style="width: 32%;">
                </td>
            </tr>
        </table>
        <!-- Fin logos/marcas equip. -->
        <!-- Garantias de las marcas -->
        <div class="garantias">
            <p>Garantia de la marca-panel y los años de garantia que ofrece</p>
            <p>Garantia de la marca-inversor y los años de garantia que ofrece</p>
            <p>Garantia de la marca-soportes y los años de garantia que ofrece</p>
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
                    <p style="font-size: 18px;"><strong>123.4 kW</strong></p>
                </td>
                <td align="center">
                    <p>PORCENTAJE ENERGÉTICO:</p>
                    <p style="font-size: 23px;"><strong>101.5 %</strong></p>
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
                    <td>$10000</td>
                    <th style="background-color: #03BABE;">Ahorro mensual<br>de luz</th>
                    <td style="background-color: #03BABE;">$123456</td>
                    <th>Retorno de inversión</th>
                    <td>10 años</td>
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
                    <td>$ 123987</td>
                    <td>$ 123987</td>
                    <td>$ 123987</td>
                    <td>$ 123987</td>
                    <td>$ 123987</td>
                </tr>
            </table>
            <br>
            <table id="tabFinanciamient" class="tabFinanciamiento">
                <tr>
                    <th>Financiamiento</th>
                    <th>15%</th>
                    <th>35%</th>
                    <th>50%</th>
                </tr>
                <tr>
                    <th>Enganche</th>
                    <td>$ 887987</td>
                    <td>$ 887987</td>
                    <td>$ 887987</td>
                </tr>
                <tr>
                    <th>Pagos mensuales</br>por plazo</th>
                    <th>15%</th>
                    <th>35%</th>
                    <th>50%</th>
                </tr>
                <tr>
                    <th>A 12 meses</th>
                    <td id="doce_15">$ 543678</td>
                    <td id="doce_35">$ 543678</td>
                    <td id="doce_50">$ 543678</td>
                </tr>
                <tr>
                    <th>A 24 meses</th>
                    <td id="veinticuatro_15">$ 543678</td>
                    <td id="veinticuatro_35">$ 543678</td>
                    <td id="veinticuatro_50">$ 543678</td>
                </tr>
                <tr>
                    <th>A 36 meses</th>
                    <td id="treintaseis_15">$ 543678</td>
                    <td id="treintaseis_35">$ 543678</td>
                    <td id="treintaseis_50">$ 543678</td>
                </tr>
                <tr>
                    <th>A 48 meses</th>
                    <td id="cuarentaocho_15">$ 543678</td>
                    <td id="cuarentaocho_35">$ 543678</td>
                    <td id="cuarentaocho_50">$ 543678</td>
                </tr>
                <tr>
                    <th>A 60 meses</th>
                    <td id="sesenta_15">$ 543678</td>
                    <td id="sesenta_35">$ 543678</td>
                    <td id="sesenta_50">$ 543678</td>
                </tr>
                <tr>
                    <th>A 72 meses</th>
                    <td id="setentados_15">$ 543678</td>
                    <td id="setentados_35">$ 543678</td>
                    <td id="setentados_50">$ 543678</td>
                </tr>
                <tr>
                    <th>A 84 meses</th>
                    <td id="ochentacuatro_15">$ 543678</td>
                    <td id="ochentacuatro_35">$ 543678</td>
                    <td id="ochentacuatro_50">$ 543678</td>
                </tr>
            </table>
        </div>
        <!-- Fin_Tabla financiamiento -->

        <hr class="linea-division">
        
        <!-- ROI -->
        <div class="container-fluid">
            <table style="width:100%; border-collapse:collapse;">
                <tr style="height: 30px;">
                    <td style="text-align: left; width: 25%;">  
                        <img src="https://www.pngkit.com/png/full/170-1708875_relacionado-dinero-mexico-png.png" style="width: 76%; margin-left: 30px; margin-right: 5px;">
                    </td>
                    <td style="background-color: #488D3E; color: #fff;">
                        <p style="font-size: 20px;">RETORNO DE INVERSIÓN</p>
                        <p style="font-size: 15px;"><strong>3 años</strong></p>
                    </td>
                </tr>
            </table>
        </div>
        <br>
        <!-- Grafico ROI -->
        <div class="container-fluid" style="text-align: center;">
            <img style="width: 100%; height: 250px ;" src="https://quickchart.io/chart?c={
                type:'line',
                data:{
                    labels:[2012,2013,2014,2015,2016],
                    datasets:[{
                        label:'Costo s/paneles',
                        borderColor:'red',
                        backgroundColor: 'rgba(237,180,180,1)',
                        data:[90,60,50,80,20]
                    },{
                        label:'Costo c/paneles',
                        borderColor: 'green',
                        backgroundColor: 'rgba(42,173,40,0.4)',
                        data:[100,50,40,130,100]
                    }]
                }
            }">
        </div>
        <!-- Globos de pagina3 [viejo_pdf] -->
        <div class="container-fluid">
            <table style="width:100%; border-collapse:collapse;">
                <tr>
                    <td style="text-align: center;">  
                        <img src="https://www.pngkit.com/png/full/170-1708875_relacionado-dinero-mexico-png.png" style="width: 76%; margin-left: 30px; margin-right: 5px;">
                    </td>
                    <td>
                        <img src="https://www.pngkit.com/png/full/170-1708875_relacionado-dinero-mexico-png.png" style="width: 76%; margin-left: 30px; margin-right: 5px;">
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
            <p>Deseamos que la propuesta solar presentada a su nombre:<br><strong>NOMBRE DEL CLIENTE</strong><br>sea de su agrado, quedamos a la espera de la aceptación.</p>
        </div>
        <div style="line-height: 45%;">
            <p>ASESOR: NOMBRE DEL ASESOR</p>
            <br>
            <img src="https://etesla.mx/wp-content/uploads/2019/05/eTesla-Logo-2-01.png" style="width: 29%;">
            <p style="text-decoration: underline;">Comunicate con nosotros:</p>
            <p>OFICINA</p>
            <p><img src="https://img.icons8.com/ios/18/000000/cell-phone.png"/>Telefono: 01 800 849 1725</p>
            <p><img src="https://img.icons8.com/ios/18/000000/domain.png"/>Pagina web: https://etesla.mx/</p>
            <p><img src="https://img.icons8.com/ios/18/000000/facebook-new.png"/>Facebook: @eteslasolar</p>
            <p><img src="https://img.icons8.com/ios/18/000000/instagram-new--v1.png"/>Instagram: @eteslasolar</p>
        </div>
        <br>
        <p><strong>NOTA: </strong>El tipo de cambio ($20.30mxn) se tomará el reportado por Banorte a la Venta del día en que se realice cada pago. Se requiere de un 50% de anticipo a la aprobación del proyecto, 35% antes de realizar el embarque de equipos, y 15% posterior a la instalación. El proyecto se entrega preparado para conexión con CFE.</p>
    </div>
    <!-- Fin - Pagina4 -->
</body>