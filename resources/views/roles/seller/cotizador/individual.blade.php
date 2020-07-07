@extends('roles/seller/cotizador/cotizador')
@section('cotizadores')
<div class="row">
    <div class="col-6 col-md-4">
        <div class="card shadow mb-3">
            <div class="card-header">
                <p class="d-block mn-1 p-titulos">
                    <i class="fa fa-bolt" aria-hidden="true"></i>
                    Cotización individual 
                </p>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col">
                        <div class="form-row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="mn-1">Cantidad paneles:</label>
                                    <input class="form-control input-sm" type="number" id="inpCantPaneles" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="mn-1">Seleccionar Panel:</label>
                                    <select class="form-control" id="optPaneles" onchange="getDropDownListValues()">
                                        <option selected value="-1">Elige una opción:</option>
                                            @foreach($vPaneles as $details)
                                                <option value="{{ $details->idPanel }}">{{ $details->vNombreMaterialFot }}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="mn-1">Cantidad inversores:</label>
                                    <input class="form-control input-sm" type="number" id="inpCantInversores" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="mn-1">Seleccionar Inversor:</label>
                                    <select class="form-control" id="optInversores" onchange="getDropDownListValues()">
                                        <option selected value="-1">Elige una opción:</option>
                                            @foreach($vInversores as $details)
                                                <option value="{{ $details->idInversor }}" >{{ $details->vNombreMaterialFot }}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col">
                        <button type="button" class="btn btn-xs btnMenuInfo" id="btnMenuInfo" onClick="loadMenuAddItem()" title="addItems">
                            +
                        </button>
                        <div class="menu-content shadow" id="menuContent">
                            <label><strong>Agregar</strong></label>
                            <div class="checkbox">
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="chbEstructuras" disabled>Estructuras
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <button onclick="sendSingleQuotation()" class="btn btn-green text-uppercase shadow pull-right" id="btnCalcularIndividual">
                            <i class="fa fa-check" aria-hidden="true"></i>
                            Calcular
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card shadow mb-3">
            <div class="card-header">
                <p class="d-block mn-1 p-titulos"><ins>Resultados</ins></p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="inpCostTotalPaneles">Costo total Paneles</label>
                            <input id="inpCostTotalPaneles" class="form-control inpAnsw" readOnly>
                        </div>
                        <div class="form-group">
                            <label for="">Costo total Inversores</label>
                            <input id="inpCostTotalInversores" class="form-control inpAnsw" readOnly>
                        </div>
                        <div class="form-group">
                            <label for="inpCostTotalEstructuras">Costo total Estructuras</label>
                            <input id="inpCostTotalEstructuras" class="form-control inpAnsw" readOnly>
                        </div>
                        <div class="form-group">
                            <label for="inpCostoTotalViaticos">Costo total Viaticos</label>
                            <input id="inpCostoTotalViaticos" class="form-control inpAnsw" readOnly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="inpPrecio">Precio</label>
                            <input id="inpPrecio" class="form-control inpAnsw" readOnly>
                        </div>
                        <div class="form-group">
                            <label for="inpPrecioIVA">Precio del proyecto + IVA</label>
                            <input id="inpPrecioIVA" class="form-control inpAnsw" readOnly>
                        </div>
                        <div class="form-group">
                            <label for="precioMXN">Precio del proyecto MXN</label>
                            <input id="precioMXN" class="form-control inpAnsw" readOnly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" id="loader" style="display:none;">
    <div class="row justify-content-center align-items-center minh-100">
        <img src="img/loader.svg">
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