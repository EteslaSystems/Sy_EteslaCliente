<?php $__env->startSection('content'); ?>
<?php $__env->startSection('agregarClientes'); ?>
<?php echo $__env->yieldSection(); ?>
    <div class="container-fluid">
        <?php if(@isset($consultarClientes)): ?>
            <?php if (! ($consultarClientes)): ?>
                <h1>No cuenta con clientes registrados!</h1>
            <?php else: ?>
                <table class="table table-sm table-striped table-bordered">
                    <thead class="bg-dark text-light">
                        <tr>
                            <th scope="col" style="text-align:center;">Cliente</th>
                            <th scope="col" style="text-align:center;">Creacion</th>
                            <th scope="col" style="text-align:center;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $consultarClientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($cliente->vNombrePersona); ?> <?php echo e($cliente->vPrimerApellido); ?> <?php echo e($cliente->vSegundoApellido); ?></td>
                                <td><?php echo e(date('d-M-y', strtotime($cliente->created_at))); ?></td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button id="btnDetails" type="button" class="btn btn-primary btn-sm" title="Detalles" data-toggle="modal" data-target="#modalDetailsClient" onclick="mostrarClienteDetails('<?php echo e($cliente->idCliente); ?>')">
                                            <img src="<?php echo e(asset('img/icon/details.png')); ?>" height="19px">
                                        </button>
                                        <button id="btnEliminar" type="button" class="btn btn-danger btn-sm" title="Eliminar">
                                            <img src="<?php echo e(asset('img/icon/papelera-icon.png')); ?>" height="19px"/>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <!-- Modal - Detalles Cliente -->
                <div id="modalDetailsClient" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Detalles</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="limpiarTablaPropuestas()">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <!-- Cliente - Info - Details  -->
                                <nav>
                                    <div class="form-row">
                                        <div class="col">
                                            <div id="cabezales-nav" class="nav nav-tabs" role="tablist">
                                                <a id="ciente-info-tab" class="nav-item nav-link active"  data-toggle="tab" href="#cliente-info" role="tab" aria-controls="cliente-info" aria-selected="true" onclick="editarClienteDetails(3)">Cliente</a>
                                                <a id="propuestas-info-tab" class="nav-item nav-link" data-toggle="tab" href="#propuestas-info" role="tab" aria-controls="propuestas-info" aria-selected="false">Propuestas</a>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <button id="editClienteDetails" type="button" class="btn btn-xs btn-warning pull-right" title="Editar" onclick="editarClienteDetails(0)">
                                                <img src="<?php echo e(asset('img/icon/editar-icon.png')); ?>" height="19px"/>
                                            </button>
                                            <div id="grBttnsDetails" class="btn-group pull-right" role="group" aria-label="Basic example" style="display: none;">
                                                <button id="guardarClienteDetails" type="button" class="btn btn-xs btn-success" title="Guardar cambios" onclick="editarClienteDetails(1)">
                                                    <img src="<?php echo e(asset('img/icon/guardar.png')); ?>"/>
                                                </button>
                                                <button id="cancelClienteDetails" type="button" class="btn btn-xs btn-danger" title="Cancelar" onclick="editarClienteDetails(2)">
                                                    <img src="<?php echo e(asset('img/icon/cancelar.png')); ?>" height="19px"/>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </nav>
                                <div class="tab-content">
                                    <div id="cliente-info" class="tab-pane fade show active" role="tabpanel" aria-labelledby="ciente-info-tab">
                                        <div class="row text-center">
                                            <div id="infoCliente" class="col">
                                                <div class="form-group">
                                                    <div class="input-group mb-2 mr-sm-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Nombre</div>
                                                        </div>
                                                        <input id="inpDetailsClienteNombre" type="text" class="form-control inpDetailsCliente" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group mb-2 mr-sm-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">1er. Apellido</div>
                                                        </div>
                                                        <input id="inpDetailsCliente1erAp" type="text" class="form-control inpDetailsCliente" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group mb-2 mr-sm-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">2do. Apellido</div>
                                                        </div>
                                                        <input id="inpDetailsCliente2doAp" type="text" class="form-control inpDetailsCliente" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group mb-2 mr-sm-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Telefono</div>
                                                        </div>
                                                        <input id="inpDetailsClienteTel" type="text" class="form-control inpDetailsCliente" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group mb-2 mr-sm-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Celular</div>
                                                        </div>
                                                        <input id="inpDetailsClienteCel" type="text" class="form-control inpDetailsCliente" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="infoDireccion" class="col">
                                                <div class="form-group">
                                                    <div class="input-group mb-2 mr-sm-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">C.P.</div>
                                                        </div>
                                                        <input id="inpDetailsClienteCP" type="text" class="form-control inpDetailsCliente" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group mb-2 mr-sm-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Calle</div>
                                                        </div>
                                                        <input id="inpDetailsClienteCalle" type="text" class="form-control inpDetailsCliente" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group mb-2 mr-sm-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Municipio</div>
                                                        </div>
                                                        <input id="inpDetailsClienteMunic" type="text" class="form-control inpDetailsCliente" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group mb-2 mr-sm-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Ciudad</div>
                                                        </div>
                                                        <input id="inpDetailsClienteCiud" type="text" class="form-control inpDetailsCliente" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group mb-2 mr-sm-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Estado</div>
                                                        </div>
                                                        <input id="inpDetailsClienteEstado" type="text" class="form-control inpDetailsCliente" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="propuestas-info" class="tab-pane fade" role="tabpanel" aria-labelledby="propuestas-tab">
                                        <div class="table-responsive">
                                            <table id="tblPropuestas" class="table table-sm table-bordered table-striped text-center">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Tipo</th>
                                                        <th scope="col">Creacion</th>
                                                        <th scope="col">Expiracion</th>
                                                        <th scope="col">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal - Propuestas Data -->
                <div id="modalPropstFromClient" class="modal fade  bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog  modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Propuestas</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Aqui vienen un listado de las propuestas</p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('roles/seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/template/clientes.blade.php ENDPATH**/ ?>