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
    /*Salto de pagina*/
    hr {
        page-break-after: always;
        border: 0;
        margin: 0;
        padding: 0;
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

    /*Controles [generales - "que se ocupan en todas las hojas"]*/
    .jumbotron{
        background-color: #FFFFFF;
        border-style: solid;
        border: 5px;
        border-right: none;
        border-bottom: none;
        border-top: none;
    }

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
        <div class="jumbotron jumbotron-fluid" style="height: 50px; border-color: #8DEB6A;">
            <h1 id="nombreCliente" class="text-center">Nombre completo cliente</h1>
            <p id="direccionCliente" class="text-center subtitulo">Direccion cliente</p>
        </div>
        <div class="text-center">
            <img src="https://etesla.mx/wp-content/uploads/2019/05/eTesla-Logo-2-01.png" style="width: 33%;">
        </div>
    </div>

    <hr>
    
    <!-- Pagina 2 -->
    <div class="container">
        <div class="jumbotron jumbotron-fluid" style="height: 20px; border-color: #8CC6F6;">
            <h2 class="encabezado">Sistema Fotovoltaico<br>interconectado a la red CFE</h2>
            <img src="https://etesla.mx/wp-content/uploads/2019/05/eTesla-Logo-2-01.png" style="width: 25%; float: right;">
        </div>
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
    <br>
    <!-- Logotipos de panel e inversor -->
    <div class="grid-container">
        <div class="grid-item">
            oijfaoiefja;oisejfaoisjefeoisjfo;iasejf;oiasijef;eiaosfejsi
        </div>
        <div class="grid-item">
            oijfaoiefja;oisejfaoisjefeoisjfo;iasejf;oiasijef;eiaosfejsi
        </div>
    </div>
    <div class="footer-page"></div>

    <hr>

    <!-- Pag 3 - ROI_Financiamiento -->
    <div class="container">
        <div class="jumbotron jumbotron-fluid" style="height: 20px; border-color: #8CC6F6;">
            <h2 class="encabezado">Retorno de inversion con paneles<br>solares</h2>
            <img src="https://etesla.mx/wp-content/uploads/2019/05/eTesla-Logo-2-01.png" style="width: 25%; float: right;">
        </div>
    </div>
</body>