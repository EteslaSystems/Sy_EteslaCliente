<?php $__env->startSection('body'); ?>
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading" align="center">
            <img width="20%" height="30px" src="<?php echo e(asset('img/icon/solar-panel-icon.png')); ?>">
            <br>
            <strong>ETESLA<small>&copy;</small></strong>
            <br>
            <small>Paneles Solares</small>
        </div>
        <div class="list-group list-group-flush">
            <?php $__env->startSection('sidebar'); ?>
            <?php echo $__env->yieldSection(); ?>
        </div>
    </div> 
    <!-- Navbar -->   
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-dark border-bottom">
            <a id="menu-toggle" class="navbar-brand">
                <img src="<?php echo e(asset('img/eTesla_logo.png')); ?>" width="100" height="40">
            </a>
            <!-- Responsive Toggle -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" id="navOption" href="/">Inicio<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Editar perfil">
                            <img width="100%" height="30px" src="<?php echo e(asset('img/icon/user-icon.png')); ?>">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/perfil">Editar perfil</a>
                            <a class="dropdown-item" href="/logout">Cerrar sesión</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Alert modal - Cuadro de dialogo -->
        <div class="modal fade" id="mdlCuadroDialogo" style="display:none;">
            <!-- Modal content -->
            <div class="modal-content" id="mdlCuadroDialogoContent">
                <div class="row">
                    <div class="col-4">
                        <img alt="30px;" id="mdlImage">
                    </div>
                    <div class="col-8">
                        <span class="close">&times;</span>
                        <p id="mdlMessage"></p>
                    </div>
                </div>
                <div class="modal-footer" id="mdlCuadroDialogoFooter" style="display:none;">
                    <button class="btn btn-default" type="button" id="btnModalConfirm" style="display:none;">Confirmar</button>
                    <button class="btn btn-default" type="button" id="btnModalCancel" style="display:none;">Cancelar</button>
                </div>
            </div>
        </div>

        <!-- Contenido de la página-->
        <div class="container-fluid">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template/head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/template/body.blade.php ENDPATH**/ ?>