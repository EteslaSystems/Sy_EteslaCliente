@extends('roles/admin')
@section('content')
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
<div class="container-fluid">
    <br>
<!-- Filtros - EquiposFotovoltaicos -->
    <div class="row">
        <div class="col-sm-6">
            <div id="PanelAdminEquipFot" class="card">
                <div class="card-body">
                    <form class="form-inline">
                        <div class="form-group">
                            <label for="ddlTipoEquipo">Tipo de equipo</label>
                            <select id="ddlTipoEquipo" class="form-control form-control-sm">
                                <option value="-1" selected>Elige una opcion</option>
                                <option value="panel">Panel</option>
                                <option value="inversor">Inversor</option>
                                <option value="estructura">Estructura</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ddlMarcaEquipo">Marca</label>
                            <select id="ddlMarcaEquipo" class="form-control form-control-sm">
                                <option value="-1" selected>Elige una opcion</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- Paneles -->
    <div class="row">
        <div class="col">
            <button id="addPanel" type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target=".modal-paneles">+</button>
        </div>
        <div class="col">
            <h3 align="right">Paneles</h3>
        </div>
        <!-- Modal agregar/editar Panel -->
        <div id="modalPanel" class="modal fade modal-paneles" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title col-11 text-center">Paneles</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body container">
                        <form method="POST" action="{{ url('agregar-panel') }}">
                            {{csrf_field()}}
                            <div class="row justify-content-center">
                                <div class="form-group">
                                    <label for="nombrePanel">Nombre</label>
                                    <input id="nombrePanel" name="p_nombrematerial" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="marcaPanel">Marca</label>
                                    <input id="marcaPanel" name="p_marca" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="potenciaPanel">Potencia</label>
                                    <input id="potenciaPanel" name="p_potencia" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="precioPanel">Precio</label>
                                    <input id="precioPanel" name="p_precio" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="garantiaPanel">Garantia</label>
                                    <input id="garantiaPanel" name="p_garantia" type="number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="origenPanel">Origen</label>
                                    <input id="origenPanel" name="p_origen" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="iscPanel">ISC</label>
                                    <input id="iscPanel" name="p_isc" type="number" step="any" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="vocPanel">VOC</label>
                                    <input id="vocPanel" name="p_voc" type="number" step="any" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="vmpPanel">VMP</label>
                                    <input id="vmpPanel" name="p_vmp" type="number" step="any" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="imgPanel">Ruta imagen</label>
                                    <input id="imgPanel" name="p_imgRuta" class="form-control">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary pull-right">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                                <a type="button" class="btn btn-sm btn-warning" onclick='editarPanel("{{ $panel->idPanel }}")' title="Editar">
                                    <img src="{{ asset('img/icon/editar-icon.png') }}" height="19px"/>
                                </a>
                                <a href="{{ url('eliminar-panel',$panel->idPanel) }}" class="btn btn-danger btn-sm" title="Eliminar">
                                    <img src="{{ asset('img/icon/papelera-icon.png') }}" height="19px"/>
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10">
                            <h1>Sin registros</h1>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <br>

<!-- Inversores -->
    <div class="row">
        <div class="col">
            <button id="addInversor" type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target=".modal-inversores">+</button>
        </div>
        <div class="col">
            <h3 align="right">Inversores</h3>
        </div>
        <!-- Modal agregar Inversor -->
        <div id="modalInversor" class="modal fade modal-inversores" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title col-11 text-center">Inversores</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ url('agregar-inversor') }}">
                            {{csrf_field()}}
                            <div class="row justify-content-center">
                                <div class="form-group">
                                    <label for="ddlTipoInversor">Tipo inversor</label>
                                    <select id="ddlTipoInversor" name="sctTipoInversor" class="form-control" onchange="selectTipoInversor();">
                                        <option value="-1" selected>Elige una opcion</option>
                                        <option value="MicroInversor">MicroInversor</option>
                                        <option value="Inversor">Inversor</option>
                                        <option value="Combinacion">Combinacion</option>
                                    </select>
                                </div>
                                <!-- NOTA: Este apartado de controles solo se mostrara cuando se agregue un *MICROINVERSOR* -->
                                <div id="contenedorPaneleSoportados" class="form-group" style="display:none;">
                                    <label for="noPanelesSoportados">Paneles Soportados</label>
                                    <input id="noPanelesSoportados" name="i_paneleSoportados" class="form-control" type="number">
                                </div>
                                <!-- FIN NOTA -->
                                <div class="form-group equipoCombin" style="display:none;">
                                    <label for="ddlMicroInv1">Equipo 1</label>
                                    <select id="ddlMicroInv1" name="sctMicroInv1" class="form-control" onchange="selectEquipo1o2(this)">
                                        <option value="-1">Escoge equipo1</option>
                                    </select>
                                </div>
                                <div class="form-group equipoCombin" style="display:none;">
                                    <label for="ddlMicroInv2">Equipo 2</label>
                                    <select id="ddlMicroInv2" name="sctMicroInv2" class="form-control" onchange="selectEquipo1o2(this)">
                                        <option value="-1">Escoge equipo2</option>
                                    </select>
                                </div>
                                <div class="form-group equipoNormal">
                                    <label for="nombreInversor">Nombre</label>
                                    <input id="nombreInversor" name="i_nombrematerial" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="marcaInversor">Marca</label>
                                    <input id="marcaInversor" name="i_marca" class="form-control">
                                </div>
                                <div class="form-group equipoNormal">
                                    <label for="potenciaInversor">Potencia</label>
                                    <input id="potenciaInversor" name="i_potencia" class="form-control">
                                </div>
                                <div class="form-group equipoNormal">
                                    <label for="precioInversor">Precio</label>
                                    <input id="precioInversor" name="i_precio" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="garantiaInversor">Garantia</label>
                                    <input id="garantiaInversor" name="i_garantia" type="number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="origenInversor">Origen</label>
                                    <input id="origenInversor" name="i_origen" class="form-control">
                                </div>
                                <div class="form-group equipoNormal">
                                    <label for="iscInversor">ISC</label>
                                    <input id="iscInversor" name="i_isc" type="number" step="any" class="form-control">
                                </div>
                                <div class="form-group equipoNormal">
                                    <label for="vminInversor">VMIN</label>
                                    <input id="vminInversor" name="i_vmin" type="number" step="any" class="form-control">
                                </div>
                                <div class="form-group equipoNormal">
                                    <label for="vmaxInversor">VMAX</label>
                                    <input id="vmaxInversor" name="i_vmax" type="number" step="any" class="form-control">
                                </div>
                                <div class="form-group equipoNormal">
                                    <label for="pminInversor">PMIN</label>
                                    <input id="pminInversor" name="i_pmin" type="number" step="any" class="form-control">
                                </div>
                                <div class="form-group equipoNormal">
                                    <label for="pmaxInversor">PMAX</label>
                                    <input id="pmaxInversor" name="i_pmax" type="number" step="any" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="imgInversor">Ruta imagen</label>
                                    <input id="imgInversor" name="i_imgRuta" class="form-control">
                                </div>
                            </div>
                            <button id="btnGuardarInversor" type="submit" class="btn btn-sm btn-primary pull-right" style="display: none;">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                                <a id="btnEditarInversor" type="button" onclick='editarInversor("{{ $inversor->idInversor }}")' class="btn btn-sm btn-warning" title="Editar">
                                    <img src="{{ asset('img/icon/editar-icon.png') }}" height="19px"/>
                                </a>
                                <a href="{{ url('eliminar-inversor',$inversor->idInversor) }}" class="btn btn-danger btn-sm" title="Eliminar">
                                    <img src="{{ asset('img/icon/papelera-icon.png') }}" height="19px"/>
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="12">
                            <h1>Sin registros</h1>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <br>

<!-- Estructuras -->
    <div class="row">
        <div class="col">
            <button id="addEstructura" type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target=".modal-estructuras">+</button>
        </div>
        <div class="col">
            <h3 align="right">Estructuras</h3>
        </div>
        <!-- Modal agregar Estructura -->
        <div id="modalEstructura" class="modal fade modal-estructuras" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title col-11 text-center">Estructuras</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ url('agregar-estructura') }}">
                            {{csrf_field()}}
                            <div class="row justify-content-center">
                                <div class="form-group">
                                    <label for="nombreEstructura">Nombre</label>
                                    <input id="nombreEstructura" name="p_nombrematerial" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="marcaEstructura">Marca</label>
                                    <input id="marcaEstructura" name="p_marca" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="precioEstructura">Precio</label>
                                    <input id="precioEstructura" name="p_precio" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="garantiaEstructura">Garantia</label>
                                    <input id="garantiaEstructura" name="p_garantia" type="number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="origenEstructura">Origen</label>
                                    <input id="origenEstructura" name="p_origen" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="imgEstructura">Ruta imagen</label>
                                    <input id="imgEstructura" name="p_imgRuta" class="form-control">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary pull-right">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                                <a id="btnEditarEstructura" type="button" onclick='editarEstructura("{{ $estructura->idEstructura }}")' class="btn btn-sm btn-warning" title="Editar">
                                    <img src="{{ asset('img/icon/editar-icon.png') }}" height="19px"/>
                                </a>
                                <a href="{{ url('eliminar-estructura',$estructura->idEstructura) }}" class="btn btn-danger btn-sm" type="button" title="Eliminar">
                                    <img src="{{ asset('img/icon/papelera-icon.png') }}" height="19px"/>
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10">
                            <h1>Sin registros</h1>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{ asset('js/admin/materialFotovoltaico.js') }}"></script>
@endsection