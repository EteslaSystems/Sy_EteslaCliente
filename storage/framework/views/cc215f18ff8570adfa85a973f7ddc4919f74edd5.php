    <?php $__env->startSection('contenidoAdmin'); ?>
        <?php echo $__env->make('roles.admin.forms.form-new-panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  

        <hr>

        <div class="content">
            <div class="table-responsive-sm">
                <table class="table table-bordered table-hover table-sm text-center">
                    <thead class="thead-dark ">
                        <tr>
                            <th style="width: 30%;">Nombre</th>
                            <th style="width: 10%;">Marca</th>
                            <th style="width: 10%;">Potencia</th>
                            <th style="width: 10%;">ISC</th>
                            <th style="width: 10%;">Precio</th>
                            <th style="width: 10%;">Garantia</th>
                            <th style="width: 10%;">Origen</th>
                            <th style="width: 10%;">VOC</th>
                            <th style="width: 10%;">VMP</th>
                            <th style="width: 10%;" colspan="2">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $__currentLoopData = $vPaneles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($details->vNombreMaterialFot); ?></td>
                                <td><?php echo e($details->vMarca); ?></td>
                                <td><?php echo e($details->fPotencia); ?></td>
                                <td><?php echo e($details->fISC); ?></td>
                                <td><?php echo e($details->fPrecio); ?></td>
                                <td><?php echo e($details->vGarantia); ?></td>
                                <td><?php echo e($details->vOrigen); ?></td>
                                <td><?php echo e($details->fVOC); ?></td>
                                <td><?php echo e($details->fVMP); ?></td>
                                <td>
                                    <a href="<?php echo e(url('editar-panel', [$details->idPanel])); ?>" class="btn btn-sm btn-warning" title="Editar">
                                        <img src="https://img.icons8.com/material-outlined/18/000000/multi-edit.png">
                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo e(url('eliminar-panel', [$details->idPanel])); ?>" class="btn btn-sm btn-danger" title="Eliminar">
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
<?php echo $__env->make('roles/admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/roles/admin/paneles.blade.php ENDPATH**/ ?>