<div class="content">
    <div class="card">
        <h6 class="card-header">Agregar inversor</h6>

        <div class="card-body">
            <form method="POST" action="<?php echo e(url('agregar-inversor')); ?>">
                <?php echo csrf_field(); ?>

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
unset($__errorArgs, $__bag); ?>" name="i_nombrematerial" value="<?php echo e(old('i_nombrematerial')); ?>" autocomplete="i_nombrematerial" autofocus maxlength="50">

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
unset($__errorArgs, $__bag); ?>" name="i_marca" value="<?php echo e(old('i_marca')); ?>" autocomplete="i_marca" autofocus maxlength="50">

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
unset($__errorArgs, $__bag); ?>" name="i_precio" value="<?php echo e(old('i_precio')); ?>" autocomplete="i_precio" autofocus>

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
unset($__errorArgs, $__bag); ?>" name="i_potencia" value="<?php echo e(old('i_potencia')); ?>" autocomplete="i_potencia" autofocus>

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
unset($__errorArgs, $__bag); ?>" name="i_isc" value="<?php echo e(old('i_isc')); ?>" autocomplete="i_isc" autofocus>

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
                                    <option selected disabled>Elige una opción:</option>
                                    <option value="Peso">($) Pesos méxicanos</option>
                                    <option value="Dolar">($) Dolares</option>
                                    <option value="Euro">(€) Euros</option>
                                    <option value="Libra">(£) Libras</option>
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
unset($__errorArgs, $__bag); ?>" name="i_vmin" value="<?php echo e(old('i_vmin')); ?>" autocomplete="i_vmin" autofocus>

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
unset($__errorArgs, $__bag); ?>" name="i_vmax" value="<?php echo e(old('i_vmax')); ?>" autocomplete="i_vmax" autofocus>

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
unset($__errorArgs, $__bag); ?>" name="i_pmin" value="<?php echo e(old('i_pmin')); ?>" autocomplete="i_pmin" autofocus>

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
unset($__errorArgs, $__bag); ?>" name="i_pmax" value="<?php echo e(old('i_pmax')); ?>" autocomplete="i_pmax" autofocus>

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
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/roles/admin/forms/form-new-investor.blade.php ENDPATH**/ ?>