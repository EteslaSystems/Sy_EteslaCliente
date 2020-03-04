<?php $__env->startSection('enginerContent'); ?>
    <!-- Se esta herendando de un "container - fluid" de la vista 'body.blade.php' -->
    <br>
    <div class="row w-100">
        <div class="col-md-3">
            <div class="card border-warning mx-sm-1 p-3">
                <div class="text-center mt-3"><h2>Instalación x</h2></div>
                <div class="text-center mt-2"><p>Detalle de la instalación</p></div><br>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Detalles</button>
            </div>
        </div>
    </div>
    <!-- Modal - Detalles de instalación -->
    <!-- Aqui se podrá "deliberar" la instalación pendiente -->
    <div class="modal" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-tittle">Detalles de la instalación x</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Detalles de la instalación X.</p>
                    <button id="btnLibInst" type="button" class="btn btn-outline-warning pull-right"><strong>Liberar instalación</strong></button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('roles/enginer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\EteslaPanelesSolares\resources\views/roles/enginer/instalacion.blade.php ENDPATH**/ ?>