<!-- Aqui va la ruta que redirecciona al nicio del Rol #Operations# -->
<?php $__env->startSection('rutaInicioUser'); ?>
    <?php echo e('/o'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('sidebar'); ?>
    <a href="#cotizadorSubmenu" data-toggle="collapse" aria-expanded="false" class="list-group-item list-group-item-action bg-light dropdown-toggle"><img src="https://img.icons8.com/plasticine/30/000000/gears.png"> Operaciones</a>
    <ul class="collapse list-unstyled" id="cotizadorSubmenu">
        <li>
            <a class="list-group-item list-group-item-action bg-ligth" href="#">Pendientes</a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>
<?php $__env->startSection(''); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/roles/operations.blade.php ENDPATH**/ ?>