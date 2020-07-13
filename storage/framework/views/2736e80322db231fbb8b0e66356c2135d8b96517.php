	<?php $__env->startSection('enginerContent'); ?>
		<div class="content">
            <div class="card">
                <h6 class="card-header">Editar categoria</h6>

                <div class="card-body">
                	<?php $__currentLoopData = $categoria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                    <form method="POST" action="<?php echo e(url('editar-categoria', $details->idCategOtrosMateriales)); ?>">
						    <?php echo csrf_field(); ?>
						    <?php echo method_field('PUT'); ?>

						    <div class="container">
			                    <div class="row row-cols-3">
			                        <div class="col">
			                            <div class="form-group">
			                                <label for="c_categorianueva"><?php echo e(__('Nombre de la categoria:')); ?></label>

			                                <small class="note-form darkred">* Campo requerido</small>

			                                <input id="c_categorianueva" type="text" class="form-control <?php $__errorArgs = ['c_categorianueva'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="c_categorianueva" value="<?php echo e($details->vNombreCategoOtrosMats); ?>" autofocus>

			                                <?php $__errorArgs = ['c_categorianueva'];
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
<?php echo $__env->make('roles/enginer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/roles/enginer/forms/form-edit-category.blade.php ENDPATH**/ ?>