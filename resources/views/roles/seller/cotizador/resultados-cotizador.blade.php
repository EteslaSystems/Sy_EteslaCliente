@extends('roles/seller/cotizador/cotizador')
@section('cotizadores')
    <br>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <table class="table table-hover table-sm table-striped">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th scope="col" colspan="2">Resumen General</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    <b>Potencia</b>
                                </td>

                                <td>@result</td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Paneles</b>
                                </td>

                                <td>@result</td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Inversor</b>
                                </td>

                                <td>@result</td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Precio sin IVA (USD)</b>
                                </td>

                                <td>@result</td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Precio con IVA (MXN)</b>
                                </td>

                                <td>@result</td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Costo por Watt</b>
                                </td>

                                <td>@result</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-4">
                    <table class="table table-hover table-sm table-striped">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th scope="col" colspan="2">Resumen Economico</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    <b>Precio con IVA (USD)</b>
                                </td>

                                <td>@result</td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Precio sin IVA (MXN)</b>
                                </td>

                                <td>@result</td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Promedio de pago anterior</b>
                                </td>

                                <td>@result</td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Promedio del nuevo pago</b>
                                </td>

                                <td>@result</td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Ahorro mensual</b>
                                </td>

                                <td>@result</td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Ahorro anual</b>
                                </td>

                                <td>@result</td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Viaticos </b>
                                </td>

                                <td>@result</td>
                            </tr>
                            <tr>
                                <td>
                                    <b>ROI bruto</b>
                                </td>

                                <td>@result</td>
                            </tr>
                            <tr>
                                <td>
                                    <b>ROI con deducción</b>
                                </td>

                                <td>@result</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-4">
                    <table class="table table-hover table-sm table-striped">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th scope="col" colspan="2">Resumen General</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td colspan="2">
                                    <div class="range-wrap">
                                        <div class="range-value" id="rangeV-1"></div>
                                        <input id="range-1" type="range" min="0" max="200" value="100" step="1">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="range-wrap">
                                        <div class="range-value" id="rangeV-2"></div>
                                        <input id="range-2" type="range" min="0" max="200" value="100" step="1">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="range-wrap">
                                        <div class="range-value" id="rangeV-3"></div>
                                        <input id="range-3" type="range" min="-30" max="50" value="0" step="1">
                                    </div>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td>
                                    <button class="btn btn-sm btn-success" style="margin-top: 10px; margin-bottom: 10px;">
                                        GUARDAR Y CREAR PDF
                                    </button>
                                </td>

                                <td>
                                    <button class="btn btn-sm btn-info" style="margin-top: 10px; margin-bottom: 10px;">
                                        MODIFICAR RESULTADOS
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-8">
                    <table class="table table-hover table-sm table-striped">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th scope="col" colspan="2">Resumen Técnico</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    <b>Modelo de paneles</b>
                                </td>

                                <td>@result</td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Modelo de inversor</b>
                                </td>

                                <td>@result</td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Series X paralelos</b>
                                </td>

                                <td>@result</td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Irradiación</b>
                                </td>

                                <td>@result</td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Consumo mensual</b>
                                </td>

                                <td>@result</td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Generación mensual</b>
                                </td>

                                <td>@result</td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Nuevo consumo mensual</b>
                                </td>

                                <td>@result</td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Porcentaje de generación</b>
                                </td>

                                <td>@result</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-4">
                    <table class="table table-hover table-sm table-striped">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th scope="col" colspan="2">Testeo php</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    <b>Hospedaje</b>
                                </td>

                                <td>@result</td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Comida</b>
                                </td>

                                <td>@result</td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Pasaje</b>
                                </td>

                                <td>@result</td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Otros viaticos</b>
                                </td>

                                <td>@result</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        const
            range1 = document.getElementById('range-1'),
            rangeV1 = document.getElementById('rangeV-1'),
            setValue1 = ()=>{
                const
                    newValue1 = Number( (range1.value - range1.min) * 100 / (range1.max - range1.min) ),
                    newPosition1 = 10 - (newValue1 * 0.2);
                rangeV1.innerHTML = `<span><b>Propuesta:</b> ${range1.value}</span>`;
                rangeV1.style.left = `calc(${newValue1}% + (${newPosition1}px))`;
            };
        document.addEventListener("DOMContentLoaded", setValue1);
        range1.addEventListener('input', setValue1);
    </script>

    <script type="text/javascript">
        const
            range2 = document.getElementById('range-2'),
            rangeV2 = document.getElementById('rangeV-2'),
            setValue2 = ()=>{
                const
                    newValue2 = Number( (range2.value - range2.min) * 100 / (range2.max - range2.min) ),
                    newPosition2 = 10 - (newValue2 * 0.2);
                rangeV2.innerHTML = `<span><b>Potencia:</b> ${range2.value}</span>`;
                rangeV2.style.left = `calc(${newValue2}% + (${newPosition2}px))`;
            };
        document.addEventListener("DOMContentLoaded", setValue2);
        range2.addEventListener('input', setValue2);
    </script>

    <script type="text/javascript">
        const
            range3 = document.getElementById('range-3'),
            rangeV3 = document.getElementById('rangeV-3'),
            setValue3 = ()=>{
                const
                    newValue3 = Number( (range3.value - range3.min) * 100 / (range3.max - range3.min) ),
                    newPosition3 = 10 - (newValue3 * 0.2);
                rangeV3.innerHTML = `<span><b>Descuento:</b> ${range3.value}</span>`;
                rangeV3.style.left = `calc(${newValue3}% + (${newPosition3}px))`;
            };
        document.addEventListener("DOMContentLoaded", setValue3);
        range3.addEventListener('input', setValue3);
    </script>
@endsection