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
                                <a href="{{ url('editar-cliente', [$cliente->idPersona]) }}" class="btn btn-sm btn-warning" title="Editar">
                                    <img src="https://img.icons8.com/material-outlined/18/000000/multi-edit.png">
                                </a>
                            </td>
                            <td>
                                <a href="{{ url('eliminar-cliente', [$cliente->idPersona]) }}" class="btn btn-sm btn-danger" title="Eliminar">
                                    <img src="https://img.icons8.com/material-outlined/18/000000/delete-trash.png">
                                </a>
                            </td>
                        </tr>
                        @php($numeroLista = $numeroLista + 1)
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection
