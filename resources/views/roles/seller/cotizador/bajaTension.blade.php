@extends('roles/seller/cotizador/cotizador')
@section('cotizadores')
    <div class="card">
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
                                    <optgroup label="Mensual" style="background: rgba(0, 0, 0, .45); color: #FFF; padding: 5px 15px;"></optgroup>
                                    <hr>
                                    <option value="IC">Industrial a Comercial</option>
                                    <option value="1">01 (Doméstico 500 kWh/bim)</option>
                                    <option value="1a">1a (Doméstico 600 kWh/bim)</option>
                                    <option value="1b">1b (Doméstico 800 kWh/bim)</option>
                                    <option value="1c">1c (Doméstico 1,700 kWh/bim)</option>
                                    <option value="1d">1d (Doméstico 2,000 kWh/bim)</option>
                                    <option value="1e">1e (Doméstico 4,000 kWh/bim)</option>
                                    <option value="1f">1f (Doméstico 5,000 kWh/bim)</option>
                                    <option value="2">02 (Comercial hasta 25kwp)</option>
                                    <optgroup label="Bimestral" style="background: rgba(0, 0, 0, .45); color: #FFF; padding: 5px 15px;"></optgroup>
                                    <hr>
                                    <option value="3">03 (Comercial más 25kwp)</option>
                                    <option value="OM">OM (Con Transformador)</option>
                                    <option value="HM">HM (Con Transformador horaria)</option>
                                    <option value="9m">9M (Con Transformador Riego)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>

            <div class="container-fluid">
                <div class="accordion">
                    <div class="card">
                        <div id="fm-mensual" class="collapse" aria-labelledby="headingOne" data-parent="#tarifa-actual">
                            <div class="card-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-6 offset-6 col-md-4 offset-md-8">
                                            <div class="custom-control custom-switch text-center">
                                                <input type="checkbox" class="custom-control-input" id="switch-1">
                                                <label class="custom-control-label" for="switch-1">Generar promedio.</label>
                                            </div>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="row">
                                        <div class="col-12 col-sm-6 col-md-6">
                                            <div class="form-group row">
                                                <div class="col-12 col-sm-12 col-md-4 fx-1">
                                                    <label for="bim-val-1" class="mn-1">Bimestre 1</label>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                                    <input id="bim-val-1" name="bim-1" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12 col-sm-12 col-md-4 fx-1">
                                                    <label for="bim-val-2" class="mn-1">Bimestre 2</label>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                                    <input id="bim-val-2" name="bim-2" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12 col-sm-12 col-md-4 fx-1">
                                                    <label for="bim-val-3" class="mn-1">Bimestre 3</label>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                                    <input id="bim-val-3" name="bim-3" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-md-6">
                                            <div class="form-group row">
                                                <div class="col-12 col-sm-12 col-md-4 fx-1">
                                                    <label for="bim-val-4" class="mn-1">Bimestre 4</label>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                                    <input id="bim-val-4" name="bim-4" type="number" min="0" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12 col-sm-12 col-md-4 fx-1">
                                                    <label for="bim-val-5" class="mn-1">Bimestre 5</label>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                                    <input id="bim-val-5" name="bim-5" type="number" min="0" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12 col-sm-12 col-md-4 fx-1">
                                                    <label for="bim-val-6" class="mn-1">Bimestre 6</label>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                                   <input id="bim-val-6" name="bim-6" type="number" min="0" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div id="fm-bimestral" class="collapse" aria-labelledby="headingTwo" data-parent="#tarifa-actual">
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
                                        <div class="col-12 col-sm-6 col-md-6">
                                            <div class="form-group row">
                                                <div class="col-12 col-sm-12 col-md-4 fx-1">
                                                    <label for="men-val-1" class="mn-1">Mensualidad 1</label>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                                    <input id="men-val-1" name="men-1" type="number" min="0" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12 col-sm-12 col-md-4 fx-1">
                                                    <label for="men-val-2" class="mn-1">Mensualidad 2</label>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                                    <input id="men-val-2" name="men-2" type="number" min="0" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12 col-sm-12 col-md-4 fx-1">
                                                    <label for="men-val-3" class="mn-1">Mensualidad 3</label>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                                    <input id="men-val-3" name="men-3" type="number" min="0" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12 col-sm-12 col-md-4 fx-1">
                                                    <label for="men-val-4" class="mn-1">Mensualidad 4</label>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                                    <input id="men-val-4"  name="men-4" type="number" min="0" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12 col-sm-12 col-md-4 fx-1">
                                                    <label for="men-val-5" class="mn-1">Mensualidad 5</label>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                                    <input id="men-val-5" name="men-5" type="number" min="0" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12 col-sm-12 col-md-4 fx-1">
                                                    <label for="men-val-6" class="mn-1">Mensualidad 6</label>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                                    <input id="men-val-6" name="men-6" type="number" min="0" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-md-6">
                                            <div class="form-group row">
                                                <div class="col-12 col-sm-12 col-md-4 fx-1">
                                                    <label for="men-val-7" class="mn-1">Mensualidad 7</label>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                                    <input id="men-val-7" name="men-7" type="number" min="0" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12 col-sm-12 col-md-4 fx-1">
                                                    <label for="men-val-8" class="mn-1">Mensualidad 8</label>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                                    <input id="men-val-8" name="men-8" type="number" min="0" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12 col-sm-12 col-md-4 fx-1">
                                                    <label for="men-val-9" class="mn-1">Mensualidad 9</label>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                                   <input id="men-val-9" name="men-9" type="number" min="0" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12 col-sm-12 col-md-4 fx-1">
                                                    <label for="men-val-10" class="mn-1">Mensualidad 10</label>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                                    <input id="men-val-10" name="men-10" type="number" min="0" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12 col-sm-12 col-md-4 fx-1">
                                                    <label for="men-val-11" class="mn-1">Mensualidad 11</label>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                                    <input id="men-val-11" name="men-11" type="number" min="0" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12 col-sm-12 col-md-4 fx-1">
                                                    <label for="men-val-12" class="mn-1">Mensualidad 12</label>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                                   <input id="men-val-12" name="men-12" type="number" min="0" class="form-control">
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

                <div class="row justify-content-center">
                    <div class="col-6 text-center">
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
