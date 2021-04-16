<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600&display=swap" rel="stylesheet">
</head>
<style>
    /*Paginas*/
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
    /*Salto de pagina [hr]*/
    hr.salto-pagina{
        page-break-after: always;
        border: 0;
        margin: 0;
        padding: 0;
    }
    /*Linea divisora [hr]*/   
    hr.linea-division{
        height: 5px;
        background-color: #61E137;
    } 
    /*-----[Jumbotron]------*/
    .headerPage{
        background-color: #FFFFFF;
        border-style: solid;
        border: 5px;
        border-right: none;
        border-bottom: none;
        border-top: none;
    }
    .divROI{
        float: left; 
        padding: 8px;
    }
    /* Tabla desgloce de propuesta */
    table thead{
        color: white;
        text-align: center;
    }

    table tbody{
        text-align: center;
    }

    #tblTotales tbody{
        text-align: right;
    }
    /* Tabla Financiamiento [ROI] */
    .tabFinanciamiento {
            background-color: #3A565E;
            border-collapse: collapse;
            border-radius: 20px;
            overflow: hidden;
        }
    
    .tabFinanciamientothtd{
        border: 3px solid white;
        color: white;
    }

    /*-----------*/
    /*      Texto       */
    .subtitulo{
        font-family: "Lucida Console", monospace;
        font-size: 15px;
    }

    .encabezado{
        float: left;
    }
</style>
<body>
    <!-- Pagina 1 -->
    <img src="https://i.pinimg.com/originals/0c/bc/a1/0cbca13e291164dc93e1555a5c70a803.jpg">
    <p class="text-center subtitulo">efaesefasefasfasfasefs kWp de su sistema fotovoltaico</p>
    <div class="container">
        <h3 class="text-center" style="text-decoration: underline;">Propuesta solar</h3>
        <div class="jumbotron jumbotron-fluid headerPage" style="height: 50px; border-color: #8DEB6A;">
            <h1 id="nombreCliente" class="text-center">Nombre completo cliente</h1>
            <p id="direccionCliente" class="text-center subtitulo">Direccion cliente</p>
        </div>
        <div class="text-center">
            <img src="https://etesla.mx/wp-content/uploads/2019/05/eTesla-Logo-2-01.png" style="width: 29%;">
        </div>
    </div>

    <hr class="salto-pagina">
    
    <!-- Pagina 2 -->
    <div class="container-fluid">
        <div class="jumbotron jumbotron-fluid headerPage" style="height: 20px; border-color: #8CC6F6;">
            <h2 class="encabezado">Sistema Fotovoltaico<br>interconectado a la red CFE</h2>
            <img src="https://etesla.mx/wp-content/uploads/2019/05/eTesla-Logo-2-01.png" style="width: 25%; float: right;">
        </div>

        <!-- Tabla de desgloce propuesta -->
        <table id="tblConceptosCotizacion" class="table table-sm table-striped">
            <thead style="background-color: #41739C;">
                <tr>
                    <th scope="col">Tipo</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Total</th>
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
        <br>
        <!-- Tabla totales/subtotales -->
        <table id="tblTotales" class="table table-sm">
            <tbody style="border-top: 3px solid black;">
                <tr>
                    <th class="text-left" style="background-color: #E8E8E8;">Subtotal</th>
                    <th style="background-color: #E8E8E8;"></th>
                </tr>
                <tr>
                    <td><img src="https://img.icons8.com/color/24/000000/usa-circular.png"/></td>
                    <td>$ 123 USD</td>
                </tr>
                <tr>
                    <td><img src="https://img.icons8.com/color/24/000000/mexico-circular.png"/></td>
                    <td>$ 123 MXN</td>
                </tr>
                <tr>
                    <th class="text-left" style="background-color: #E8E8E8;">Total c/ IVA</th>
                    <th style="background-color: #E8E8E8;"></th>
                </tr>
                <tr>
                    <td><img src="https://img.icons8.com/color/24/000000/usa-circular.png"/></td>
                    <td>$ 123 USD</td>
                </tr>
                <tr>
                    <td><img src="https://img.icons8.com/color/24/000000/mexico-circular.png"/></td>
                    <td>$ 123 MXN</td>
                </tr>
            </tbody>
        </table>
        <!-- Logotipos de panel e inversor -->
        
        <div class="footer-page"></div>
    </div>

    <hr class="salto-pagina">

    <!-- Pag 3 - ROI_Financiamiento -->
    <div class="container-fluid">
        <div class="jumbotron jumbotron-fluid headerPage" style="height: 20px; border-color: #8CC6F6;">
            <h2 class="encabezado">Retorno de inversion con paneles<br>solares</h2>
            <img src="https://etesla.mx/wp-content/uploads/2019/05/eTesla-Logo-2-01.png" style="width: 25%; float: right;">
        </div>
        <!-- Tablas financiamiento -->
        <table class="table table-sm tabFinanciamiento">
            <tr>
                <th class="tabFinanciamientothtd">Pago de contado</th>
                <td class="tabFinanciamientothtd">$10000</td>
                <th class="tabFinanciamientothtd" style="background-color: #03BABE;">Ahorro mensual de luz</th>
                <td id="tdAhorroMensual" class="tabFinanciamientothtd" style="background-color: #03BABE;">$123456</td>
                <th class="tabFinanciamientothtd">Retorno de inversión</th>
                <td class="tabFinanciamientothtd">10 años</td>
            </tr>
        </table>   
        <table class="table table-sm tabFinanciamiento">
            <tr>
                <th class="text-center tabFinanciamientothtd">Tarjeta de credito</th>
                <th class="text-center tabFinanciamientothtd">3 meses</th>
                <th class="text-center tabFinanciamientothtd">6 meses</th>
                <th class="text-center tabFinanciamientothtd">9 meses</th>
                <th class="text-center tabFinanciamientothtd">12 meses</th>
                <th class="text-center tabFinanciamientothtd">18 meses</th>
            </tr>
            <tr>
                <th class="text-center tabFinanciamientothtd"> Pago mensual</th>
                <td class="text-center tabFinanciamientothtd">$ 123987</td>
                <td class="text-center tabFinanciamientothtd">$ 123987</td>
                <td class="text-center tabFinanciamientothtd">$ 123987</td>
                <td class="text-center tabFinanciamientothtd">$ 123987</td>
                <td class="text-center tabFinanciamientothtd">$ 123987</td>
            </tr>
        </table>
        <table class="table table-sm tabFinanciamiento">
            <tr>
                <th class="text-center tabFinanciamientothtd">Financiamiento</th>
                <th class="text-center tabFinanciamientothtd">15%</th>
                <th class="text-center tabFinanciamientothtd">35%</th>
                <th class="text-center tabFinanciamientothtd">50%</th>
            </tr>
            <tr>
                <th class="text-center tabFinanciamientothtd">Enganche</th>
                <td class="text-center tabFinanciamientothtd">$ 887987</td>
                <td class="text-center tabFinanciamientothtd">$ 887987</td>
                <td class="text-center tabFinanciamientothtd">$ 887987</td>
            </tr>
        </table>
        <table id="tabFinanciamient" class="table table-sm tabFinanciamiento">
            <tr>
                <th class="tabFinanciamientothtd">Pagos mensuales</br>por plazo</th>
                <th class="text-center align-middle tabFinanciamientothtd">15%</th>
                <th class="text-center align-middle tabFinanciamientothtd">35%</th>
                <th class="text-center align-middle tabFinanciamientothtd">50%</th>
            </tr>
            <tr>
                <th class="tabFinanciamientothtd">A 12 meses</th>
                <td id="doce_15" class="text-center tabFinanciamientothtd">$ 543678</td>
                <td id="doce_35" class="text-center tabFinanciamientothtd">$ 543678</td>
                <td id="doce_50" class="text-center tabFinanciamientothtd">$ 543678</td>
            </tr>
            <tr>
                <th class="tabFinanciamientothtd">A 24 meses</th>
                <td id="veinticuatro_15" class="text-center tabFinanciamientothtd">$ 543678</td>
                <td id="veinticuatro_35" class="text-center tabFinanciamientothtd">$ 543678</td>
                <td id="veinticuatro_50" class="text-center tabFinanciamientothtd">$ 543678</td>
            </tr>
            <tr>
                <th class="tabFinanciamientothtd">A 36 meses</th>
                <td id="treintaseis_15" class="text-center tabFinanciamientothtd">$ 543678</td>
                <td id="treintaseis_35" class="text-center tabFinanciamientothtd">$ 543678</td>
                <td id="treintaseis_50" class="text-center tabFinanciamientothtd">$ 543678</td>
            </tr>
            <tr>
                <th class="tabFinanciamientothtd">A 48 meses</th>
                <td id="cuarentaocho_15" class="text-center tabFinanciamientothtd">$ 543678</td>
                <td id="cuarentaocho_35" class="text-center tabFinanciamientothtd">$ 543678</td>
                <td id="cuarentaocho_50" class="text-center tabFinanciamientothtd">$ 543678</td>
            </tr>
            <tr>
                <th class="tabFinanciamientothtd">A 60 meses</th>
                <td id="sesenta_15" class="text-center tabFinanciamientothtd">$ 543678</td>
                <td id="sesenta_35" class="text-center tabFinanciamientothtd">$ 543678</td>
                <td id="sesenta_50" class="text-center tabFinanciamientothtd">$ 543678</td>
            </tr>
            <tr>
                <th class="tabFinanciamientothtd">A 72 meses</th>
                <td id="setentados_15" class="text-center tabFinanciamientothtd">$ 543678</td>
                <td id="setentados_35" class="text-center tabFinanciamientothtd">$ 543678</td>
                <td id="setentados_50" class="text-center tabFinanciamientothtd">$ 543678</td>
            </tr>
            <tr>
                <th class="tabFinanciamientothtd">A 84 meses</th>
                <td id="ochentacuatro_15" class="text-center tabFinanciamientothtd">$ 543678</td>
                <td id="ochentacuatro_35" class="text-center tabFinanciamientothtd">$ 543678</td>
                <td id="ochentacuatro_50" class="text-center tabFinanciamientothtd">$ 543678</td>
            </tr>
        </table>
        <hr class="linea-division">
        <div class="divROI">
            <img src="https://www.pngkit.com/png/full/170-1708875_relacionado-dinero-mexico-png.png" width="185px" height="100px">
        </div>
        <div class="divROI">
            <h5 class="text-center">RETORNO<br>DE INVERSION:</h5>
            <h1 style="text-align: center;"><strong>7 años</strong></h1>
        </div>
    </div>
</body><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/PDFTemplates/exampleDelete.blade.php ENDPATH**/ ?>