<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <br>

<!-- Paneles -->
    <h3 align="center">Paneles</h3>
    <hr class="separador">
    <div class="table-wrapper-scroll-y my-scrollbar">
        <table class="table table-bordered table-striped table-sm tableScrollXY">
            <thead class="thead-dark" align="center">
                <tr>
                    <th scope="col">Marca</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Potencia</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Garantia</th>
                    <th scope="col">Origen</th>
                    <th scope="col">ISC</th>
                    <th scope="col">VOC</th>
                    <th scope="col">VMP</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $paneles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $panel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($panel->vMarca); ?></td>
                        <td><?php echo e($panel->vNombreMaterialFot); ?></td>
                        <td><?php echo e($panel->fPotencia); ?> W</td>
                        <td>$ <?php echo e($panel->fPrecio); ?> USD</td>
                        <td><?php echo e($panel->vGarantia); ?> años</td>
                        <td><?php echo e($panel->vOrigen); ?></td>
                        <td><?php echo e($panel->fISC); ?></td>
                        <td><?php echo e($panel->fVOC); ?></td>
                        <td><?php echo e($panel->fVMP); ?></td>
                        <td>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-sm btn-warning" title="Editar" data-toggle="modal" data-target=".edit-panel"><img src="https://img.icons8.com/ios/20/000000/edit--v1.png"/></button>
                                <button type="button" class="btn btn-sm btn-danger" title="Eliminar"><img src="https://img.icons8.com/ios/20/000000/delete-forever--v1.png"/></button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <h1>Sin registros</h1>
                <?php endif; ?>
            </tbody>
        </table>
        <!-- Modal Edit - Paneles -->
        <div class="modal fade bd-example-modal-lg edit-panel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                        editar paneles
                </div>
            </div>
        </div>
    </div>

    <br>

<!-- Inversores -->
    <h3 align="center">Inversores</h3>
    <hr class="separador">
    <div class="table-wrapper-scroll-y my-scrollbar">
        <table class="table table-bordered table-striped table-sm tableScrollXY">
            <thead class="thead-dark" align="center">
                <tr>
                    <th scope="col">Marca</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Potencia</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Garantia</th>
                    <th scope="col">Origen</th>
                    <th scope="col">PMIN</th>
                    <th scope="col">PMAX</th>
                    <th scope="col">VMIN</th>
                    <th scope="col">VMAX</th>
                    <th scope="col">ISC</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $inversores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inversor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($inversor->vMarca); ?></td>
                        <td><?php echo e($inversor->vNombreMaterialFot); ?></td>
                        <td><?php echo e($inversor->fPotencia); ?> W</td>
                        <td>$ <?php echo e($inversor->fPrecio); ?> USD</td>
                        <td><?php echo e($inversor->vGarantia); ?> años</td>
                        <td><?php echo e($inversor->vOrigen); ?></td>
                        <td><?php echo e($inversor->iPMIN); ?></td>
                        <td><?php echo e($inversor->iPMAX); ?></td>
                        <td><?php echo e($inversor->iVMIN); ?></td>
                        <td><?php echo e($inversor->iVMAX); ?></td>
                        <td><?php echo e($inversor->fISC); ?></td>
                        <td>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-sm btn-warning" title="Editar" data-toggle="modal" data-target=".edit-inversor"><img src="https://img.icons8.com/ios/20/000000/edit--v1.png"/></button>
                                <button type="button" class="btn btn-sm btn-danger" title="Eliminar"><img src="https://img.icons8.com/ios/20/000000/delete-forever--v1.png"/></button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <h1>Sin registros</h1>
                <?php endif; ?>
            </tbody>
        </table>
        <!-- Modal Edit - Inversores -->
        <div class="modal fade bd-example-modal-lg edit-inversor" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    editar inversores
                </div>
            </div>
        </div>
    </div>

    <br>

<!-- Estructuras -->
    <h3 align="center">Estructuras</h3>
    <hr class="separador">
    <div class="table-wrapper-scroll-y my-scrollbar">
        <table class="table table-bordered table-striped table-sm tableScrollXY">
            <thead class="thead-dark" align="center">
                <tr>
                    <th scope="col">Marca</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Garantia</th>
                    <th scope="col">Origen</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $estructuras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estructura): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($estructura->vMarca); ?></td>
                        <td><?php echo e($estructura->vNombreMaterialFot); ?></td>
                        <td>$ <?php echo e($estructura->fPrecio); ?> USD</td>
                        <td><?php echo e($estructura->vGarantia); ?> años</td>
                        <td><?php echo e($estructura->vOrigen); ?></td>
                        <td>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-sm btn-warning" title="Editar" data-toggle="modal" data-target=".edit-estructura"><img src="https://img.icons8.com/ios/20/000000/edit--v1.png"/></button>
                                <button type="button" class="btn btn-sm btn-danger" title="Eliminar"><img src="https://img.icons8.com/ios/20/000000/delete-forever--v1.png"/></button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <h1>Sin registros</h1>
                <?php endif; ?>
            </tbody>
        </table>
        <!-- Modal Edit - Estructuras -->
        <div class="modal fade bd-example-modal-lg edit-estructura" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    editar estructuras
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .my-scrollbar{
        position: relative;
        height: 200px;
        overflow: auto;
    }

    .table-wrapper-scroll-y{
        display: block;
    }

    .tableScrollXY thead tr th{
        position: sticky;
        top: 0;
        z-index: 10;
    }

    .separador{
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        border-top: 1px solid rgba(0, 0, 0, 0.1);
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('roles/admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/roles/admin/materialFotovoltaico.blade.php ENDPATH**/ ?>