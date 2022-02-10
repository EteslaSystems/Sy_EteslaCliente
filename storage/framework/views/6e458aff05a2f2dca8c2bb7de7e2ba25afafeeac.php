<?php $__env->startSection('content'); ?>
<?php $__env->startSection('agregarClientes'); ?>
<?php echo $__env->yieldSection(); ?>
    <div class="container-fluid">
        <?php if(@isset($consultarClientes)): ?>
            <?php if (! ($consultarClientes)): ?>
                <h1>No cuenta con clientes registrados!</h1>
            <?php else: ?>
                <div class="table-responsive my-custom-scrollbar table-wrapper-scroll-y" style="min-height:89vh;">
                    <table class="table table-sm table-striped table-bordered">
                        <thead class="static-thead">
                            <th scope="col">
                                Cliente
                            </th>
                            <th scope="col">
                                Direccion
                            </th>
                            <th scope="col">
                                Creacion
                            </th>
                            <th scope="col">
                                Acciones
                            </th>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $consultarClientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="font-weight-bold text-justify">
                                        <?php echo e($cliente->vNombrePersona); ?> <?php echo e($cliente->vPrimerApellido); ?> <?php echo e($cliente->vSegundoApellido); ?>

                                    </td>
                                    <td class="text-center">
                                        <?php echo e($cliente->vCalle); ?>, C.P. <?php echo e($cliente->cCodigoPostal); ?>, 

                                        <?php if(!is_null($cliente->vMunicipio)): ?>
                                            <?php echo e($cliente->vMunicipio); ?>,
                                        <?php endif; ?>

                                         <?php echo e($cliente->vCiudad); ?>, <?php echo e($cliente->vEstado); ?>

                                    </td>
                                    <td class="text-center">
                                        <?php echo e(date('d-M-y', strtotime($cliente->created_at))); ?>

                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a id="btnDetails" type="button" href="<?php echo e(url('/clienteDetails',[$cliente->idCliente])); ?>" class="btn btn-primary btn-sm" title="Detalles">
                                                <img src="<?php echo e(asset('img/icon/details.png')); ?>" height="19px">
                                            </a>
                                            <a id="btnEliminar" type="button" class="btn btn-danger btn-sm" title="Eliminar">
                                                <img src="<?php echo e(asset('img/icon/papelera-icon.png')); ?>" height="19px"/>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('roles/seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/template/clientes.blade.php ENDPATH**/ ?>