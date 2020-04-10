    <?php $__env->startSection('title'); ?>
        <?php echo e('Administrador'); ?>

    <?php $__env->stopSection(); ?>
    
    <?php $__env->startSection('rutaInicioUser'); ?>
        <?php echo e('/admin'); ?>

    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('sidebar'); ?>
        <a href="#cotizadorSubmenu" data-toggle="collapse" aria-expanded="false" class="list-group-item list-group-item-action bg-light">
            <img src="https://img.icons8.com/officel/30/000000/solar-panel.png"> Material fotovoltaico
        </a>

        <ul class="collapse list-unstyled" id="cotizadorSubmenu">
            <li>
                <a class="list-group-item list-group-item-action bg-ligth" href="/paneles">Paneles</a>
            </li>
            <li>
                <a class="list-group-item list-group-item-action bg-ligth" href="/inversores">Inversores</a>
            </li>
        </ul>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('content'); ?>
        <br>
        <?php echo $__env->yieldContent('contenidoAdmin'); ?>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('template/body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('template/body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/roles/admin.blade.php ENDPATH**/ ?>