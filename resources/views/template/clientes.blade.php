@extends('roles/seller')
@section('content')
@section('agregarClientes')
@show
    <div class="container-fluid">
        @if(@isset($consultarClientes))
            @unless($consultarClientes)
                <h1>No cuenta con clientes registrados!</h1>
            @else
                <div class="table-responsive my-custom-scrollbar table-wrapper-scroll-y" style="min-height:89vh;">
                    <table class="table table-sm table-striped table-bordered">
                        <thead class="static-thead">
                            <tr>
                                <th scope="col" class="text-center">
                                    Cliente
                                </th>
                                <th scope="col" class="text-center">
                                    Creacion
                                </th>
                                <th scope="col" class="text-center">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($consultarClientes as $cliente)
                                <tr>
                                    <td>{{ $cliente->vNombrePersona }} {{ $cliente->vPrimerApellido }} {{ $cliente->vSegundoApellido }}</td>
                                    <td>{{ date('d-M-y', strtotime($cliente->created_at)) }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a id="btnDetails" type="button" href="{{ url('/clienteDetails',[$cliente->idCliente]) }}" class="btn btn-primary btn-sm" title="Detalles">
                                                <img src="{{ asset('img/icon/details.png') }}" height="19px">
                                            </a>
                                            <a id="btnEliminar" type="button" class="btn btn-danger btn-sm" title="Eliminar">
                                                <img src="{{ asset('img/icon/papelera-icon.png') }}" height="19px"/>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endunless
        @endif
    </div>
@endsection
