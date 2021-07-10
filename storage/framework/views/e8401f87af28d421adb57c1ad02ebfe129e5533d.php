<?php $__env->startSection('content'); ?>
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
                                <button type="button" class="btn btn-sm btn-warning" onclick='editarPanel("<?php echo e($panel->idPanel); ?>")' title="Editar"><img src="https://img.icons8.com/ios/20/000000/edit--v1.png"/></button>
                                <button id="eliminarPanel" type="button" class="btn btn-sm btn-danger"  title="Eliminar"><img src="https://img.icons8.com/ios/20/000000/delete-forever--v1.png"/></button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <h1>Sin registros</h1>
                <?php endif; ?>
            </tbody>
        </table>
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
                                <button id="btnEditarInversor" type="button" onclick='editarInversor("<?php echo e($inversor->idInversor); ?>")' class="btn btn-sm btn-warning" title="Editar"><img src="https://img.icons8.com/ios/20/000000/edit--v1.png"/></button>
                                <button id="btnEliminarInversor" type="button" class="btn btn-sm btn-danger" title="Eliminar"><img src="https://img.icons8.com/ios/20/000000/delete-forever--v1.png"/></button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <h1>Sin registros</h1>
                <?php endif; ?>
            </tbody>
        </table>
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
                                <button id="btnEditarEstructura" type="button" onclick='editarEstructura("<?php echo e($estructura->idEstructura); ?>")' class="btn btn-sm btn-warning" title="Editar"><img src="https://img.icons8.com/ios/20/000000/edit--v1.png"/></button>
                                <button id="btnEliminarEstructura" type="button" class="btn btn-sm btn-danger" title="Eliminar"><img src="https://img.icons8.com/ios/20/000000/delete-forever--v1.png"/></button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <h1>Sin registros</h1>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Modal Edit [panel, inversor, estructura] -->
<div class="modal fade" id="editModalEquipos" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body container">
                <div class="row">
                    <form class="form-inline">
                        <div class="col">
                            <div class="form-group mb-2">
                                <label for="vNombreMaterialFot">Nombre</label>
                                <input type="text" class="form-control" id="vNombreMaterialFot">
                            </div>
                            <div class="form-group mb-2">
                                <label for="vMarca">Marca</label>
                                <input type="text" class="form-control" id="vMarca">
                            </div>
                            <div class="form-group mb-2">
                                <label for="fPotencia">Potencia</label>
                                <input type="number" class="form-control" id="fPotencia">
                            </div>
                            <div class="form-group mb-2">
                                <label for="fPrecio">Precio</label>
                                <input type="number" class="form-control" id="fPrecio">
                            </div>
                            <div class="form-group mb-2">
                                <label for="vGarantia">Garantia</label>
                                <input type="number" class="form-control" id="vGarantia">
                            </div>
                            <div class="form-group mb-2">
                                <label for="vOrigen">Origen</label>
                                <input type="text" class="form-control" id="vOrigen">
                            </div>
                            <div class="form-group mb-2">
                                <label for="fISC">ISC</label>
                                <input type="number" class="form-control" id="fISC">
                            </div>
                            <div class="form-group mb-2">
                                <label for="fVOC">VOC</label>
                                <input type="number" class="form-control" id="fVOC">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group mb-2">
                                <label for="iVMIN">VMIN</label>
                                <input type="number" class="form-control" id="iVMIN">
                            </div>
                            <div class="form-group mb-2">
                                <label for="iVMAX">VMAX</label>
                                <input type="number" class="form-control" id="iVMAX">
                            </div>
                            <div class="form-group mb-2">
                                <label for="iPMAX">PMIN</label>
                                <input type="number" class="form-control" id="iPMAX">
                            </div>
                            <div class="form-group mb-2">
                                <label for="iPMIN">PMAX</label>
                                <input type="number" class="form-control" id="iPMIN">
                            </div>
                            <div class="form-group mb-2">
                                <label for="iVMP">VMP</label>
                                <input type="number" class="form-control" id="iVMP">
                            </div>
                            <div class="form-group mb-2">
                                <label for="vTipoInversor">Tipo de Equipo</label>
                                <select id="vTipoInversor">
                                    <option value="-1">Inversor</option>
                                    <option>Inversor</option>
                                    <option>MicroInversor</option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="iPanelSoportados">Paneles soportados</label>
                                <input type="number" class="form-control" id="iPanelSoportados">
                            </div>
                        </div>
                        <div id="imgEquipo" class="col">
                            <div class="form-group">
                                <label for="imgRuta">Ruta imagen logotipo</label>
                                <input type="text" class="form-control" id="imgRuta">
                                <img id="imgLogoEquipo" src="#"/>
                            </div>
                            <button type="button" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
    /*#section Panel*/
    function editarPanel(idPanel){
        $('#editModalEquipos').modal('show');
    }
    /*#endsection*/
    /*#section Inversor*/
    // function editarInversor(){
        
    // }
    /*#endsection*/
    /*#section Estructura*/
    // function editarEstructura(){
        
    // }
    /*#endsection*/
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('roles/admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/roles/admin/materialFotovoltaico.blade.php ENDPATH**/ ?>