<?php $__env->startSection('content'); ?>
<?php $__env->startSection('agregarClientes'); ?>
<?php echo $__env->yieldSection(); ?>
    <div id="accordionExample" class="accordion">
        <?php $__empty_1 = true; $__currentLoopData = $consultarClientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="card">
                <!-- Header Accordion -->
                <div id="headingTwo" class="card-header">
                    <h2 class="mb-0">
                        <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <?php echo e($cliente->vNombrePersona); ?> <?php echo e($cliente->vPrimerApellido); ?> <?php echo e($cliente->vSegundoApellido); ?>

                        </button>
                    </h2>
                    <div class="d-flex flex-row-reverse">
                        <div class="p-2 btn-group">
                            <button type="button" class="btn btn-warning" title="Editar cliente"><img src="https://img.icons8.com/ios/20/000000/edit--v1.png"/></button>
                            <button type="button" class="btn btn-danger" title="Eliminar cliente"><img src="https://img.icons8.com/ios/20/000000/delete-trash.png"/></button>
                        </div>
                        <!--div class="p-2">
                            Aqui va la cantidad de propuestas que tiene el cliente
                            0
                        </div-->
                    </div>
                </div>
                <!-- Fin_Header Accordion -->
                <!-- Body Accordion -->
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body row">
                        <div class="col">
                                <ul class="list-group">
                                    <li id="liIdCliente" style="display:none;"><?php echo e($cliente->idCliente); ?></li>
                                <li class="list-group-item"><strong>Telefono(s): </strong><?php echo e($cliente->vTelefono); ?> / <?php echo e($cliente->vCelular); ?></li>
                                <li class="list-group-item"><strong>Mail: </strong><?php echo e($cliente->vEmail); ?></li>
                                <li class="list-group-item"><strong>Direccion: </strong><?php echo e($cliente->vCalle); ?> <?php echo e($cliente->vMunicipio); ?> <?php echo e($cliente->vEstado); ?></li>
                                <li class="list-group-item"><strong>Fecha creacion: </strong><?php echo e($cliente->created_at); ?></li>
                            </ul>
                        </div>
                        <div class="col">
                            <div class="pull-right">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg" onclick='getPropuestasByCliente("<?php echo e($cliente->idPersona); ?>")'><img src="https://img.icons8.com/ios/20/000000/document--v1.png"/><strong>Propuestas</strong></button>
                            </div>
                            <!-- Modal *lista-propuestas* -->
                            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Propuestas</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table id="tbPropuestas" class="table table-bordered table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">Propuesta</th>
                                                            <th class="text-center">Fecha creacion</th>
                                                            <th class="text-center">Fecha expiracion</th>
                                                            <th class="text-center">Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fin_Modal *lista-propuestas* -->
                        </div>
                    </div>
                </div>
                <!-- Fin_Body Accordion -->
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <h1>No cuenta con clientes registrados!</h1>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('roles/seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/template/clientes.blade.php ENDPATH**/ ?>