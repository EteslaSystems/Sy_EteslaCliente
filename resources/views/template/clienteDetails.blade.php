@extends('roles/seller')
@section('content')
@section('agregarClientes')
@show
    <br>
    <div class="container-fluid">
        <div id="divClienteInfo" class="row">
            <div class="card">
                <div class="card-body">
                    <div id="nombresCliente" class="row">
                        <div class="col-sm-auto">
                            <div class="form-group">
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Nombre</div>
                                    </div>
                                    <input type="text" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <div class="form-group">
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">1er. Apellido</div>
                                    </div>
                                    <input type="text" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <div class="form-group">
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">2do. Apellido</div>
                                    </div>
                                    <input type="text" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <div class="form-group">
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">C.P.</div>
                                    </div>
                                    <input type="text" class="form-control" disabled>
                                </div>
                            </div>  
                        </div>
                    </div>
                    <div id="direccionCliente" class="row">
                        <div class="col-sm-auto">
                            <div class="form-group">
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Calle</div>
                                    </div>
                                    <input type="text" class="form-control" style="width:202px;" disabled>
                                </div>
                            </div>    
                        </div>
                        <div class="col-sm-auto">
                            <div class="form-group">
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Municipio</div>
                                    </div>
                                    <input type="text" class="form-control" style="width:200px;" disabled>
                                </div>
                            </div>    
                        </div>
                        <div class="col-sm-auto">
                            <div class="form-group">
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Ciudad</div>
                                    </div>
                                    <input type="text" class="form-control" style="width:220px;" disabled>
                                </div>
                            </div>    
                        </div>
                        <div class="col-sm-auto">
                            <div class="form-group">
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Estado</div>
                                    </div>
                                    <input type="text" class="form-control" style="width:164px;" disabled>
                                </div>
                            </div>    
                        </div>
                    </div>
                    <div id="divTelefonoCliente" class="row">
                        <div class="col-sm-auto">
                            <div class="form-group">
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Telefono</div>
                                    </div>
                                    <input type="number" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <div class="form-group">
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Celular</div>
                                    </div>
                                    <input type="number" class="form-control" style="width:220px;" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <div class="form-group">
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Mail</div>
                                    </div>
                                    <input type="mail" class="form-control" style="width:241px;" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <button type="button" class="btn btn-warning font-weight-bold" title="Actualizar">
                                Editar
                            </button>
                            <div class="btn-group d-none" role="group">
                                <button type="button" class="btn btn-primary font-weight-bold" title="Actualizar">
                                    Guardar
                                </button>
                                <button type="button" class="btn btn-danger font-weight-bold" title="Cancelar">
                                    Cancelar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <br>

        <div id="divClientePropuestas" class="row">
            <div class="card">
                <div class="card-body">
                    @unless()
                        <small>
                            <strong>
                                Sin propuestas.
                            </strong>
                        </small>
                    @else
                        <div class="table-responsive">
                            <table id="tblPropuestas" class="table table-sm table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">Tipo</th>
                                        <th scope="col">Creacion</th>
                                        <th scope="col">Expiracion</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    @endunless
                </div>
            </div>
        </div>
    </div>
@endsection