@extends('roles/seler')
@section('inicioS')
    <div class="hr-sect"> PROPUESTAS DEL CLIENTE </div>

    <div id="accordion">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <i class="fa fa-plus"></i>
                        <i class="fa fa-minus"></i>

                        &nbsp; Propuesta para el cliente #1
                    </button>
                </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9 centered">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th class="th-1 text-center">
                                            <i class="fa fa-info"></i>
                                        </th>

                                        <th class="th-2 text-left">
                                            Folio de la propuesta:
                                        </th>

                                        <td class="td-1 text-left">
                                            130420-PROP
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="th-1 text-center">
                                            <i class="fa fa-calendar"></i>
                                        </th>

                                        <th class="th-2 text-left">
                                            Fecha de generación:
                                        </th>

                                        <td class="td-1 text-left">
                                            13 de Abril del 2020
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="th-1 text-center">
                                            <i class="fa fa-money"></i>
                                        </th>

                                        <th class="th-2 text-left">
                                            Presupuesto generado:
                                        </th>

                                        <td class="td-1 text-left">
                                            $ 1,500.00 (MXN)
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-3 centered">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <button type="button" class="btn btn-outline-primary btn-lg">
                                    <i class="fa fa-folder-open-o" aria-hidden="true"></i> <br>
                                    <small>Abrir</small>
                                </button>

                                <button type="button" class="btn btn-outline-success btn-lg">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> <br>
                                    <small>Editar</small>
                                </button>

                                <button type="button" class="btn btn-outline-danger btn-lg">
                                    <i class="fa fa-trash" aria-hidden="true"></i> <br>
                                    <small>Borrar</small>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        <i class="fa fa-minus" aria-hidden="true"></i>

                        &nbsp; Propuesta para el cliente #2
                    </button>
                </h5>
            </div>

            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9 centered">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th class="th-1 text-center">
                                            <i class="fa fa-info"></i>
                                        </th>

                                        <th class="th-2 text-left">
                                            Folio de la propuesta:
                                        </th>

                                        <td class="td-1 text-left">
                                            130420-PROP
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="th-1 text-center">
                                            <i class="fa fa-calendar"></i>
                                        </th>

                                        <th class="th-2 text-left">
                                            Fecha de generación:
                                        </th>

                                        <td class="td-1 text-left">
                                            13 de Abril del 2020
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="th-1 text-center">
                                            <i class="fa fa-money"></i>
                                        </th>

                                        <th class="th-2 text-left">
                                            Presupuesto generado:
                                        </th>

                                        <td class="td-1 text-left">
                                            $ 1,500.00 (MXN)
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-3 centered">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <button type="button" class="btn btn-outline-primary btn-lg">
                                    <i class="fa fa-folder-open-o" aria-hidden="true"></i> <br>
                                    <small>Abrir</small>
                                </button>

                                <button type="button" class="btn btn-outline-success btn-lg">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> <br>
                                    <small>Editar</small>
                                </button>

                                <button type="button" class="btn btn-outline-danger btn-lg">
                                    <i class="fa fa-trash" aria-hidden="true"></i> <br>
                                    <small>Borrar</small>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        <i class="fa fa-minus" aria-hidden="true"></i>

                        &nbsp; Propuesta para el cliente #3
                    </button>
                </h5>
            </div>

            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9 centered">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th class="th-1 text-center">
                                            <i class="fa fa-info"></i>
                                        </th>

                                        <th class="th-2 text-left">
                                            Folio de la propuesta:
                                        </th>

                                        <td class="td-1 text-left">
                                            130420-PROP
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="th-1 text-center">
                                            <i class="fa fa-calendar"></i>
                                        </th>

                                        <th class="th-2 text-left">
                                            Fecha de generación:
                                        </th>

                                        <td class="td-1 text-left">
                                            13 de Abril del 2020
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="th-1 text-center">
                                            <i class="fa fa-money"></i>
                                        </th>

                                        <th class="th-2 text-left">
                                            Presupuesto generado:
                                        </th>

                                        <td class="td-1 text-left">
                                            $ 1,500.00 (MXN)
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-3 centered">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <button type="button" class="btn btn-outline-primary btn-lg">
                                    <i class="fa fa-folder-open-o" aria-hidden="true"></i> <br>
                                    <small>Abrir</small>
                                </button>

                                <button type="button" class="btn btn-outline-success btn-lg">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> <br>
                                    <small>Editar</small>
                                </button>

                                <button type="button" class="btn btn-outline-danger btn-lg">
                                    <i class="fa fa-trash" aria-hidden="true"></i> <br>
                                    <small>Borrar</small>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection