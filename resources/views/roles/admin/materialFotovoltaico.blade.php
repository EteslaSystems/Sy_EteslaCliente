@extends('roles/admin')
@section('content')
<div class="container-fluid">
    <br>

<!-- Paneles -->
    <h3 align="center">Paneles</h3>
    <hr class="separador">
    <div class="table-wrapper-scroll-y my-scrollbar">
        <table class="table table-bordered table-striped table-sm tableScrollXY">
            <thead class="thead-dark" align="center">
                <tr>
                    <th scope="col">Marca</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Potencia</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Garantia</th>
                    <th scope="col">Origen</th>
                    <th scope="col">ISC</th>
                    <th scope="col">VOC</th>
                    <th scope="col">VMP</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($paneles as $panel)
                    <tr>
                        <td>{{ $panel->vMarca }}</td>
                        <td>{{ $panel->vNombreMaterialFot }}</td>
                        <td>{{ $panel->fPotencia }} W</td>
                        <td>$ {{ $panel->fPrecio }} USD</td>
                        <td>{{ $panel->vGarantia }} años</td>
                        <td>{{ $panel->vOrigen }}</td>
                        <td>{{ $panel->fISC }}</td>
                        <td>{{ $panel->fVOC }}</td>
                        <td>{{ $panel->fVMP }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-sm btn-warning" title="Editar" data-toggle="modal" data-target=".edit-panel"><img src="https://img.icons8.com/ios/20/000000/edit--v1.png"/></button>
                                <button type="button" class="btn btn-sm btn-danger" title="Eliminar"><img src="https://img.icons8.com/ios/20/000000/delete-forever--v1.png"/></button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <h1>Sin registros</h1>
                @endforelse
            </tbody>
        </table>
        <!-- Modal Edit - Paneles -->
        <div class="modal fade bd-example-modal-lg edit-panel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                        editar paneles
                </div>
            </div>
        </div>
    </div>

    <br>

<!-- Inversores -->
    <h3 align="center">Inversores</h3>
    <hr class="separador">
    <div class="table-wrapper-scroll-y my-scrollbar">
        <table class="table table-bordered table-striped table-sm tableScrollXY">
            <thead class="thead-dark" align="center">
                <tr>
                    <th scope="col">Marca</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Potencia</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Garantia</th>
                    <th scope="col">Origen</th>
                    <th scope="col">PMIN</th>
                    <th scope="col">PMAX</th>
                    <th scope="col">VMIN</th>
                    <th scope="col">VMAX</th>
                    <th scope="col">ISC</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($inversores as $inversor)
                    <tr>
                        <td>{{ $inversor->vMarca }}</td>
                        <td>{{ $inversor->vNombreMaterialFot }}</td>
                        <td>{{ $inversor->fPotencia }} W</td>
                        <td>$ {{ $inversor->fPrecio }} USD</td>
                        <td>{{ $inversor->vGarantia }} años</td>
                        <td>{{ $inversor->vOrigen }}</td>
                        <td>{{ $inversor->iPMIN }}</td>
                        <td>{{ $inversor->iPMAX }}</td>
                        <td>{{ $inversor->iVMIN }}</td>
                        <td>{{ $inversor->iVMAX }}</td>
                        <td>{{ $inversor->fISC }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-sm btn-warning" title="Editar" data-toggle="modal" data-target=".edit-inversor"><img src="https://img.icons8.com/ios/20/000000/edit--v1.png"/></button>
                                <button type="button" class="btn btn-sm btn-danger" title="Eliminar"><img src="https://img.icons8.com/ios/20/000000/delete-forever--v1.png"/></button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <h1>Sin registros</h1>
                @endforelse
            </tbody>
        </table>
        <!-- Modal Edit - Inversores -->
        <div class="modal fade bd-example-modal-lg edit-inversor" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    editar inversores
                </div>
            </div>
        </div>
    </div>

    <br>

<!-- Estructuras -->
    <h3 align="center">Estructuras</h3>
    <hr class="separador">
    <div class="table-wrapper-scroll-y my-scrollbar">
        <table class="table table-bordered table-striped table-sm tableScrollXY">
            <thead class="thead-dark" align="center">
                <tr>
                    <th scope="col">Marca</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Garantia</th>
                    <th scope="col">Origen</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($estructuras as $estructura)
                    <tr>
                        <td>{{ $estructura->vMarca }}</td>
                        <td>{{ $estructura->vNombreMaterialFot }}</td>
                        <td>$ {{ $estructura->fPrecio }} USD</td>
                        <td>{{ $estructura->vGarantia }} años</td>
                        <td>{{ $estructura->vOrigen }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-sm btn-warning" title="Editar" data-toggle="modal" data-target=".edit-estructura"><img src="https://img.icons8.com/ios/20/000000/edit--v1.png"/></button>
                                <button type="button" class="btn btn-sm btn-danger" title="Eliminar"><img src="https://img.icons8.com/ios/20/000000/delete-forever--v1.png"/></button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <h1>Sin registros</h1>
                @endforelse
            </tbody>
        </table>
        <!-- Modal Edit - Estructuras -->
        <div class="modal fade bd-example-modal-lg edit-estructura" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    editar estructuras
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .my-scrollbar{
        position: relative;
        height: 200px;
        overflow: auto;
    }

    .table-wrapper-scroll-y{
        display: block;
    }

    .tableScrollXY thead tr th{
        position: sticky;
        top: 0;
        z-index: 10;
    }

    .separador{
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        border-top: 1px solid rgba(0, 0, 0, 0.1);
    }
</style>
@endsection