@extends('roles/seller/cotizador/cotizador')
@section('cotizadores')
<div class="card">
    <div class="card-body container-fluid">
        <div class="row">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h1>CONTROLES</h1>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="mn-1">Seleccionar Panel:</label>
                            <select class="form-control" id="optPaneles" onchange="getDropDownListValues()">
                                <option selected value="-1">Elige una opción:</option>
                                    @foreach($vPaneles as $details)
                                        <option value="{{ $details->idPanel }}">{{ $details->vNombreMaterialFot }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mn-1">Cantidad paneles:</label>
                            <input class="form-control input-sm" type="number" id="inpCantPaneles" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="mn-1">Seleccionar Inversor:</label>
                            <select class="form-control" id="optInversores" onchange="getDropDownListValues()">
                                <option selected value="-1">Elige una opción:</option>
                                    @foreach($vInversores as $details)
                                        <option value="{{ $details->idInversor }}" >{{ $details->vNombreMaterialFot }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mn-1">Cantidad inversores:</label>
                            <input class="form-control input-sm" type="number" id="inpCantInversores" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="mn-1">Seleccionar Estructura:</label>
                            <select id="optEstructuras" class="form-control">
                                <option selected value="-1">Elige una opción:</option>
                                    @foreach($vEstructuras as $estructura)
                                        <option value="{{ $estructura->vMarca }}" >{{ $estructura->vMarca }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mn-1">Cantidad estructuras:</label>
                            <input class="form-control input-sm" type="number" id="inpCantEstructuras" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div id="resultadosIndiv" class="row">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h1>R E S U L T A D O S</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>   
    .inpAnsw{
        border:0; 
        background: transparent !important; 
        border-bottom: 1px solid #888 !important;
    }
</style>
@endsection