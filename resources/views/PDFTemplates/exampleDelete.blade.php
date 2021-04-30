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
        padding:0 !important;
    }
    .table-contenedor, td, th{
        border: 1px solid black;
    }
    .table-contenedor{
        width: 100%;
        border-collapse: collapse;
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
    .texto-encabezado-pagina{
        text-align: left;
    }

    .subtitulo{
        font-family: "Lucida Console", monospace;
        font-size: 15px;
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
        <img class="img-center" src="https://etesla.mx/wp-content/uploads/2019/05/eTesla-Logo-2-01.png" style="height: 140px; width: 225px;">
    </div>
    <!-- Fin - Pagina1 -->
    <hr class="salto-pagina">
    <!-- Pagina 2 -->
    <div class="container-fluid">
        <div class="jumbotron bordeLateral" style="background-color: #fff; border-color: #8CC6F6; padding: 0; height: 16%;">
            <table class="table-contenedor">
                <tr>
                    <td>
                        <h3>¿Cuantos paneles necesito?</h3>    
                        <h1 class="texto-encabezado-pagina">Sistema Fotovoltaico interconectado a la red CFE</h1>
                    </td>
                    <td>
                        <img src="https://etesla.mx/wp-content/uploads/2019/05/eTesla-Logo-2-01.png" style="width: 25%; float: right;">
                    </td>
                </tr>
            </table>
        </div>
        <!-- Tabla desglozado propuesta -->
        <table class="table-contenedor">
            <thead style="background-color: #00A1FF;">
                <tr>
                    <th scope="col" style="border-radius: 4px;">Tipo</th>
                    <th scope="col" style="border-radius: 4px;">Marca</th>
                    <th scope="col" style="border-radius: 4px;">Cantidad</th>
                    <th scope="col" style="border-radius: 4px;">Nombre</th>
                    <th scope="col" style="border-radius: 4px;">Total</th>
                </tr>
            </thead>
            <tbody>
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
            </tbody>
        </table>
        <!-- Fin_Tabla desglozado propuesta -->
        <br>
        <!-- Tabla subtotales -->
        <table id="tblTotales" class="table-contenedor">
            <tbody style="border-top: 3px solid black;">
                <tr>
                    <th class="text-left" style="background-color: #E8E8E8;">Subtotal</th>
                    <th style="background-color: #E8E8E8;"></th>
                </tr>
                <tr>
                    <td align="center"><img src="https://img.icons8.com/color/24/000000/usa-circular.png"/></td>
                    <td align="center">$ 123 USD</td>
                </tr>
                <tr>
                    <td align="center"><img src="https://img.icons8.com/color/24/000000/mexico-circular.png"/></td>
                    <td align="center">$ 123 MXN</td>
                </tr>
                <tr>
                    <th class="text-left" style="background-color: #E8E8E8;">Total c/ IVA</th>
                    <th style="background-color: #E8E8E8;"></th>
                </tr>
                <tr>
                    <td align="center"><img src="https://img.icons8.com/color/24/000000/usa-circular.png"/></td>
                    <td align="center">$ 123 USD</td>
                </tr>
                <tr>
                    <td align="center"><img src="https://img.icons8.com/color/24/000000/mexico-circular.png"/></td>
                    <td align="center">$ 123 MXN</td>
                </tr>
            </tbody>
        </table>
        <!-- Fin_Tabla subtotales -->
        <br>
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
        <div id="garantias">
            <h5>Garantia de la marca-panel y los años de garantia que ofrece</h5>
            <h5>Garantia de la marca-inversor y los años de garantia que ofrece</h5>
            <h5>Garantia de la marca-soportes y los años de garantia que ofrece</h5>
        </div>
        <hr class="linea-division">
        <table class="table-contenedor" style="margin-top: -8px;">
            <tr style="line-height: 80%;">
                <td align="center">
                    <p><strong>TODO INCLUIDO:</strong></p>
                    <p>*Instalación. *Servicio. *Anclaje.<br>*Fijación. *Garantia. *Mano de obra.</p>
                </td>
                <td align="center" style="background-color: #DADADA;">
                    <p>KWP POR INSTALAR:</p>
                    <p id="kwpInstalados"><strong>123.4 kW</strong></p>
                </td>
                <td align="center">
                    <p>PORCENTAJE ENERGÉTICO:</p>
                    <p><strong>101.5 %</strong></p>
                </td>
            </tr>
        </table>
        <!-- FooterPagina -->
        <div class="footer-page"></div>
    </div>
    <!-- Fin - Pagina2 -->
    <hr class="salto-pagina">
    <!-- Pagina3 [ROI] -->
    <div class="jumbotron bordeLateral" style="background-color: #fff; border-color: #8DEB6A; padding: 0; height: 16%;">
        <table class="table-contenedor">
            <tr>
                <td>
                    <h3>¿Cuantos paneles necesito?</h3>    
                    <h1 class="texto-encabezado-pagina">Sistema Fotovoltaico interconectado a la red CFE</h1>
                </td>
                <td>
                    <img src="https://etesla.mx/wp-content/uploads/2019/05/eTesla-Logo-2-01.png" style="width: 25%; float: right;">
                </td>
            </tr>
        </table>
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