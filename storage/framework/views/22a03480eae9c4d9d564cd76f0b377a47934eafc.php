<?php $__env->startSection('inicioS'); ?>
    <br>
    <div class="row justify-content-md-center">
        <div class="card" style="width: 60rem;">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <img src="<?php echo e(asset('img/billeteDolar.png')); ?>" width="400px" height="200px">
                    </div>
                    <div class="hr-vertical"></div>
                    <div class="col">
                        <?php $__currentLoopData = $precioDolar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $precioDolars): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-group">
                                <label><strong>Precio dolar</strong></label>
                                <p>$<?php echo e($precioDolars -> precioDolar); ?> MXN</p>
                            </div>
                            <div class="form-group">
                                <label><strong>Ultima actualizacion</strong></label>
                                <p><?php echo e($precioDolars -> fechaUpdate); ?></p>
                            </div>
                            <div class="form-group">
                                <label><strong>Fuente web</strong></label><br>
                                <a href="<?php echo e($precioDolars -> fuente); ?>"><?php echo e($precioDolars -> fuente); ?></a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>  
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('roles/seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/roles/seller/inicioS.blade.php ENDPATH**/ ?>