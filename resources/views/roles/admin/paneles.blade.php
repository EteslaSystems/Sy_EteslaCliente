@extends('roles/admin')
    @section('contenidoAdmin')
        @include('roles.admin.forms.form-new-panel')  

        <hr>

        <div class="content">
            <div class="table-responsive-sm">
                <table class="table table-bordered table-hover table-sm text-center">
                    <thead class="thead-dark ">
                        <tr>
                            <th style="width: 30%;">Nombre</th>
                            <th style="width: 10%;">Marca</th>
                            <th style="width: 10%;">Potencia</th>
                            <th style="width: 10%;">ISC</th>
                            <th style="width: 10%;">Precio</th>
                            <th style="width: 10%;">Garantia</th>
                            <th style="width: 10%;">Origen</th>
                            <th style="width: 10%;">VOC</th>
                            <th style="width: 10%;">VMP</th>
                            <th style="width: 10%;" colspan="2">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($vPaneles as $details)
                            <tr>
                                <td>{{ $details->vNombreMaterialFot }}</td>
                                <td>{{ $details->vMarca }}</td>
                                <td>{{ $details->fPotencia }}</td>
                                <td>{{ $details->fISC }}</td>
                                <td>{{ $details->fPrecio }}</td>
                                <td>{{ $details->vGarantia }}</td>
                                <td>{{ $details->vOrigen }}</td>
                                <td>{{ $details->fVOC }}</td>
                                <td>{{ $details->fVMP }}</td>
                                <td>
                                    <a href="{{ url('editar-panel', [$details->idPanel]) }}" class="btn btn-sm btn-warning" title="Editar">
                                        <img src="https://img.icons8.com/material-outlined/18/000000/multi-edit.png">
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ url('eliminar-panel', [$details->idPanel]) }}" class="btn btn-sm btn-danger" title="Eliminar">
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