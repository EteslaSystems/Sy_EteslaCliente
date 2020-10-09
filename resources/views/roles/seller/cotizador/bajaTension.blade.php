@extends('roles/seller/cotizador/cotizador')
@section('cotizadores')
    <div class="card" id="divCotizacionBajaTension">
        <div class="card-header">
            <div class="row">
                <div class="col-12 fx-1">
                    <p class="label-mn-1 mn-1">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAA0UlEQVRIie2TQQ6CMBBFR2NYeIaydW04hguiEa/ALTyIB+AALpQD4R1YPjfTOCFEkJYYE/9q+G3/n1+mIhEAZLyQxdD0wjmwAa7G4KpcHip+YhjFMsBjb+qbiDgRSUWkNvzBdrQDmhFdrXV/ArTKOaOTKtcCiU1w0S7mgW/vg/2VSXUHnHZfG74KMShGXOdxsoGeGT+mUwzM2eGHFmLwDiHvoBfAFjj3LURJ0NWJnqCL3zdYmfohIi7SJDW+sAlKuxAoXvqPxRyzbzH7P/jj+3gC21tbAVnmKgUAAAAASUVORK5CYII=">
                        <strong class="d-none d-sm-block d-md-block d-xl-block">&nbsp; Datos de Consumo</strong>
                        <strong class="d-block d-sm-none d-md-none d-xl-none">&nbsp; Consumo</strong>
                    </p>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-8 col-md-6">
                        <div class="form-group row">
                            <div class="col-12 col-sm-12 col-md-3 fx-1">
                                <label for="tarifa-actual" class="mn-1">Tarifa actual</label>
                            </div>

                            <div class="col-12 col-sm-12 col-md-9 pa-ma-3">
                                <select class="form-control" id="tarifa-actual">
                                    <option disabled selected>Elige una opción:</option>
                                    <option value="IC">Industrial a Comercial</option>
                                    <option value="1">01 (Doméstico 500 kWh/bim)</option>
                                    <option value="1a">1a (Doméstico 600 kWh/bim)</option>
                                    <option value="1b">1b (Doméstico 800 kWh/bim)</option>
                                    <option value="1c">1c (Doméstico 1,700 kWh/bim)</option>
                                    <option value="1d">1d (Doméstico 2,000 kWh/bim)</option>
                                    <option value="1e">1e (Doméstico 4,000 kWh/bim)</option>
                                    <option value="1f">1f (Doméstico 5,000 kWh/bim)</option>
                                    <option value="2">02 (Comercial hasta 25kwp)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid" id="form-group-inputs">
                <div class="accordion">
                    <div class="card">
                        <div id="fm-mensual" class="collapse" aria-labelledby="headingTwo" data-parent="#tarifa-actual">
                            <div class="card-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-6 offset-6 col-md-4 offset-md-8">
                                            <div class="custom-control custom-switch text-center">
                                                <input type="checkbox" class="custom-control-input" id="switch-2">
                                                <label class="custom-control-label" for="switch-2">Generar promedio.</label>
                                            </div>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group row">
                                                <label for="men-val-1" class="col-sm-4 col-form-label">Bimestre 1</label>
                                                <div class="col-lg-6">
                                                    <div class="input-group mb-3">
                                                        <input type="number" class="form-control" id="men-val-1" name="men-1" type="number" min="0"  aria-describedby="basic-addon1">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" id="inpIkWh1">kwh</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group row">
                                                <label for="men-val-2" class="col-sm-4 col-form-label">Bimestre 2</label>
                                                <div class="col-lg-6">
                                                    <div class="input-group mb-3">
                                                        <input type="number" class="form-control" id="men-val-2" name="men-1" type="number" min="0"  aria-describedby="basic-addon1">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" id="inpIkWh2">kwh</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group row">
                                                <label for="men-val-3" class="col-sm-4 col-form-label">Bimestre 3</label>
                                                <div class="col-lg-6">
                                                    <div class="input-group mb-3">
                                                        <input type="number" class="form-control" id="men-val-3" name="men-1" type="number" min="0"  aria-describedby="basic-addon1">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" id="inpIkWh3">kwh</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="col">
                                            <div class="form-group row">
                                                <label for="men-val-4" class="col-sm-4 col-form-label">Bimestre 4</label>
                                                <div class="col-lg-6">
                                                    <div class="input-group mb-3">
                                                        <input type="number" class="form-control" id="men-val-4" name="men-1" type="number" min="0"  aria-describedby="basic-addon1">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" id="inpIkWh4">kwh</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group row">
                                                <label for="men-val-5" class="col-sm-4 col-form-label">Bimestre 5</label>
                                                <div class="col-lg-6">
                                                    <div class="input-group mb-3">
                                                        <input type="number" class="form-control" id="men-val-5" name="men-1" type="number" min="0"  aria-describedby="basic-addon1">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" id="inpIkWh5">kwh</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group row">
                                                <label for="men-val-6" class="col-sm-4 col-form-label">Bimestre 6</label>
                                                <div class="col-lg-6">
                                                    <div class="input-group mb-3">
                                                        <input type="number" class="form-control" id="men-val-6" name="men-1" type="number" min="0"  aria-describedby="basic-addon1">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" id="inpIkWh6">kwh</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row justify-content-center" id="divBtnCalcularBT">
                    <div class="col-6 text-center">
                        <button class="btn btn-success" onclick="sendCotizacionBajaTension();">Calcular</button>
                    </div>
                </div>
                <!--Termina formulario bajaTension -->
            </div>
        </div>
    </div>
    <div class="card shadow mb-3" id="divResultCotizacionBT" style="display:none;">
        <div class="row">
            <div class="col">
                <button class="btn btn-xs float-left" onclick="backToCotizacionBT()"><img src="https://img.icons8.com/windows/24/000000/long-arrow-left.png"/></button>
            </div>
        <div class="w-100"></div>
        <div class="col-lg" id="divResult_bt"></div>
    </div>
</div>
@endsection
