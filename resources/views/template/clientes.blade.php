@extends('roles/seller')
@section('content')
    @section('agregarClientes')
    @show
    <div class="table-responsive-sm">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Telefono</th>
                    <th>Celular</th>
                    <th>Email</th>
                    <th style="text-align:center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($consultarClientes))
                    @php($numeroLista = 1)
                    @foreach($consultarClientes as $cliente)
                        <tr>
                            <th>{{$numeroLista}}</th>
                            <td>{{$cliente->vNombrePersona}}&nbsp;{{$cliente->vPrimerApellido}}&nbsp;{{$cliente->vSegundoApellido}}</td>
                            <td>{{$cliente->vCalle}},&nbsp;{{$cliente->vMunicipio}},&nbsp;{{$cliente->vEstado}}</td>
                            <td>{{$cliente->vTelefono}}</td>
                            <td>{{$cliente->vCelular}}</td>
                            <td>{{$cliente->vEmail}}</td>
                            <td>
                                <button id="btnEdit" class="btn btn-lg btn-warning" title="editar"><img src="https://img.icons8.com/material-outlined/18/000000/multi-edit.png"></button>
                            </td>
                            <td>
                                <button id="btnExc" class="btn btn-lg btn-danger" title="eliminar"><img src="https://img.icons8.com/material-outlined/18/000000/delete-trash.png"></button>
                            </td>
                        </tr>
                        @php($numeroLista = $numeroLista + 1)
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection
