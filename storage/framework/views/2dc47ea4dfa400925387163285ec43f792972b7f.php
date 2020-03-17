<?php $__env->startSection('content'); ?>
    <br>

    <div class="d-flex">
        <div class="ml-auto">
            <div class="form-group row">
                <div class="col-sm-12">
                    <div class="input-group">
                        <button id="inpClientSearchFast" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-agregarcliente">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,0c-47.41887,0 -86,38.58113 -86,86c0,47.41887 38.58113,86 86,86c47.41887,0 86,-38.58113 86,-86c0,-47.41887 -38.58113,-86 -86,-86zM86,13.23077c40.26082,0 72.76923,32.50842 72.76923,72.76923c0,18.91587 -7.23558,36.07452 -19.01923,48.99519c-4.96154,-9.12199 -19.5619,-16.61599 -35.14423,-19.84615c0,0 -7.44231,-2.01562 -4.13462,-9.30288c4.6256,-5.94351 7.44231,-12.48137 7.44231,-14.47115c0,0 6.56371,-5.29747 7.23558,-13.23077c0.67188,-7.28726 -1.44712,-8.0625 -1.44712,-8.0625c2.63582,-8.60517 3.35938,-40.98437 -17.15865,-37.00481c-3.30769,-6.61538 -25.01442,-11.86118 -34.9375,5.99519c-4.6256,8.60517 -6.69291,21.13822 -2.06731,30.38942c0,0.67188 -1.39543,-0.69772 -2.06731,3.92788c0,4.6256 2.14483,11.21515 4.13462,13.85096c0.67188,1.31791 1.98978,2.01563 3.30769,2.6875c0,0 1.29207,8.01082 7.23558,15.29808c1.31791,5.94351 -4.75481,9.30288 -4.75481,9.30288c-16.125,3.23017 -30.77704,10.72416 -35.76442,19.84615c-11.44772,-12.84315 -18.39904,-29.76923 -18.39904,-48.375c0,-40.26081 32.50842,-72.76923 72.76923,-72.76923z"></path></g></g></svg>
                        </button>
                        <input id="inpSearchClient" name="inpSearchClient" list="clientes" type="search" class="form-control form-control-lg" placeholder="Busca un cliente">
                        <datalist id="clientes"></datalist>
                        <template id="listtemplate">
                            <?php $__currentLoopData = $consultarClientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cliente->vNombrePersona); ?>&nbsp;<?php echo e($cliente->vPrimerApellido); ?>&nbsp;<?php echo e($cliente->vSegundoApellido); ?>" data-value="<?php echo e($cliente->idPersona); ?>"></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </template>
                    </div>
                </div>
            </div>
        </div>    
    </div>

    <div class="card">

    </br>

<div class="card">
       <div class="card-body">
            <div class="row">
                <div class="col col-6">
                    <div class="form-group row">
                        <div class="col col-4 fx-1">
                            <label for="B(mxn/kWh)" class="mn-1">Nombre completo</label>
                        </div>

                        <div class="col col-8" id="lblNombreCliente">
                            <input type="text" class="form-control" value="Esmeralda Giovana Valderrama Espiricueta" disabled readonly>
                        </div>
                    </div>
                </div>

                <div class="col col-6">
                    <div class="form-group row">
                        <div class="col col-4 fx-1">
                            <label for="B(mxn/kWh)" class="mn-1">Dirección</label>
                        </div>

                        <div class="col col-8" id="lblDireccion">
                            <input type="text" class="form-control" value="Kuakini Hwy #803, Kailua-Kona, Estados Unidos" disabled readonly>
                        </div>
                    </div>
                </div>
            </div>

            <div id="vmas" class="row">
                <div class="col text-center" >
                    <a class="btn btn-primary btn-sm" id="vmasbtn" data-toggle="collapse" data-target="#info-cliente" aria-expanded="false" aria-controls="info-cliente">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAABhklEQVRIidWVXy5DURDGv9NqX9QOsAA8sQMV3rQVsYimImyC2oLYQ7sNwUsroXgiLMBTK/rzcOfG0d6/PHWSk5M78803c+bOmSPNurgkI1CWVLe1LmnRTK+SbiV1JHWcc6PckYE94Jl0eQIaeYgLwLlH0AOOgFVg3taq6Xoerg0UsgQIyYdAM8kJKAItwwK0s5QlJN/MceqqF6QeByp7NW9mJff8D833EShFAQ68mhdjSACIsRWBvkH2Q71f37ATLpxzX3lPYD6X9jldJuDBoq/EkSSdwOxrBrmPMn6YsRJFGicT2AVTf4S6qBZMvN0pEvqOowK82b70y8OTJJ3Jsu3vUQGubd/+Q+ah7Nh+NWXx2rT/jza9m2xTH1AmGFwArbypE8wmgEHkRTNQw0BDoJqDfAsYAWNgNw3c9oIcxpXLsHOW+ch8TrNkU/CChP/k2C5RxdYacOLVfAyckWVce4HqBIMrTQZALY4n7cksSaopmC0b+nkyXyTdSOpK6jrnPjNnPnPyDR4iO/M7kECDAAAAAElFTkSuQmCC">
                    </a>
                </div>
            </div>

            <div class="collapse multi-collapse" id="info-cliente">
                <div class="row">
                    <div class="col col-6">
                        <div class="form-group row">
                            <div class="col col-4 fx-1">
                                <label for="B(mxn/kWh)" class="mn-1">Celular</label>
                            </div>

                            <div class="col col-8" id="lblCelular">
                                <input type="text" class="form-control" value="+95 1234567890" disabled readonly>
                            </div>
                        </div>
                    </div>

                    <div class="col col-6">
                        <div class="form-group row">
                            <div class="col col-4 fx-1">
                                <label for="B(mxn/kWh)" class="mn-1">Correo Electrónico</label>
                            </div>

                            <div class="col col-8" id="lblEmail">
                                <input type="text" class="form-control" value="valderrama_esmeralda@gmail.com" disabled readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-6">
                        <div class="form-group row">
                            <div class="col col-4 fx-1">
                                <label for="B(mxn/kWh)" class="mn-1">Teléfono</label>
                            </div>

                            <div class="col col-8" id="lblTelefono">
                                <input type="text" class="form-control" value="(859) 1234567" disabled readonly>
                            </div>
                        </div>
                    </div>

                    <div class="col col-6">
                        <div class="form-group row">
                            <div class="col col-4 fx-1">
                                <label for="B(mxn/kWh)" class="mn-1">Consumo</label>
                            </div>

                            <div class="col col-8" id="lblConsumo">
                                <input type="text" class="form-control" value="1000 Kw" disabled readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col text-center">
                        <a class="btn btn-primary btn-sm" id="vmenosbtn" data-toggle="collapse" data-target="#info-cliente" aria-expanded="false" aria-controls="info-cliente">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAABlUlEQVRIidWVTU4CURCEeyCwEZcSTTyBstIDiBdQMMYrEIgKeghCPIbRuJWDuBBMVNSV3sANasLnYnpCC83MYNz4kpdAVXVXT78/kf8+gjgSyItIReeGiKwq9SYiNyLSFZHrIAg+53YG9oAXksczUJ0ncQY4MwlugWNgDVjQuQ40gZ7RdYBMGoMo+RCoxQVpMXXVAnTStCVKvjXHV5eNSWWWKG96XjN4HSg6+iJQN/8bGvsE5DyDA9PzzERQ35po8r5yDcWyBtv3DK6UPDLYklnIe2DFwZaNvqX4hWfwqOSa04qosv7E7+KEdl25B8/gXcmCw9mqpyo3ukXl3yMsed/OHt4tEGEj7wv+okWluBZdKtk02NSCegtv9KeKn3sG0Tbt8ftteqeYu03zhBcX/DxAaQ/aocYO8A6aiqoqGgJlV+THbQMfwAjYSRJ3jEkDyMZos1r5h8a001STMSZR/1uEh6igswScmJ6PgDZprmtjVCG8uJLGIK4tSU9mTkR2JXwyN2X8ZL7K+MnsBkHwlbryfze+AZO9KH5AFY+AAAAAAElFTkSuQmCC">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-agregarcliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Agregar cliente (Acceso rápido).</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col col-8">
                            <form action="<?php echo e(url('agregar-cliente')); ?>" method="POST" class="row">
                                <?php echo csrf_field(); ?>

                                <div class="col col-6">
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
    
                                        <input type="number" class="form-control" id="phoneClient" name="telefono" placeholder="Ingrese un valor."value="<?php echo e(old('telefono')); ?>">

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

                                <div class="col col-6">
                                    <div class="form-group">
                                        <label for="cellphoneClient">Teléfono celular</label>

                                        <input type="number" class="form-control" id=cellphoneClient" name="celular" placeholder="Ingrese un valor." value="<?php echo e(old('celular')); ?>">

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
                                        <label for="suburbClient">Colonia</label>
    
                                        <input type="text" class="form-control" id="suburbClient" name="colonia" placeholder="Ingrese un valor." value="<?php echo e(old('colonia')); ?>">

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
                                        <label for="townClient">Municipio / Localidad</label>
    
                                        <input type="text" class="form-control" id="townClient" name="municipio" placeholder="Ingrese un valor." value="<?php echo e(old('municipio')); ?>">

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
                                        <label for="stateClient">Estado</label>
    
                                        <input type="text" class="form-control" id="stateClient" name="estado" placeholder="Ingrese un valor." value="<?php echo e(old('estado')); ?>">

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

                                <div class="col col-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                                </div>
                            </form>
                        </div>

                        <div class="col col-4 fx-1" style="background-color: rgba(0, 0, 0, .05); border-radius: 10px 10px;">
                            <form method="POST" action="" class="row mn-1">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="serviceCFE">No. servicio CFE</label>
    
                                        <input type="number" class="form-control border border-success" id="serviceCFE" placeholder="Ingrese un valor.">
                                    </div>

                                    <div class="form-group">
                                        <label for="postalCode">Código postal</label>
    
                                        <input type="number" class="form-control border border-success" id="postalCode" placeholder="Ingrese un valor.">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <?php echo $__env->yieldContent('cotizadores'); ?>

    <?php $__env->startSection('scripts'); ?>
        <?php if(session('modal-fail')): ?> 
            <script type="text/javascript">
                $("#modal-agregarcliente").modal("show");
            </script>
        <?php endif; ?>
    <?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('roles/seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/roles/seller/cotizador/cotizador.blade.php ENDPATH**/ ?>