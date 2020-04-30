<?php $__env->startSection('content'); ?>
    <?php $__env->startSection('agregarClientes'); ?>
    <?php echo $__env->yieldSection(); ?>
    <div class="table-responsive-sm">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Telefono</th>
                    <th>Celular</th>
                    <th>Email</th>
                    <th style="text-align:center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if(isset($consultarClientes)): ?>
                    <?php ($numeroLista = 1); ?>
                    <?php $__currentLoopData = $consultarClientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th><?php echo e($numeroLista); ?></th>
                            <td><?php echo e($cliente->vNombrePersona); ?>&nbsp;<?php echo e($cliente->vPrimerApellido); ?>&nbsp;<?php echo e($cliente->vSegundoApellido); ?></td>
                            <td><?php echo e($cliente->vCalle); ?>,&nbsp;<?php echo e($cliente->vMunicipio); ?>,&nbsp;<?php echo e($cliente->vEstado); ?></td>
                            <td><?php echo e($cliente->vTelefono); ?></td>
                            <td><?php echo e($cliente->vCelular); ?></td>
                            <td><?php echo e($cliente->vEmail); ?></td>
                            <td>
                                <a href="<?php echo e(url('editar-cliente', [$cliente->idPersona])); ?>" class="btn btn-sm btn-warning" title="Editar">
                                    <img src="https://img.icons8.com/material-outlined/18/000000/multi-edit.png">
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo e(url('eliminar-cliente', [$cliente->idPersona])); ?>" class="btn btn-sm btn-danger" title="Eliminar">
                                    <img src="https://img.icons8.com/material-outlined/18/000000/delete-trash.png">
                                </a>
                            </td>
                        </tr>
                        <?php ($numeroLista = $numeroLista + 1); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="modal-editarcliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Agregar cliente.</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12">
                            <form method="POST" action="" class="background-muted">
                                <div class="row mn-1 pa-ma-1">
                                    <div class="col-sm-6 col-md-4 offset-md-2">
                                        <div class="form-group">
                                            <label for="serviceCFE">No. servicio CFE</label>
        
                                            <input type="number" class="form-control border border-success" id="serviceCFE" placeholder="Ingrese un valor.">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label for="inpCPCliente">Código postal</label>
        
                                            <input type="number" class="form-control border border-success" id="inpCPCliente" onblur="postalCodeLookup();" placeholder="Ingrese un valor.">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-12 col-sm-12 col-md-12">
                            <form action="<?php echo e(url('agregar-cliente')); ?>" method="POST" class="row">
                                <?php echo csrf_field(); ?>

                                <div class="col-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="nameClient">Nombre(s)</label>

                                        <input type="text" class="form-control" id="nameClient" name="nombrePersona" placeholder="Ingrese un valor." value="<?php echo e(old('nombrePersona')); ?>">

                                        <?php $__errorArgs = ['nombrePersona'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="firstClient">Apellido Paterno</label>
    
                                        <input type="text" class="form-control" id="firstClient" name="primerApellido" placeholder="Ingrese un valor." value="<?php echo e(old('primerApellido')); ?>">

                                        <?php $__errorArgs = ['primerApellido'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="lastClient">Apellido Materno</label>
    
                                        <input type="text" class="form-control" id="lastClient" name="segundoApellido" placeholder="Ingrese un valor." value="<?php echo e(old('segundoApellido')); ?>">

                                        <?php $__errorArgs = ['segundoApellido'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="emailClient">Correo Electrónico</label>
    
                                        <input type="text" class="form-control" id="emailClient" name="email" placeholder="Ingrese un valor." value="<?php echo e(old('email')); ?>">

                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="phoneClient">Teléfono</label>
    
                                        <input type="number" class="form-control" id="phoneClient" name="telefono" placeholder="Ingrese un valor."value="<?php echo e(old('telefono')); ?>" onkeypress="return filterFloat(event,this);">

                                        <?php $__errorArgs = ['telefono'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="cellphoneClient">Teléfono celular</label>

                                        <input type="number" class="form-control" id=cellphoneClient" name="celular" placeholder="Ingrese un valor." value="<?php echo e(old('celular')); ?>" onkeypress="return filterFloat(event,this);">

                                        <?php $__errorArgs = ['celular'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="addressClient">Dirección</label>
    
                                        <input type="text" class="form-control" id="addressClient" name="calle" placeholder="Ingrese un valor." value="<?php echo e(old('calle')); ?>">

                                        <?php $__errorArgs = ['calle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="inpColoniaCliente">Colonia</label>
    
                                        <input type="" class="form-control" id="inpColoniaCliente" name="colonia" onblur="closeSuggestBox();" placeholder="Ingrese un valor." value="<?php echo e(old('colonia')); ?>" disabled="true">
                                        <span style="position: absolute; top: 243px; left: 16px; z-index:50;visibility: hidden;" id="suggestBoxElement"></span></span>

                                        <?php $__errorArgs = ['colonia'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="inpMunicCliente">Municipio / Localidad</label>
    
                                        <input type="text" class="form-control" id="inpMunicCliente" name="municipio" placeholder="Ingrese un valor." value="<?php echo e(old('municipio')); ?>" disabled="true">

                                        <?php $__errorArgs = ['municipio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="inpEstadoCliente">Estado</label>
    
                                        <input type="" class="form-control" id="inpEstadoCliente" name="estado" placeholder="Ingrese un valor." value="<?php echo e(old('estado')); ?>" disabled="true">

                                        <?php $__errorArgs = ['estado'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('roles/seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/template/clientes.blade.php ENDPATH**/ ?>