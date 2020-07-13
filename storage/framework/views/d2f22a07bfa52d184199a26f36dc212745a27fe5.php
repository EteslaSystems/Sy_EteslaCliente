    <?php $__env->startSection('contenidoAdmin'); ?>
		<div class="content">
            <div class="card">
                <h6 class="card-header">Editar inversor</h6>

                <div class="card-body">
                	<?php $__currentLoopData = $inversor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                    <form method="POST" action="<?php echo e(url('editar-inversor', $details->idInversor)); ?>">
						    <?php echo csrf_field(); ?>
						    <?php echo method_field('PUT'); ?>

						    <div class="container">
						        <div class="row row-cols-3">
						            <div class="col">
						                <div class="form-group">
						                    <label for="i_nombrematerial"><?php echo e(__('Nombre del material:')); ?></label>

						                    <small class="note-form darkred">* Campo requerido</small>

						                    <input id="i_nombrematerial" type="text" class="form-control <?php $__errorArgs = ['i_nombrematerial'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="i_nombrematerial" value="<?php echo e($details->vNombreMaterialFot); ?>" autofocus>

						                    <?php $__errorArgs = ['i_nombrematerial'];
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

						            <div class="col">
						                <div class="form-group">
						                    <label for="i_marca"><?php echo e(__('Marca:')); ?></label>

						                    <small class="note-form darkred">* Campo requerido</small>

						                    <input id="i_marca" type="text" class="form-control <?php $__errorArgs = ['i_marca'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="i_marca" value="<?php echo e($details->vMarca); ?>" autofocus>

						                    <?php $__errorArgs = ['i_marca'];
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

						            <div class="col">
						                <div class="form-group">
						                    <label for="i_precio"><?php echo e(__('Precio:')); ?></label>

						                    <small class="note-form darkred">* Campo requerido</small>

						                    <input id="i_precio" type="number" step="any" class="form-control <?php $__errorArgs = ['i_precio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="i_precio" value="<?php echo e($details->fPrecio); ?>" autofocus>

						                    <?php $__errorArgs = ['i_precio'];
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
						        </div>

						        <div class="row row-cols-3">
						            <div class="col">
						                <div class="form-group">
						                    <label for="i_potencia"><?php echo e(__('Potencia:')); ?></label>

						                    <small class="note-form darkred">* Campo requerido</small>

						                    <input id="i_potencia" type="number" step="any" class="form-control <?php $__errorArgs = ['i_potencia'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="i_potencia" value="<?php echo e($details->fPotencia); ?>" autofocus>

						                    <?php $__errorArgs = ['i_potencia'];
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

						            <div class="col">
						                <div class="form-group">
						                    <label for="i_isc"><?php echo e(__('Intensidad de cortocircuito:')); ?></label>

						                    <small class="note-form darkred">* Campo requerido</small>

						                    <input id="i_isc" type="number" step="any" class="form-control <?php $__errorArgs = ['i_isc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="i_isc" value="<?php echo e($details->fISC); ?>" autofocus>

						                    <?php $__errorArgs = ['i_isc'];
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

						            <div class="col">
						                <div class="form-group">
						                    <label for="i_tipomoneda"><?php echo e(__('Tipo de moneda:')); ?></label>

						                    <small class="note-form darkred">* Campo requerido</small>

						                    <select class="form-control <?php $__errorArgs = ['i_tipomoneda'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="i_tipomoneda" autofocus>
						                        <option disabled>Elige una opción:</option>
						                        <option <?php if($details->vTipoMoneda == "Peso"): ?> selected <?php endif; ?> value="Peso">($) Pesos méxicanos</option>
						                        <option <?php if($details->vTipoMoneda == "Dolar"): ?> selected <?php endif; ?> value="Dolar">($) Dolares</option>
						                        <option <?php if($details->vTipoMoneda == "Euro"): ?> selected <?php endif; ?> value="Euro">(€) Euros</option>
						                        <option <?php if($details->vTipoMoneda == "Libra"): ?> selected <?php endif; ?> value="Libra">(£) Libras</option>
						                    </select>

						                    <?php $__errorArgs = ['i_tipomoneda'];
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
						        </div>

						        <div class="row row-cols-4">
						            <div class="col">
						                <div class="form-group">
						                    <label for="i_vmin"><?php echo e(__('Voltaje mínimo:')); ?></label>

						                    <small class="note-form darkred">* Campo requerido</small>

						                    <input id="i_vmin" type="number" step="any" class="form-control <?php $__errorArgs = ['i_vmin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="i_vmin" value="<?php echo e($details->iVMIN); ?>" autofocus>

						                    <?php $__errorArgs = ['i_vmin'];
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

						            <div class="col">
						                <div class="form-group">
						                    <label for="i_vmax"><?php echo e(__('Voltaje máximo:')); ?></label>

						                    <small class="note-form darkred">* Campo requerido</small>

						                    <input id="i_vmax" type="number" step="any" class="form-control <?php $__errorArgs = ['i_vmax'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="i_vmax" value="<?php echo e($details->iVMAX); ?>" autofocus>

						                    <?php $__errorArgs = ['i_vmax'];
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

						            <div class="col">
						                <div class="form-group">
						                    <label for="i_pmin"><?php echo e(__('Potencia mínimo:')); ?></label>

						                    <small class="note-form darkred">* Campo requerido</small>

						                    <input id="i_pmin" type="number" step="any" class="form-control <?php $__errorArgs = ['i_pmin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="i_pmin" value="<?php echo e($details->iPMIN); ?>" autofocus>

						                    <?php $__errorArgs = ['i_pmin'];
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

						            <div class="col">
						                <div class="form-group">
						                    <label for="i_pmax"><?php echo e(__('Potencia máximo:')); ?></label>

						                    <small class="note-form darkred">* Campo requerido</small>

						                    <input id="i_pmax" type="number" step="any" class="form-control <?php $__errorArgs = ['i_pmax'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="i_pmax" value="<?php echo e($details->iPMAX); ?>" autofocus>

						                    <?php $__errorArgs = ['i_pmax'];
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
						        </div>

						        <div class="row">
						            <div class="col text-center">
						                <button type="submit" class="btn btn-success btn-lg">Guardar</button>

						                <a href="<?php echo e(url('inversores')); ?>" class="btn btn-warning btn-lg">Cancelar</a>
						            </div>
						        </div>
						    </div>
						</form>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('roles/admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/roles/admin/forms/form-edit-investor.blade.php ENDPATH**/ ?>