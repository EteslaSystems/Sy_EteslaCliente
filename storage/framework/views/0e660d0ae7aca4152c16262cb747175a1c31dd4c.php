    <?php $__env->startSection('contenidoAdmin'); ?>
        <?php echo $__env->make('roles.admin.forms.form-new-investor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <hr>

        <div class="content">
            <div class="table-responsive-sm">
                <table class="table table-bordered table-hover table-sm text-center">
                    <thead class="thead-dark ">
                        <tr>
                            <th style="width: 32.5%;">Nombre</th>
                            <th style="width: 10%;">Marca</th>
                            <th style="width: 7.5%;">Potencia</th>
                            <th style="width: 5%;">ISC</th>
                            <th style="width: 7.5%;">Precio</th>
                            <th style="width: 12.5%;" colspan="2">VMAX / VMIN</th>
                            <th style="width: 12.5%;" colspan="2">PMAX / PMIN</th>
                            <th style="width: 12.5%;" colspan="2">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $__currentLoopData = $vInversores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($details->vNombreMaterialFot); ?></td>
                                <td><?php echo e($details->vMarca); ?></td>
                                <td><?php echo e($details->fPotencia); ?></td>
                                <td><?php echo e($details->fISC); ?></td>
                                <td><?php echo e($details->fPrecio); ?></td>
                                <td><?php echo e($details->iVMAX); ?></td>
                                <td><?php echo e($details->iVMIN); ?></td>
                                <td><?php echo e($details->iPMAX); ?></td>
                                <td><?php echo e($details->iPMIN); ?></td>
                                <td>
                                    <a href="<?php echo e(url('editar-inversor', [$details->idInversor])); ?>" class="btn btn-sm btn-warning" title="Editar">
                                        <img src="https://img.icons8.com/material-outlined/18/000000/multi-edit.png">
                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo e(url('eliminar-inversor', [$details->idInversor])); ?>" class="btn btn-sm btn-danger" title="Eliminar">
                                        <img src="https://img.icons8.com/material-outlined/18/000000/delete-trash.png">
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('roles/admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/roles/admin/inversores.blade.php ENDPATH**/ ?>