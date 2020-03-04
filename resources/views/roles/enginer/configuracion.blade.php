@extends('roles/enginer')
@section('enginerContent')
    <!-- Token CSRF -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fin Token CSRF -->
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="form-group">
                    <label for="inpMaterial" class="col-sm-6 col-form-label">Material*</label>
                    <div class="col-lg-12">
                        <div class="input-group mb-2">
                            <input type="text" id="inpMaterial" class="form-control" placeholder="Material" onblur="validarCamposObligatoriosVacios();">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inpCantidad" class="col-sm-6 col-form-label">Cantidad*</label>
                    <div class="col-sm-12">
                        <div class="input-group mb-2">
                            <input type="number" id="inpCantidad" class="form-control" step="1" placeholder="0" onblur="validarCamposObligatoriosVacios();">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inpMarca" class="col-sm-6 col-form-label">Marca</label>
                    <div class="col-sm-12">
                        <div class="input-group mb-2">
                            <input type="text" id="inpMarca" class="form-control" placeholder="Marca">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inpCaracteristicas" class="col-sm-8 col-form-label">Caracteristicas</label>
                    <div class="col-sm-12">
                        <div class="input-group mb-2">
                            <input type="text" id="inpCaracteristicas" class="form-control" placeholder="Caracteristicas">
                        </div> 
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-4 align-self-center">
                        <div class="input-group mb-2">
                            <button id="btnAgregarItem" class="btn btn-lg btn-success" onclick="agregarItem();" disabled>+</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="table-responsive">
                <table id="tblConfigurationPrevious" class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Material</th>
                            <th>Cantidad</th>
                            <th>Marca</th>
                            <th>Caracteristicas</th>
                            <th>Acciones</th>
                        </tr>
                    <thead>
                    <tbody>
                    
                    </tbody>
                </table>
            </div>
        </div>
        <button id="btnGuardarConfiguracion" class="btn btn-lg btn-success pull-right" style="display:none;" onclick="enviarDatosAlServer();">Guardar</button>
    </div>
@endsection
<script src="js/configuracion.js"></script>