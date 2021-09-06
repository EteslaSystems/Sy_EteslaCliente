    <?php $__env->startSection('contenidoAdmin'); ?>
		<div class="content">
            <div class="card">
                <h6 class="card-header">Editar panel</h6>

                <div class="card-body">
                	<?php $__currentLoopData = $panel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                    <form method="POST" action="<?php echo e(url('editar-panel', $details->idPanel)); ?>">
						    <?php echo csrf_field(); ?>
						    <?php echo method_field('PUT'); ?>

						    <div class="container">
			                    <div class="row row-cols-3">
			                        <div class="col">
			                            <div class="form-group">
			                                <label for="p_nombrematerial"><?php echo e(__('Nombre del material:')); ?></label>

			                                <small class="note-form darkred">* Campo requerido</small>

			                                <input id="p_nombrematerial" type="text" class="form-control <?php $__errorArgs = ['p_nombrematerial'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="p_nombrematerial" value="<?php echo e($details->vNombreMaterialFot); ?>" autofocus>

			                                <?php $__errorArgs = ['p_nombrematerial'];
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
			                                <label for="p_marca"><?php echo e(__('Marca:')); ?></label>

			                                <small class="note-form darkred">* Campo requerido</small>

			                                <input id="p_marca" type="text" class="form-control <?php $__errorArgs = ['p_marca'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="p_marca" value="<?php echo e($details->vMarca); ?>" autofocus>

			                                <?php $__errorArgs = ['p_marca'];
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
			                                <label for="p_potencia"><?php echo e(__('Potencia:')); ?></label>

			                                <small class="note-form darkred">* Campo requerido</small>

			                                <input id="p_potencia" type="number" step="any" class="form-control <?php $__errorArgs = ['p_potencia'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="p_potencia" value="<?php echo e($details->fPotencia); ?>" autofocus>

			                                <?php $__errorArgs = ['p_potencia'];
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
			                                <label for="p_isc"><?php echo e(__('Intensidad por cortocircuito:')); ?></label>

			                                <small class="note-form darkred">* Campo requerido</small>

			                                <input id="p_isc" type="number" step="any" class="form-control <?php $__errorArgs = ['p_isc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="p_isc" value="<?php echo e($details->fISC); ?>" autofocus>

			                                <?php $__errorArgs = ['p_isc'];
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
			                                <label for="p_tipomoneda"><?php echo e(__('Tipo de moneda:')); ?></label>

			                                <small class="note-form darkred">* Campo requerido</small>

			                                <select class="form-control <?php $__errorArgs = ['p_tipomoneda'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="p_tipomoneda" autofocus>
			                                    <option selected disabled>Elige una opción:</option>
			                                    <option <?php if($details->vTipoMoneda == "Peso"): ?> selected <?php endif; ?> value="Peso">($) Pesos méxicanos</option>
						                        <option <?php if($details->vTipoMoneda == "Dolar"): ?> selected <?php endif; ?> value="Dolar">($) Dolares</option>
						                        <option <?php if($details->vTipoMoneda == "Euro"): ?> selected <?php endif; ?> value="Euro">(€) Euros</option>
						                        <option <?php if($details->vTipoMoneda == "Libra"): ?> selected <?php endif; ?> value="Libra">(£) Libras</option>
			                                </select>

			                                <?php $__errorArgs = ['p_tipomoneda'];
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
			                                <label for="p_precio"><?php echo e(__('Precio:')); ?></label>

			                                <small class="note-form darkred">* Campo requerido</small>

			                                <input id="p_precio" type="number" step="any" class="form-control <?php $__errorArgs = ['p_precio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="p_precio" value="<?php echo e($details->fPrecio); ?>" autofocus>

			                                <?php $__errorArgs = ['p_precio'];
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
			                                <label for="p_voc"><?php echo e(__('Voltaje en circuito abierto:')); ?></label>

			                                <small class="note-form darkred">* Campo requerido</small>

			                                <input id="p_voc" type="number" step="any" class="form-control <?php $__errorArgs = ['p_voc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="p_voc" value="<?php echo e($details->fVOC); ?>" autofocus>

			                                <?php $__errorArgs = ['p_voc'];
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
			                                <label for="p_garantia"><?php echo e(__('Garantia:')); ?></label>

			                                <small class="note-form darkred">* Campo requerido</small>

			                                <input id="p_garantia" type="number" step="any" class="form-control <?php $__errorArgs = ['p_garantia'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="p_garantia" value="<?php echo e($details->vGarantia); ?>" autofocus>

			                                <?php $__errorArgs = ['p_garantia'];
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
			                                <label for="p_origen"><?php echo e(__('Origen:')); ?></label>

			                                <small class="note-form darkred">* Campo requerido</small>

			                                <input id="p_origen" type="text" step="any" class="form-control <?php $__errorArgs = ['p_origen'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="p_origen" value="<?php echo e($details->vOrigen); ?>" autofocus>

			                                <?php $__errorArgs = ['p_origen'];
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
								
								<div class="row row-cols-2">
									<div class="col">
										<div class="form-group">
											<label for="p_vmp"><?php echo e(__('Voltaje en máxima potencia:')); ?></label>

											<small class="note-form darkred">* Campo requerido</small>

											<input id="p_vmp" type="number" step="any" class="form-control <?php $__errorArgs = ['p_vmp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="p_vmp" value="<?php echo e($details->fVMP); ?>" autofocus>

											<?php $__errorArgs = ['p_vmp'];
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
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('roles/admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/roles/admin/forms/form-edit-panel.blade.php ENDPATH**/ ?>