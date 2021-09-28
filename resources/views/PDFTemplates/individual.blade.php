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
        margin-top: -200px;
        margin-left: 80px;
        border-radius: 15px;
        width: 360px;
        height: 225px;
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
                    <img id="logoTipoEtesla" src="data:image/jpg;base64,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"> 
                </td>
                <td>
                    <h1 style="font-size:25px; text-align:right; margin-right: 27px;">SISTEMA FOTOVOLTAICO INTERCONECTADO A LA RED DE CFE</h1>
                </td>
            </tr>
        </table>
        <img id="recuadroPaneles" src="data:image/png;base64,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"/>
        <div id="recuadroFlotante">
            <div>
                <p id="nombreCliente" class="textIncProupesta"><strong>Cliente: </strong>{{ $cliente["vNombrePersona"] ." ". $cliente["vPrimerApellido"] ." ". $cliente["vSegundoApellido"] }}</p>
                <p id="direccionCliente" class="textIncProupesta"><strong>Direccion: </strong>{{ $cliente["vCalle"] ." ". $cliente["vMunicipio"] ." ". $cliente["vEstado"] }}</p>
                <p id="fechaCreacion" class="textIncProupesta"><strong>{{ now() }}</strong></p>
                <p id="asesor" class="textIncProupesta"><strong>Asesor:</strong> {{ $vendedor["vNombrePersona"] ." ". $vendedor["vPrimerApellido"] ." ". $vendedor["vSegundoApellido"] }}</p>
                <p id="caducidad-propuesta" style="margin-left:13px;"><strong>Validez de <u>15 dias</u></strong></p>
            </div>
        </div>
        <br>
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
                    @if(!is_null($paneles))
                        <!-- SI LA COTIZACION TIENE *PANELES* -->
                        <tr id="desglocePanel">
                            <td>Panel</td>
                            <td>{{ $paneles["vMarca"] }}</td>
                            <td>{{ $paneles["noModulos"] }}</td>
                            <td>{{ $paneles["vNombreMaterialFot"] }}</td>
                            <td id="costoTotalPanel"></td>
                        </tr>
                    @endif
                    @if(!is_null($inversores))
                        <!-- SI LA COTIZACION TIENE *INVERSORES* -->
                        <tr id="desgloceInversor">
                            <td>Inversor</td>
                            <td id="marcaInversor">{{ $inversores["vMarca"] }}</td>
                            <td id="cantidadInversor">{{ $inversores["numeroDeInversores"] }}</td>
                            <td id="modeloInversor">{{ $inversores["vNombreMaterialFot"] }}</td>
                            <td id="costoTotalInversor"></td>
                        </tr>
                    @endif
                    @if(!is_null($estructura["_estructuras"]))
                        <!-- SI LA COTIZACION TIENE *ESTRUCTURAS* -->
                        <tr id="desgloceEstructura">
                            <td>Estructura</td>
                            <td id="marcaEstructura">{{ $estructura["_estructuras"]["vMarca"] }}</td>
                            <td id="cantidadEstructura">{{ $estructura["cantidad"] }}</td>
                            <td>Estructura de aluminio</td>
                            <td id="costoTotalEstructura"></td>
                        </tr>
                    @endif
                    @if(!is_null($agregados["_agregados"]))
                        <!-- SI LA COTIZACION TIENE *ESTRUCTURAS* -->
                        <tr id="desgloceEstructura">
                            <td>Agregados</td>
                            <td></td>
                            <td></td>
                            <td><strong>Agregados (Desgloce en pag. 2)</strong></td>
                            <td></td>
                        </tr>
                    @endif
                    @if($totales["manoDeObra"] > 0)
                        <!-- SI LA COTIZACION TIENE *MANO DE OBRA* -->
                        <tr id="desgloceManoDeObra">
                            <td>Mano de obra</td>
                            <td>Etesla</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endif
                    @if($totales["otrosTotal"] > 0)
                        <!-- SI LA COTIZACION TIENE *OTROS* -->
                        <tr>
                            <td>Material electrico</td>
                            <td>Etesla</td>
                            <td></td>
                            <td></td>
                            <td id="costoTotalOtros"></td>
                        </tr>
                    @endif
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td align="center"><img src="https://img.icons8.com/color/24/000000/usa-circular.png"/></td>
                        <td align="center"><img src="https://img.icons8.com/color/24/000000/mexico-circular.png"/></td>
                    </tr>
                    <tr style="background-color: #E8E8E8;">
                        <td><strong>Subtotal sin IVA</strong></td>
                        <td></td>
                        <td></td>
                        <td id="subtotalSinIVAUSD" align="center">${{ number_format($totales["precio"], 2) }} USD</td>
                        <td id="subtotalSinIVAMXN" align="center">${{ number_format($totales["precioMXNSinIVA"], 2) }} MXN</td>
                    </tr>
                    <tr style="background-color: #E8E8E8;">
                        <td><strong>Total con IVA</strong></td>
                        <td></td>
                        <td></td>
                        <td id="totalConIVAUSD" align="center">${{ number_format($totales["precioMasIVA"], 2) }} USD</td>
                        <td id="totalConIVAMXN" align="center">${{ number_format($totales["precioMXNConIVA"], 2) }} MXN</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Leyenda - Tipo de cambio -->
        <div id="leyendaTipoDeCambio" style="margin-left:20px; margin-right:20px;">
            <p style="font-size:11px; color: #969696;" align="center"><strong style="color: #2E2D2D;">NOTA: </strong>El tipo de cambio <strong style="color: #2E2D2D;">(${{ $tipoDeCambio }} mxn)</strong> se tomará el reportado por Banorte a la Venta del día en que se realice cada pago. Se requiere de un 50% de anticipo a la aprobación del proyecto, 35% antes de realizar el embarque de equipos, y 15% posterior a la instalación. El proyecto se entrega preparado para conexión con CFE.</p>
        </div>
        <!-- Logotipos && garantias de las marcas de los equipos -->
        <table class="table-contenedor" style="margin-top: -8px;">
            <tr>
                @if(!is_null($paneles))
                    <td id="imgLogoPanel" align="center" style="border: none;">
                        <img style="width: 140px; height: 78px;" src="https://drive.google.com/uc?export=view&id={{ $paneles['imgRuta'] }}">
                    </td>
                @endif
                @if(!is_null($inversores))
                    <td id="imgLogoInversor" align="center" style="border: none;">
                        <img style="width: 140px; height: 78px;" src="https://drive.google.com/uc?export=view&id={{ $inversores['imgRuta'] }}">
                    </td>
                @endif
                @if(!is_null($estructura["_estructuras"]))
                    <td id="imgLogoEstructuras" align="center" style="border: none;">
                        <img style="width: 120px; height: 78px;" src="https://drive.google.com/uc?export=view&id={{ $estructura['_estructuras']['imgRuta'] }}">
                    </td>
                @endif
            </tr>
        </table>
        <!-- Fin logos/marcas equip. -->
        <hr class="linea-division" style="background-color: #5576F2; margin-top:-8px;">
        <table class="table-contenedor" style="margin-top: 35px;">
            <tr>
                <td>
                    <div>
                        <div style="margin-left:32px;">
                            <img style="margin-top:18px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAAFA0lEQVRIibWXYWydZRXHf//nvS3TbVTZkBlmGVOGuN3ervfWudAp03XqBwOIhCwRNQHHByTpLQRinKaa+EEzvAszRoEEjSaAyYLzk6EduqAI6723652g3RJYx2A62Wwzh8h6n78f2nt7i8t604zn0/uec/7//3POe54854UFro7hvkKmlN+9ULwWAsoWH2g7x9uvAotsPnqou/DyuyLcMdw/gNxp81irzg6eY/H3wJ/FOo6Il51pu/H0pZMbifRJvDSaK3x7Ps5Uk9s7DdwoccM5FrcBbznqc3JyjKR64PTSyTOYBNFiNNQMZXPCLeEJzlULUfGTKLSGKjcrcB9UEewGPQtgPBSS+HgzlKGZoEpm50nByyEmnUnUtxBfFQwjF43vsv2NKK4CThxcv2uiGc55M84M9683/q7hSmC18aeS0LJupOuHrwNkDuYf9RR/IfqPiPd1DOf3yHxn9OOFFxeccbrU91PLZcTikFQzkhcB+2qiAKOdhdeAoSCuUFVdiMsdOJQu9j+0YGHHZI/Ec8BGV5NtwJvAFeeJXAG8SeLbgRzwAvZvL8Q95zilS/dm5bgHuOpCoAWso+BbKrld5ZphzjcO9o4IL6Bwy0WVdbwftAP4Ys1Uz/iG3w+kTi2dPIW1TcFRkZsvimbgKUcF5MeXnWlb9ofNA1PQ8I0nlkxsEFyi1rDfJm+xtg6G5RbbLdXjLTZZbJp9V7DYbljeELMWuFetYb/gkoklExtqvnqpq9JWwXPXjo2/NbZ65Ubkm0Zzu54BSA/3fV5ocyX3o6/X4jPD+Z8BjHYX7qrZOor5LxF4ZDRb+B1AR7n/M0Tvvez0kv+eWjr55xjYAvxpTsYyvaDBv324vRN4T3XR2wdqvkBoFxxrorLHDO31tyQ8D7S+0TbZKTGI1TvLCWx4/p5LEbkYPCjHHqD84tqf/Hu21G63PD6vrBkXrgtXMjvPAiPB6gnVOAhsyBYfaIOZ5koX+24SerSSbftAR2nySeDTwCsNlO0zmzzaYKsducYNrQIic6tzNfBMJdt2W0dp8qTNHYe6C3tT0+rqNexDA5Fivgf4pcVLNaTs+4XKUQzN2vgygMWv6uUzW4y7LD3cEPcx4DY0EF3M7wuoF9grgEwxf8T4ByGJ+2M1GaMlWVHJ7DxZA3cU869gvlnpLjxRs523uYb7tiF9v5IrrK7Z1pfvubwaU/+oijUBbZZ9XyVXuDZ0jvStMnwkJAxVY9IDHG4UvfXXtybAldGat7nCdIlXzmAAGOna/U/gSEA9KelpYE3nSN+qUI3aChw+uH7XUVBP7W6trbH2FR8EWpLW+ZsrVqvjQMvhNStXvMP1rMz1I10PjgNHYpUtKZleWYMAsnsQ5XQpv70OsVcBZoovpEv5OGvmOoDGWJlgsKd8d7qUb2zExdid0zF6OoreFLA54jswUpk3bK4RXDOLEUDZcKf8/1nK1IVn3GXQ1nfGGv4OEBWHhB5JAcsI4TjCoxSuv1ApL8pS8iqOy1OGE3K8M13KZ991UQB7neFESkG3O3qHTHeT0CzwV6aHAoD3AtcBpeaEOWv4SlNz9boD/R9Kgu/GvH/6lgq5Q9kHS1AfHooyDyP+5ampH1c+sfv4fJxNTZkh+Clmr8CH4qL/jNV8M8/T85XYRCr1m2Y4m/uTKOYj1tccdMHJUdFrkX9eyRXmTai5gR5eR/6FfJ7zNEcZgNeaIfwf3/sPFq92d68AAAAASUVORK5CYII=">
                        </div>
                        <div style="margin-top:-50px; margin-left:80px;">
                            <p class="text-inferior-pag1">TODO INCLUIDO:</p>
                            <p class="text-inferior-pag1-secundary" style="margin-top:-9px; width: 65%;">*Instalación. *Servicio. *Anclaje. *Fijación. *Garantia. *Mano de obra.</p>
                        </div>
                    </div>
                </td>
                <td>
                    <div>
                        <div style="margin-left:32px;">
                            <img style="margin-top:10px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAADJUlEQVRIibWVXWibVRjHf/83aaoB91UQEcVdiBZCk5mmm3i1shuHIm6s283YHMOBiYOkZSDswnozLySJm1sVZKA3Qp0iwi50XngxGGZpWpsuXih2HfgxwY91TLFpcx4vNDMVWd43bZ+78z/n/f/OeZ7nnFd0GPGJ3Bkg/T9TdTmS01uLtTt9H+4EGruU2wQ8Z9IR0GRTF41dmJ6f/339t+08OgKHIxwy7MeZ5PqzaNQ19b7K8JuSG5sbHP2znYcXmGrI4IjwxlqhW8rZ7TKLu0V7y49NYHDfRPZJ4MGlur3TqjtpRMa7Vx4/+ZMfn8CplpQG3qs9Ufy1qSVKw48YttMLeXG/PoHAj02OPNRwbqfJ29aqu7AbxvTJVDL/1ZqAnXMvYFyeSeUrTS12KbdJxn5kzwTx8l3jh7852m1wSJ7GWvVwxDLAbDX5+udrAo7e6NoHePM3132wfDNKy+w1hK0JGFka7O3WOxq9Ed4P5paiG8aDQMFnjfsqI/2YS4W80L5lexFHDd0M/zH/RqKca5ngw+lU8cKKwWBp4PxUMn9tmYrGZbb59ljcDzxt4ot2jmq3YMtUdoNr6Htn3rNXBvKf3WltvJL9GNM91f7ijnY1b3ti19BBoNuTG0qUc3uauklz1VTh1dvQ8vABzHaYEffTaO2bS0zKOCv718wgCXawOY5dPnYfsiJwfGagONvWEx8nrvYXLwIXW7XERPaCiU+b45CWzgBfPzr73emqH6of8H+jt5TpMTTYkI4BJCq5vWY8FfK85Lm95xp+fQL/nbrC3buBq7VkYbq3lOkx45Shl4O80x2BPXNDyN4HiIQip4AfItwqBPVpe51ao7eU6YmEItcbnlJdzj3g0EcybZseKEwFBQeqcSTUtQvs2l0uMrdI/TymE51AIWCqDQ1hGl+kngd+a0TXnegEGgjcW8r0CAYNfgYOeM4drsVG62sO/jvN/CLxoqDw5daT5U6hgcDg7QHuBRajdV5ZCRR8dnVf9aWNqi9cB8KI7f+8ZisKXyfWwsJuIAKcXg2obzDSEDDXuHvh+GpA/YOxzcgO12Jjt1YL/BfKPCSzGCCAUQAAAABJRU5ErkJggg==">
                        </div>
                        <div style="margin-top: -50px; margin-left:80px;">
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
        @if(!is_null($agregados["_agregados"]))
            <hr class="salto-pagina">

            <!-- HeaderPage -->
            <table>
                <tr>
                    <td>
                        <!-- LogoTipo Etesla -->
                        <img id="logoTipoEtesla" src="data:image/jpg;base64,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"> 
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
                    @foreach($agregados["_agregados"] as $agregado)
                        <tr>
                            <td>{{ $agregado["nombreAgregado"] }}</td>
                            <td>{{ $agregado["cantidadAgregado"] }}</td>
                            <td>$ {{ $agregado["precioAgregado"] }} MXN</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td><strong>Costo total</strong></td>
                        <td>$ {{ $agregados["costoTotal"] * $tipoDeCambio }} MXN</td>
                    </tr>
                </tbody>
            </table>
        @endif
        <!-- Fin - Pagina2 -->
    </div>
</body>
</html>