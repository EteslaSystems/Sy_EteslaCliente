<?php $__env->startSection('cotizadores'); ?>
    <div class="card">
        <div class="card-header"><img src="https://img.icons8.com/ios-filled/24/000000/quick-mode-off.png"> Cotizador de baja tensión</div>
        <div class="card-body">
            <div class="tabbable-panel">
                <div class="tabbable-line">
                    <ul class="nav nav-pills">
                        <li class="nav-item active">
                            <a class="nav-link active" href="#datosCliente" data-toggle="tab" role="tab">Datos del cliente</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#conFiguracion" data-toggle="tab" role="tab">Configuración</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="datosCliente" role="tabpanel">
                            <div class="container-fluid"> 
                                <div class="row">
                                    <div class="col-sm">
                                        <label>Consumo promedio</label>
                                        <input type="number" class="form-control" step="0.1" placeholder="0">  
                                    </div>
                                    <div class="col-sm">
                                        <label>Irradiación</label>
                                        <input type="number" class="form-control" step="0.1" placeholder="0">        
                                    </div>
                                    <div class="col-sm">
                                        <label>Tarifa</label>
                                        <select class="form-control" id="">
                                            <option value="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                        </select>  
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="tab-pane" id="conFiguracion" role="tabpanel">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm">
                                        <label>Seleccionar panel</label>
                                        <select class="form-control" id="">
                                            <option value="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                        </select>
                                    </div>
                                    <div class="col-sm">
                                        <label>Seleccionar marca de inversor</label>
                                        <select class="form-control" id="">
                                            <option value="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                        </select>
                                    </div>
                                    <div class="col-sm">
                                        <label>Actualizar cantidad de modulos</label>
                                        <input type="number" class="form-control">
                                    </div>
                                </div>    
                            </div>
                            <br>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="opcion1" checked>
                            <label class="form-check-label" for="opcion1">Opción 1</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="opcion2">
                            <label class="form-check-label" for="opcion2">Opción 2</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="opcion3">
                            <label class="form-check-label" for="opcion3">Opción 3</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="opcion4">
                            <label class="form-check-label" for="opcion4">Opción 4</label>
                        </div>
                    </div>
                    <button class="btn btn-outline-success">Generar PDF</button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('cotizador/cotizador', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\EteslaPanelesSolares\resources\views/cotizador/bajaTension.blade.php ENDPATH**/ ?>