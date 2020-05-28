<?php $__env->startSection('title'); ?>
    <?php echo e('Ingeniero'); ?>

<?php $__env->stopSection(); ?>
<!-- Aqui va la ruta que redirecciona al nicio del Rol #Seller# -->
<?php $__env->startSection('rutaInicioUser'); ?>
    <?php echo e('/e'); ?>

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
        <li>
            <a class="list-group-item list-group-item-action bg-ligth" href="/individual">Individual</a>
        </li>
    </ul>
    <a href="/levantamiento" aria-expanded="false" class="list-group-item list-group-item-action bg-light"><img src="https://img.icons8.com/cotton/25/000000/document-1.png"> Levantamiento</a>
    <a href="/instalacion" aria-expanded="false" class="list-group-item list-group-item-action bg-light"><img src="https://img.icons8.com/dusk/30/000000/swiss-army-knife.png"> Instalaciones</a>
    <a href="configuracion" aria-expanded="false" class="list-group-item list-group-item-action bg-light"><img src="https://img.icons8.com/ios-filled/30/000000/strategy-board.png"> Configuración</a>
    <a href="#" data-toggle="collapse" aria-expanded="false" class="list-group-item list-group-item-action bg-light"><img src="https://img.icons8.com/bubbles/40/000000/ticket.png"> Tickets</a>
    <a href="/otros-materiales" aria-expanded="false" class="list-group-item list-group-item-action bg-light"><img src="https://img.icons8.com/cotton/40/000000/commodity.png"/> Materiales</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
	<div id="page-content-wrapper">
		<div class="container-fluid">
		    <br>
		    <?php echo $__env->yieldContent('enginerContent'); ?>
		</div>
	</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('template/body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/roles/enginer.blade.php ENDPATH**/ ?>