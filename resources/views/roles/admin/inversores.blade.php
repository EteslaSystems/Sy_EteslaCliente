@extends('roles/admin')
    @section('contenidoAdmin')
        @include('roles.admin.forms.form-new-investor')  

        <hr>

        <div class="content">
            <div class="table-responsive-sm">
                <table class="table table-bordered table-hover table-sm text-center">
                    <thead class="thead-dark ">
                        <tr>
                            <th style="width: 32.5%;">Nombre</th>
                            <th style="width: 10%;">Marca</th>
                            <th style="width: 7.5%;">Potencia</th>
                            <th style="width: 5%;">ISC</th>
                            <th style="width: 7.5%;">Precio</th>
                            <th style="width: 12.5%;" colspan="2">VMAX / VMIN</th>
                            <th style="width: 12.5%;" colspan="2">PMAX / PMIN</th>
                            <th style="width: 12.5%;" colspan="2">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($vInversores as $details)
                            <tr>
                                <td>{{ $details->vNombreMaterialFot }}</td>
                                <td>{{ $details->vMarca }}</td>
                                <td>{{ $details->fPotencia }}</td>
                                <td>{{ $details->fISC }}</td>
                                <td>{{ $details->fPrecio }}</td>
                                <td>{{ $details->iVMAX }}</td>
                                <td>{{ $details->iVMIN }}</td>
                                <td>{{ $details->iPMAX }}</td>
                                <td>{{ $details->iPMIN }}</td>
                                <td>
                                    <a href="{{ url('editar-inversor', [$details->idInversor]) }}" class="btn btn-sm btn-warning" title="Editar">
                                        <img src="https://img.icons8.com/material-outlined/18/000000/multi-edit.png">
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ url('eliminar-inversor', [$details->idInversor]) }}" class="btn btn-sm btn-danger" title="Eliminar">
                                        <img src="https://img.icons8.com/material-outlined/18/000000/delete-trash.png">
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection