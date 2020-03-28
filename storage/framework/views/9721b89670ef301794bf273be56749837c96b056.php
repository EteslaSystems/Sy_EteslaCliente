<?php $__env->startSection('cotizadores'); ?>
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
                                        <div class="col-12 col-sm-6 col-md-6">
                                            <div class="form-group row">
                                                <div class="col-12 col-sm-12 col-md-4 fx-1">
                                                    <label for="men-val-1" class="mn-1">Mensualidad 1</label>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="input-group mb-3">
                                                                <input type="number" class="form-control" id="men-val-1" name="men-1" type="number" min="0"  aria-describedby="basic-addon1">
                                                              
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon1">kwh</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-group mb-3">
                                                                <input type="number" class="form-control" id="men-val-1a" name="men-1a" type="number" min="0"  aria-describedby="basic-addon1a">
                                                              
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon1a">kwp</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12 col-sm-12 col-md-4 fx-1">
                                                    <label for="men-val-2" class="mn-1">Mensualidad 2</label>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="input-group mb-3">
                                                                <input type="number" class="form-control" id="men-val-2" name="men-2" type="number" min="0"  aria-describedby="basic-addon2">
                                                              
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon2">kwh</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-group mb-3">
                                                                <input type="number" class="form-control" id="men-val-2a" name="men-2a" type="number" min="0"  aria-describedby="basic-addon2a">
                                                              
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon2a">kwp</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12 col-sm-12 col-md-4 fx-1">
                                                    <label for="men-val-3" class="mn-1">Mensualidad 3</label>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="input-group mb-3">
                                                                <input type="number" class="form-control" id="men-val-3" name="men-3" type="number" min="0"  aria-describedby="basic-addon3">
                                                              
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon3">kwh</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-group mb-3">
                                                                <input type="number" class="form-control" id="men-val-3a" name="men-3a" type="number" min="0"  aria-describedby="basic-addon3a">
                                                              
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon3a">kwp</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12 col-sm-12 col-md-4 fx-1">
                                                    <label for="men-val-4" class="mn-1">Mensualidad 4</label>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="input-group mb-3">
                                                                <input type="number" class="form-control" id="men-val-4" name="men-4" type="number" min="0"  aria-describedby="basic-addon4">
                                                              
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon4">kwh</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-group mb-3">
                                                                <input type="number" class="form-control" id="men-val-4a" name="men-4a" type="number" min="0"  aria-describedby="basic-addon4a">
                                                              
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon4a">kwp</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12 col-sm-12 col-md-4 fx-1">
                                                    <label for="men-val-5" class="mn-1">Mensualidad 5</label>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="input-group mb-3">
                                                                <input type="number" class="form-control" id="men-val-5" name="men-5" type="number" min="0"  aria-describedby="basic-addon5">
                                                              
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon5">kwh</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-group mb-3">
                                                                <input type="number" class="form-control" id="men-val-5a" name="men-5a" type="number" min="0"  aria-describedby="basic-addon5a">
                                                              
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon5a">kwp</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12 col-sm-12 col-md-4 fx-1">
                                                    <label for="men-val-6" class="mn-1">Mensualidad 6</label>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="input-group mb-3">
                                                                <input type="number" class="form-control" id="men-val-6" name="men-6" type="number" min="0"  aria-describedby="basic-addon6">
                                                              
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon6">kwh</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-group mb-3">
                                                                <input type="number" class="form-control" id="men-val-6a" name="men-6a" type="number" min="0"  aria-describedby="basic-addon6a">
                                                              
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon6a">kwp</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-md-6">
                                            <div class="form-group row">
                                                <div class="col-12 col-sm-12 col-md-4 fx-1">
                                                    <label for="men-val-7" class="mn-1">Mensualidad 7</label>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="input-group mb-3">
                                                                <input type="number" class="form-control" id="men-val-7" name="men-7" type="number" min="0"  aria-describedby="basic-addon7">
                                                              
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon7">kwh</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-group mb-3">
                                                                <input type="number" class="form-control" id="men-val-7a" name="men-7a" type="number" min="0"  aria-describedby="basic-addon7a">
                                                              
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon7a">kwp</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12 col-sm-12 col-md-4 fx-1">
                                                    <label for="men-val-8" class="mn-1">Mensualidad 8</label>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="input-group mb-3">
                                                                <input type="number" class="form-control" id="men-val-8" name="men-8" type="number" min="0"  aria-describedby="basic-addon8">
                                                              
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon8">kwh</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-group mb-3">
                                                                <input type="number" class="form-control" id="men-val-8a" name="men-8a" type="number" min="0"  aria-describedby="basic-addon8a">
                                                              
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon8a">kwp</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12 col-sm-12 col-md-4 fx-1">
                                                    <label for="men-val-9" class="mn-1">Mensualidad 9</label>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                                   <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="input-group mb-3">
                                                                <input type="number" class="form-control" id="men-val-9" name="men-9" type="number" min="0"  aria-describedby="basic-addon9">
                                                              
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon9">kwh</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-group mb-3">
                                                                <input type="number" class="form-control" id="men-val-9a" name="men-9a" type="number" min="0"  aria-describedby="basic-addon9a">
                                                              
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon9a">kwp</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12 col-sm-12 col-md-4 fx-1">
                                                    <label for="men-val-10" class="mn-1">Mensualidad 10</label>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="input-group mb-3">
                                                                <input type="number" class="form-control" id="men-val-10" name="men-10" type="number" min="0"  aria-describedby="basic-addon10">
                                                              
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon10">kwh</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-group mb-3">
                                                                <input type="number" class="form-control" id="men-val-10a" name="men-10a" type="number" min="0"  aria-describedby="basic-addon10a">
                                                              
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon10a">kwp</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12 col-sm-12 col-md-4 fx-1">
                                                    <label for="men-val-11" class="mn-1">Mensualidad 11</label>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="input-group mb-3">
                                                                <input type="number" class="form-control" id="men-val-11" name="men-11" type="number" min="0"  aria-describedby="basic-addon11">
                                                              
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon11">kwh</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-group mb-3">
                                                                <input type="number" class="form-control" id="men-val-11a" name="men-11a" type="number" min="0"  aria-describedby="basic-addon11a">
                                                              
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon11a">kwp</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12 col-sm-12 col-md-4 fx-1">
                                                    <label for="men-val-12" class="mn-1">Mensualidad 12</label>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                                   <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="input-group mb-3">
                                                                <input type="number" class="form-control" id="men-val-12" name="men-12" type="number" min="0"  aria-describedby="basic-addon12">
                                                              
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon12">kwh</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-group mb-3">
                                                                <input type="number" class="form-control" id="men-val-12a" name="men-12a" type="number" min="0"  aria-describedby="basic-addon12a">
                                                              
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon12a">kwp</span>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('roles/seller/cotizador/cotizador', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/roles/seller/cotizador/bajaTension.blade.php ENDPATH**/ ?>