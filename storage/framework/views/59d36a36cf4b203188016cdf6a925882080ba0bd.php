<div class="content">
    <div class="card">
        <h6 class="card-header">Agregar categoría</h6>

        <div class="card-body">
            <form method="POST" action="<?php echo e(url('agregar-categoria')); ?>">
                <?php echo csrf_field(); ?>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="c_categorianueva"><?php echo e(__('Nombre de la categoría:')); ?></label>

                                <small class="note-form darkred">* Campo requerido</small>

                                <input id="c_categorianueva" type="text" class="form-control <?php $__errorArgs = ['c_categorianueva'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="c_categorianueva" value="<?php echo e(old('c_categorianueva')); ?>" autocomplete="c_categorianueva" autofocus maxlength="50">

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
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/roles/enginer/forms/form-new-category.blade.php ENDPATH**/ ?>