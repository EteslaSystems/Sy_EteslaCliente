<?php $__env->startSection('cotizadores'); ?>
<div class="card shadow mb-3">
    <div class="card-header">
        <p class="d-block mn-1 p-titulos">
            <i class="fa fa-bolt" aria-hidden="true"></i>
            Cotización individual
        </p>        
    </div>
    <div class="card-body">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="mn-1">Cantidad paneles:</label>
                                <input class="form-control input-sm" type="number" id="inpCantPaneles">
                            </div>
                            <div class="form-group">
                                <label class="mn-1">Seleccionar Panel:</label>
                                <select class="form-control" id="optPaneles" onchange="getDropDownListValues()">
                                    <option disabled selected>Elige una opción:</option>
                                        <?php $__currentLoopData = $vPaneles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($details->idPanel); ?>"><?php echo e($details->vNombreMaterialFot); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="mn-1">Cantidad inversores:</label>
                                <input class="form-control input-sm" type="number" id="inpCantInversores">
                            </div>
                            <div class="form-group">
                                <label class="mn-1">Seleccionar Inversor:</label>
                                <select class="form-control" id="optInversores" onchange="getDropDownListValues()">
                                    <option disabled selected>Elige una opción:</option>
                                        <?php $__currentLoopData = $vInversores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($details->idInversor); ?>" ><?php echo e($details->vNombreMaterialFot); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 offset-md-8 text-right mb-3">
                            <button onclick="sendSingleQuotation()" class="btn btn-green text-uppercase shadow">
                                <i class="fa fa-check" aria-hidden="true"></i>
                                Calcular
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="card shadow mb-3">
    <div class="card-body">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <div class="form-row">
                        Resultados
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('roles/seller/cotizador/cotizador', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/roles/seller/cotizador/individual.blade.php ENDPATH**/ ?>