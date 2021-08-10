<?php $__env->startSection('cotizadores'); ?>
<div class="card">
    <div class="card-body container-fluid">
        <div class="row">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h1>CONTROLES</h1>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="mn-1">Seleccionar Panel:</label>
                            <select class="form-control" id="optPaneles" onchange="getDropDownListValues()">
                                <option selected value="-1">Elige una opción:</option>
                                    <?php $__currentLoopData = $vPaneles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($details->idPanel); ?>"><?php echo e($details->vNombreMaterialFot); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mn-1">Cantidad paneles:</label>
                            <input class="form-control input-sm" type="number" id="inpCantPaneles" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="mn-1">Seleccionar Inversor:</label>
                            <select class="form-control" id="optInversores" onchange="getDropDownListValues()">
                                <option selected value="-1">Elige una opción:</option>
                                    <?php $__currentLoopData = $vInversores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($details->idInversor); ?>" ><?php echo e($details->vNombreMaterialFot); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mn-1">Cantidad inversores:</label>
                            <input class="form-control input-sm" type="number" id="inpCantInversores" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="mn-1">Seleccionar Estructura:</label>
                            <select id="optEstructuras" class="form-control">
                                <option selected value="-1">Elige una opción:</option>
                                    <?php $__currentLoopData = $vEstructuras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estructura): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($estructura->vMarca); ?>" ><?php echo e($estructura->vMarca); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mn-1">Cantidad estructuras:</label>
                            <input class="form-control input-sm" type="number" id="inpCantEstructuras" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div id="resultadosIndiv" class="row">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h1>R E S U L T A D O S</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>   
    .inpAnsw{
        border:0; 
        background: transparent !important; 
        border-bottom: 1px solid #888 !important;
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('roles/seller/cotizador/cotizador', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/roles/seller/cotizador/individual.blade.php ENDPATH**/ ?>