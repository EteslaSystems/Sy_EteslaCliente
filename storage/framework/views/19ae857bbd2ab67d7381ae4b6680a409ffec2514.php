	<?php $__env->startSection('enginerContent'); ?>
		<div class="content">
            <div class="card">
                <h6 class="card-header">Editar material</h6>

                <div class="card-body">
                	<?php $__currentLoopData = $materiales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                		<form method="POST" action="<?php echo e(url('editar-materiales', $details->idOtrosMateriales)); ?>">
						    <?php echo csrf_field(); ?>
						    <?php echo method_field('PUT'); ?>

						    <div class="container">
			                    <div class="row">
			                        <div class="col-8">
			                            <div class="form-group">
			                                <label for="m_nombrematerialedit"><?php echo e(__('Nombre del material:')); ?></label>

			                                <small class="note-form darkred">* Campo requerido</small>

			                                <input id="m_nombrematerialedit" type="text" class="form-control <?php $__errorArgs = ['m_nombrematerialedit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="m_nombrematerialedit" value="<?php echo e($details->vPartida); ?>" autofocus>

			                                <?php $__errorArgs = ['m_nombrematerialedit'];
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

			                        <div class="col-4">
			                            <div class="form-group">
			                                <label for="m_agregarcategoriaedit"><?php echo e(__('Categoría perteneciente:')); ?></label>

			                                <small class="note-form darkred">* Campo requerido</small>

			                                <select class="form-control mr-sm-3" id="m_agregarcategoriaedit" class="form-control <?php $__errorArgs = ['m_agregarcategoriaedit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="m_agregarcategoriaedit" autofocus>
			                                    <option disabled>Selecciona una opción:</option>

			                                    <?php $__currentLoopData = $vCategorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			                                    	<?php if($categoria->idCategOtrosMateriales == $details->idCategOtrosMateriales): ?>
			                                        	<option value="<?php echo e($categoria->idCategOtrosMateriales); ?>" selected><?php echo e($categoria->vNombreCategoOtrosMats); ?></option>
			                                        <?php else: ?>
			                                        	<option value="<?php echo e($categoria->idCategOtrosMateriales); ?>"><?php echo e($categoria->vNombreCategoOtrosMats); ?></option>
			                                        <?php endif; ?>
			                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			                                </select>

			                                <?php $__errorArgs = ['m_agregarcategoriaedit'];
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

			                        <div class="col-6">
			                            <div class="form-group">
			                                <label for="m_unidadmaterialedit"><?php echo e(__('Unidad del material:')); ?></label>

			                                <small class="note-form darkred">* Campo requerido</small>

			                                <input id="m_unidadmaterialedit" type="text" class="form-control <?php $__errorArgs = ['m_unidadmaterialedit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="m_unidadmaterialedit" value="<?php echo e($details->vUnidad); ?>" autofocus>

			                                <?php $__errorArgs = ['m_unidadmaterialedit'];
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

			                        <div class="col-6">
			                            <div class="form-group">
			                                <label for="m_preciounitarioedit"><?php echo e(__('Precio unitario:')); ?></label>

			                                <small class="note-form darkred">* Campo requerido</small>

			                                <input id="m_preciounitarioedit" type="number" class="form-control <?php $__errorArgs = ['m_preciounitarioedit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="m_preciounitarioedit" value="<?php echo e($details->fPrecioUnitario); ?>" autocomplete="m_preciounitarioedit" autofocus maxlength="50">

			                                <?php $__errorArgs = ['m_preciounitarioedit'];
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
			                            <button type="submit" class="btn btn-success">Guardar</button>
			                        </div>
			                    </div>
			                </div>
						</form>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('roles/enginer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/roles/enginer/forms/form-edit-materials.blade.php ENDPATH**/ ?>