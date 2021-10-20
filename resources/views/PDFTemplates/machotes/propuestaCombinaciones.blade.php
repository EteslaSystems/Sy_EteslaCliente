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
        border-radius: 1em;
        overflow: hidden;
        text-align: center;
        border: 1px;
        border-color: #DE1616;
    }

    .table-comparative th, .table-comparative td{
        border: 1px solid black; 
    }
    .imgLogos{
        height: 40px;
        width: 55px;
        margin-top: 6px;
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
    <!-- Paga # - Comparativa[combinaciones] -->
    <div class="container-fluid">
        <div style="margin-left:40px; margin-right:40px; margin-top:20px;">
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
                        <td style="border-left:0px; border-top:0px;"></td>
                        <td>
                            <div>
                                <img id="imgPanelA" class="imgLogos" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos-logos/panel/Axitec.png'))) }}">
                            </div>
                            <div>
                                <img id="imgInversorA" class="imgLogos" src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos-logos/inversor/ABB Fimer.jpg'))) }}">
                            </div>
                            <div>
                                <img id="imgEstructuraA" class="imgLogos" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos-logos/estructura/Everest.png'))) }}">
                            </div>
                        </td>
                        <td">
                            <div>
                                <img id="imgPanelB" class="imgLogos" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos-logos/panel/Axitec.png'))) }}">
                            </div>
                            <div>
                                <img id="imgInversorB" class="imgLogos" src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos-logos/inversor/ABB Fimer.jpg'))) }}">
                            </div>
                            <div>
                                <img id="imgEstructuraB" class="imgLogos" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos-logos/estructura/Everest.png'))) }}">
                            </div>
                        </td>
                        <td>
                            <div>
                                <img id="imgPanelC" class="imgLogos" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos-logos/panel/Axitec.png'))) }}">
                            </div>
                            <div>
                                <img id="imgInversorC" class="imgLogos" src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos-logos/inversor/ABB Fimer.jpg'))) }}">
                            </div>
                            <div>
                                <img id="imgEstructuraC" class="imgLogos" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos-logos/estructura/Everest.png'))) }}">
                            </div>
                        </td>
                    </tr>
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
                    <tr>
                        <td colspan="4" style="background-color:#70D85F; color:#FFFFFF;"><strong>Panel</strong></td>
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
                    <tr>
                        <td colspan="4" style="background-color:#31AEC1; color:#FFFFFF;"><strong>Inversor</strong></td>
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
                    <tr>
                        <td colspan="4" style="background-color:#C7CACA; color:#FFFFFF;"><strong>Estructura</strong></td>
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
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>