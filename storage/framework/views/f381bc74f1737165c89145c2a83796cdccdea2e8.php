<?php $__env->startSection('bodyLog'); ?>
    <!-- Barra de navegación -->
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
	  	<!-- Icono -->
	  	<a class="navbar-brand" href="#">
            <img src="img/eTesla_logo.png" width="100" height="40">
	  	</a>
	  	<!-- Botones -->
	  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#contenidoBarraNavegacion" aria-controls="contenidoBarraNavegacion" aria-expanded="false" aria-label="Barra navegación">
    		<span class="navbar-toggler-icon"></span>
  		</button>
	  	<!-- Contenido(opciones) -->
	  	<div class="collapse navbar-collapse" id="contenidoBarraNavegacion">
	  		<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
	  			<li class="nav-item">
	  				<a class="nav-link" href="/login">Login</a>
	  			</li>
	  		</ul>
	  	</div>
	</nav>
    <!-- Contenido -->
    <section class="py-5">
        <div class="container">
            <?php echo $__env->yieldContent('contentRegister'); ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('authentication/templateAuth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\EteslaPanelesSolares\resources\views/authentication/navbarAuth.blade.php ENDPATH**/ ?>