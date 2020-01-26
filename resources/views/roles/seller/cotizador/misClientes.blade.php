@extends('template/clientes')
@section('agregarClientes')
    <br>
    <style>
        hr{
            border: solid;
        }
    </style>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm">
                    <form>
                        <div class="form-group row">
                            <label for="inpNombreCliente" class="col-sm-4 col-form-label">Nombre*</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <input id="inpNombre" class="form-control" placeholder="Nombre completo" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inpMailCliente" class="col-sm-6 col-form-label">Correo electrónico*</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <input type="" id="inpMailCliente" class="form-control" placeholder="Correo electrónico" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inpCPCliente" class="col-sm-4 col-form-label">C.P.</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <input type="number" id="inpCalleCliente" class="form-control" placeholder="Código Postal">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inpMunicCliente" class="col-sm-6 col-form-label">Municipio/Localidad</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <input type="text" id="inpMunicCliente" class="form-control" placeholder="Municipio/Localidad/Ciudad">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group row">
                            <label for="inpPrimerApellidoCliente" class="col-sm-6 col-form-label">Primer apellido*</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <input type="text" id="inpPrimerApellidoCliente" class="form-control" placeholder="Primer apellido" required>
                                </div>
                            </div>  
                        </div>
                        <div class="form-group row">
                            <label for="inpTelefonoCliente" class="col-sm-4 col-form-label">Teléfono*</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <input type="text" id="inpTelefonoCliente" class="form-control" placeholder="Teléfono" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inpCalleCliente" class="col-sm-4 col-form-label">Calle y no.</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <input type="" id="inpColoniaCliente" class="form-control" placeholder="Calle y número">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inpEstadoCliente" class="col-sm-4 col-form-label">Estado</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <input type="" id="inpEstadoCliente" class="form-control" placeholder="Estado">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group row">
                            <label for="inpSegundoApellidoCliente" class="col-sm-6 col-form-label">Segundo apellido</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <input type="" id="inpSegundoApellidoCliente" class="form-control" placeholder="Segundo apellido">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inpCelularCliente" class="col-sm-4 col-form-label">Celular</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <input type="" id="inpCelularCliente" class="form-control" placeholder="Celular">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inpColoniaCliente" class="col-sm-4 col-form-label">Colonia</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <input type="" id="inpColoniaCliente" class="form-control" placeholder="Colonia">
                                </div>
                            </div>  
                        </div>
                        <input type="submit" class="btn btn-success pull-right" value="Registrar">  
                    </form>
                </div>
            </div>
        </div>
    </div>
    <hr>
@endsection
