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
                    <img id="logoTipoEtesla" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/etesla-logo.png'))) }}"> 
                </td>
                <td>
                    <h1 style="font-size:25px; text-align:right; margin-right: 27px;">SISTEMA FOTOVOLTAICO INTERCONECTADO A LA RED DE CFE</h1>
                </td>
            </tr>
        </table>
        <img id="recuadroPaneles" src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('/img/Paneles-solares-tesla.jpg'))) }}"/>
    </div>
    <!-- Fin pagina 1 -->
</body>
</html>