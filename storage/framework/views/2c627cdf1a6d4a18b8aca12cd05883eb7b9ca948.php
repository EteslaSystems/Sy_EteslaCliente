<?php $__env->startSection('contenidoAdmin'); ?>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm">
                    <div class="form-group row">
                        <label for="nombMaterialF" class="col-sm-6 col-form-label">Nombre material</label>
                        <div class="col-sm-10">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" id="nombMaterialF" placeholder="Nombre material" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="precioMaterialF" class="col-sm-6 col-form-label">Precio</label>
                        <div class="col-sm-10">
                            <div class="input-group mb-2">
                                <input type="" class="form-control" id="precioMaterialF" placeholder="Precio">
                            </div>
                        </div>
                    </div>
                    <?php $__env->startSection('formgroup-1'); ?>
                    <?php echo $__env->yieldSection(); ?>
                </div>
                <div class="col-sm">
                    <div class="form-group row">
                        <label for="marcaMaterialF" class="col-sm-4 col-form-label">Marca</label>
                        <div class="col-sm-10">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" id="marcaMaterialF" placeholder="Marca">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ISCMaterialF" class="col-sm-6 col-form-label">ISC</label>
                        <div class="col-sm-10">
                            <div class="input-group mb-2">
                                <input type="" class="form-control" id="ISCMaterialF" placeholder="ISC">
                            </div>
                        </div>
                    </div>
                    <?php $__env->startSection('formgroup-2'); ?>
                    <?php echo $__env->yieldSection(); ?>
                </div>
                <div class="col-sm">
                    <div class="form-group row">
                        <label for="potenciaMaterialF" class="col-sm-4 col-form-label">Potencia</label>
                        <div class="col-sm-10">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" id="potenciaMaterialF" placeholder="Potencia">
                            </div>
                        </div>
                    </div>
                    <?php $__env->startSection('formgroup-3'); ?>
                </div>
                <?php echo $__env->yieldSection(); ?>
            </div>
        </div>
    </div>
    <br>
    <?php echo $__env->yieldContent('tablaMaterialFotovoltaico'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('roles/admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\EteslaPanelesSolares\resources\views/template/materialFotovoltaico.blade.php ENDPATH**/ ?>