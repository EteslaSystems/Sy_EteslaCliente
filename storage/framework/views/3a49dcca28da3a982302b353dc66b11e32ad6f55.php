<div class="content">
    <div class="card">
        <h6 class="card-header">Agregar materiales a una categoría</h6>

        <div class="card-body">
            <form method="POST" action="<?php echo e(url('agregar-materiales')); ?>">
                <?php echo csrf_field(); ?>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="m_nombrematerial"><?php echo e(__('Nombre del material:')); ?></label>

                                <small class="note-form darkred">* Campo requerido</small>

                                <input id="m_nombrematerial" type="text" class="form-control <?php $__errorArgs = ['m_nombrematerial'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="m_nombrematerial" value="<?php echo e(old('m_nombrematerial')); ?>" autocomplete="m_nombrematerial" autofocus maxlength="50">

                                <?php $__errorArgs = ['m_nombrematerial'];
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
                                <label for="m_agregarcategoria"><?php echo e(__('Categoría perteneciente:')); ?></label>

                                <small class="note-form darkred">* Campo requerido</small>

                                <select class="form-control mr-sm-3" id="m_agregarcategoria" class="form-control <?php $__errorArgs = ['m_agregarcategoria'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="m_agregarcategoria" autofocus>
                                    <option selected disabled>Selecciona una opción:</option>

                                    <?php $__currentLoopData = $vCategorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($details->idCategOtrosMateriales); ?>"><?php echo e($details->vNombreCategoOtrosMats); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                <?php $__errorArgs = ['m_agregarcategoria'];
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
                                <label for="m_unidadmaterial"><?php echo e(__('Unidad del material:')); ?></label>

                                <small class="note-form darkred">* Campo requerido</small>

                                <input id="m_unidadmaterial" type="text" class="form-control <?php $__errorArgs = ['m_unidadmaterial'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="m_unidadmaterial" value="<?php echo e(old('m_unidadmaterial')); ?>" autocomplete="m_unidadmaterial" autofocus maxlength="50">

                                <?php $__errorArgs = ['m_unidadmaterial'];
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
                                <label for="m_preciounitario"><?php echo e(__('Precio unitario:')); ?></label>

                                <small class="note-form darkred">* Campo requerido</small>

                                <input id="m_preciounitario" type="number" class="form-control <?php $__errorArgs = ['m_preciounitario'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="m_preciounitario" value="<?php echo e(old('m_preciounitario')); ?>" autocomplete="m_preciounitario" autofocus maxlength="50">

                                <?php $__errorArgs = ['m_preciounitario'];
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
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/roles/enginer/forms/form-new-materials.blade.php ENDPATH**/ ?>