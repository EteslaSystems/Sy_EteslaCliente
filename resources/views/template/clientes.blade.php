@extends('roles/seller')
@section('content')
    @section('agregarClientes')
    @show
    <style>
        body {
            font-family: Helvetica;
        }
        button[aria-expanded=true] .fa-plus {
            display: none;
        }
        button[aria-expanded=false] .fa-minus {
            display: none;
        }
        .btn-link {
            text-decoration : none !important;
            color: #FFF;
        }
        .btn-link:hover {
            text-decoration : none !important;
            color: #DDD;
        }
        .card-header {
            background: rgba(0, 0, 0, 0.35);
        }
        thead {
            background: rgba(0, 0, 0, 0.20);
        }
        tbody .th-1 {
            width: 5%;
        }
        tbody .th-2 {
            width: 40%;
        }
        tbody .td-1 {
            width: 55%;
            text-align: left;
        }
        tbody .td-2 {
            width: 10%;
            background: rgba(0, 0, 0, 0.20);
        }
        tbody .td-3 {
            width: 60%;
        }
        tbody .td-4 {
            width: 30%;
        }
        .centered {
            display: flex;
        }
        .centered div {
            margin: auto auto;
        }
        .centered table {
            margin: auto auto;
        }
        .centered small {
            font-size: 10px;
        }
        .transform {
            background: rgba(0, 0, 0, 0.35);
        }

        .table-image td, th {
                vertical-align: middle;
        }
    </style>

    <div class="table-responsive-sm">
        <table class="table table-image">
            <thead>
                <tr>
                    <th class="text-left">Propuestas</th>
                    <th class="text-center">Nombre del cliente</th>
                    <th class="text-center">Opciones</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td class="td-2 text-center">
                        <button type="button" class="btn btn-info btn-sm">
                             &nbsp; <span class="badge badge-light">10</span> &nbsp;
                        </button>
                    </td>
                    
                    <td class="td-3 text-left">
                        <i class="fa fa-user-o"></i> &nbsp; Pedro Pablo Pedroza Perez
                    </td>

                    <td class="td-4 text-center">
                        <button type="button" class="btn btn-outline-info btn-sm">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> <br>
                            <small>Editar</small>
                        </button>

                        <button type="button" class="btn btn-outline-danger btn-sm">
                            <i class="fa fa-trash" aria-hidden="true"></i> <br>
                            <small>Borrar</small>
                        </button>

                        <button type="button" class="btn btn-outline-success btn-sm">
                            <i class="fa fa-eye" aria-hidden="true"></i> <br>
                            <small>Detalles</small>
                        </button>
                    </td>
                </tr>

                <tr>
                    <td class="td-2 text-center">
                        <button type="button" class="btn btn-info btn-sm">
                             &nbsp; <span class="badge badge-light">5</span> &nbsp;
                        </button>
                    </td>
                    
                    <td class="td-3 text-left">
                        <i class="fa fa-user-o"></i> &nbsp; Miriam Lopez Montosa
                    </td>

                    <td class="td-4 text-center">
                        <button type="button" class="btn btn-outline-info btn-sm">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> <br>
                            <small>Editar</small>
                        </button>

                        <button type="button" class="btn btn-outline-danger btn-sm">
                            <i class="fa fa-trash" aria-hidden="true"></i> <br>
                            <small>Borrar</small>
                        </button>

                        <button type="button" class="btn btn-outline-success btn-sm">
                            <i class="fa fa-eye" aria-hidden="true"></i> <br>
                            <small>Detalles</small>
                        </button>
                    </td>
                </tr>

                <tr>
                    <td class="td-2 text-center">
                        <button type="button" class="btn btn-info btn-sm">
                             &nbsp; <span class="badge badge-light">24</span> &nbsp;
                        </button>
                    </td>
                    
                    <td class="td-3 text-left">
                        <i class="fa fa-user-o"></i> &nbsp; Arnulfo Cerón Gutierrez
                    </td>

                    <td class="td-4 text-center">
                        <button type="button" class="btn btn-outline-info btn-sm">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> <br>
                            <small>Editar</small>
                        </button>

                        <button type="button" class="btn btn-outline-danger btn-sm">
                            <i class="fa fa-trash" aria-hidden="true"></i> <br>
                            <small>Borrar</small>
                        </button>

                        <button type="button" class="btn btn-outline-success btn-sm">
                            <i class="fa fa-eye" aria-hidden="true"></i> <br>
                            <small>Detalles</small>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
