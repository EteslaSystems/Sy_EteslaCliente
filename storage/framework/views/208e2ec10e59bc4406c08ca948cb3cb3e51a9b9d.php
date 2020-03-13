<!-- Aqui va la ruta que redirecciona al nicio del Rol #Seller# -->
<?php $__env->startSection('title'); ?>
    <?php echo e('Vendedor'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('rutaInicioUser'); ?>
    <?php echo e('/s'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('sidebar'); ?>
    <a href="#cotizadorSubmenu" data-toggle="collapse" aria-expanded="false" class="list-group-item list-group-item-action bg-light dropdown-toggle"><img src="https://img.icons8.com/plasticine/30/000000/calculator.png"> Cotizador</a>
    <ul class="collapse list-unstyled" id="cotizadorSubmenu">
        <li>
            <a class="list-group-item list-group-item-action bg-ligth" href="/mediaTension">Media tensión</a>
        </li>
        <li>
            <a class="list-group-item list-group-item-action bg-ligth" href="/bajaTension">Baja tensión</a>
        </li>
    </ul>
    <a href="#clientesSubmenu" data-toggle="collapse" aria-expanded="false" class="list-group-item list-group-item-action bg-light dropdown-toggle"><img src="https://img.icons8.com/dusk/30/000000/customer-insight.png"> Clientes</a>
    <ul class="collapse list-unstyled" id="clientesSubmenu">
        <li>
            <a class="list-group-item list-group-item-action bg-ligth" href="/registrarCliente">Mis clientes</a>
        </li>
        <li>
            <a class="list-group-item list-group-item-action bg-ligth" href="/clientes">Todos los clientes</a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Aqui va el contenido del DOM - Vista: 'inicioS' -->
    <?php echo $__env->yieldContent('inicioS'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/roles/seller.blade.php ENDPATH**/ ?>