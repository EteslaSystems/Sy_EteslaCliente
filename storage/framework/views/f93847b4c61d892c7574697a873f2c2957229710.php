<?php $__env->startSection('agregarClientes'); ?>
    <br>
    <style>
        hr{
            border: solid;
        }
    </style>
    <div class="card">
        <div class=card-body>
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="inpNombreCliente" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                            <div class="input-group mb-2">
                                <input type="" id="inpNombreCliente" class="form-control" placeholder="Nombre del cliente">  
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inpCPCliente" class="col-sm-2 col-form-label">C.P.</label>
                        <div class="col-sm-10">
                            <div class="input-group mb-2">
                                <input type="" id="inpCPCliente" class="form-control" placeholder="Código postal">  
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inpDireccionCliente" class="col-sm-2 col-form-label">Dirección</label>
                        <div class="col-sm-10">
                            <div class="input-group mb-2">
                                <input type="text" id="inpDireccionCliente" class="form-control" placeholder="Dirección del cliente">  
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="inpTelefonoCliente" class="col-sm-2 col-form-label">Telefono</label>
                        <div class="col-sm-10">
                            <div class="input-group mb-2">
                                <input type="" id="inpTelefonoCliente" class="form-control" placeholder="Teléfono del cliente">  
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inpCelularCliente" class="col-sm-2 col-form-label">Celular</label>
                        <div class="col-sm-10">
                            <div class="input-group mb-2">
                                <input type="" id="inpCelularCliente" class="form-control" placeholder="Celular del cliente">  
                            </div>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <label for="inpEmailCliente" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <div class="input-group mb-2">
                                <input type="email" id="inpEmailCliente" class="form-control" placeholder="example@mail.com">  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-success pull-right" value="Registrar">  
        </div>
    </div>
    <hr>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template/clientes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\EteslaPanelesSolares\resources\views/cotizador/misClientes.blade.php ENDPATH**/ ?>