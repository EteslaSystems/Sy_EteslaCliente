<?php if($rol == 1): ?> <?php ($layout = 'roles/admin'); ?> <?php endif; ?>
<?php if($rol == 2): ?> <?php ($layout = 'roles/operations'); ?> <?php endif; ?>
<?php if($rol == 3): ?> <?php ($layout = 'roles/enginer'); ?> <?php endif; ?>
<?php if($rol == 4): ?> <?php ($layout = 'roles/enginer'); ?> <?php endif; ?>
<?php if($rol == 5): ?> <?php ($layout = 'roles/seller'); ?> <?php endif; ?>



<?php $__env->startSection('content'); ?>
<br>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm">
                                <input id="inpBuscarCliente" class="form-control" placeholder="Busca a tu cliente"/>
                            </div>
                            <div class="col-sm-auto">
                                <button type="button" class="btn btn-success btn-xs" title="Buscar cliente" onclick="buscarCoincidenciaCliente()"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M64.5,14.33333c-27.6214,0 -50.16667,22.54527 -50.16667,50.16667c0,27.6214 22.54527,50.16667 50.16667,50.16667c12.52732,0 23.97256,-4.67249 32.7819,-12.31771l3.05143,3.05143v9.26628l43,43l14.33333,-14.33333l-43,-43h-9.26628l-3.05143,-3.05143c7.64521,-8.80934 12.31771,-20.25458 12.31771,-32.7819c0,-27.6214 -22.54527,-50.16667 -50.16667,-50.16667zM64.5,28.66667c19.87509,0 35.83333,15.95824 35.83333,35.83333c0,19.87509 -15.95825,35.83333 -35.83333,35.83333c-19.87509,0 -35.83333,-15.95825 -35.83333,-35.83333c0,-19.87509 15.95824,-35.83333 35.83333,-35.83333z"></path></g></g></svg></button>
                            </div>
                        </div>
                        <div class="row">
                            <select id="ddlCoincidenciasCliente" class="form-control-sm" style="display:none;" onchange="seleccionarCliente(this)">
                                <option value="-1" selected>Elige un cliente</option>
                            </select>
                            <small id="txtNoHayCoincidencia" style="display:none;">No hay coincidencia</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="<?php echo e(url('registrarCliente')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col">
                                    <small>Datos del cliente</small>
                                    <hr class="separador" style="margin-top:-10px;">
                                </div>
                                <div class="col">
                                    <button id="btnAgregarCliente" type="button" class="btn btn-success btn-xs pull-right" style="margin-top: -12px;" onclick="logicaFormularioCliente(0);">+</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col form-group" style="display:none;">
                                    <input id="inpClienteId" name="inpClienteId" class="form-control datosCliente" placeholder="Id Cliente" readonly/>
                                </div>
                                <div class="col form-group">
                                    <input id="inpClienteNombre" name="inpClienteNombre" class="form-control datosCliente" placeholder="Nombre" required readonly/>
                                </div>
                                <div class="col form-group">
                                    <input id="inpClientePrimerAp" name="inpClientePrimerAp" class="form-control datosCliente" placeholder="Primer apellido" required readonly/>
                                </div>
                                <div class="col form-group">
                                    <input id="inpClienteSegundoAp" name="inpClienteSegundoAp" class="form-control datosCliente" placeholder="Segundo apellido" readonly/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col form-group">
                                    <input id="inpClienteTelefono" name="inpClienteTelefono" class="form-control datosCliente" placeholder="Telefono" readonly/>
                                </div>
                                <div class="col form-group">
                                    <input id="inpClienteCelular" name="inpClienteCelular" class="form-control datosCliente" placeholder="Celular" required readonly/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col form-group">
                                    <input id="inpClienteMail" name="inpClienteMail" class="form-control datosCliente" type="mail" placeholder="Correo electronico" required readonly/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col form-group">
                                    <input id="inpClienteCalle" name="inpClienteCalle" class="form-control datosCliente" placeholder="Direccion (calle)" readonly/>
                                </div>
                                <div class="col form-row">
                                    <div class="col-sm">
                                        <input id="inpCP" name="inpCP" class="form-control datosCliente" placeholder="C.P." required readonly/>
                                    </div>
                                    <div class="col-sm-auto">
                                        <button id="searchCP" type="button" class="btn btn-success btn-xs" onclick="buscarCPInfo()" disabled><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M64.5,14.33333c-27.6214,0 -50.16667,22.54527 -50.16667,50.16667c0,27.6214 22.54527,50.16667 50.16667,50.16667c12.52732,0 23.97256,-4.67249 32.7819,-12.31771l3.05143,3.05143v9.26628l43,43l14.33333,-14.33333l-43,-43h-9.26628l-3.05143,-3.05143c7.64521,-8.80934 12.31771,-20.25458 12.31771,-32.7819c0,-27.6214 -22.54527,-50.16667 -50.16667,-50.16667zM64.5,28.66667c19.87509,0 35.83333,15.95824 35.83333,35.83333c0,19.87509 -15.95825,35.83333 -35.83333,35.83333c-19.87509,0 -35.83333,-15.95825 -35.83333,-35.83333c0,-19.87509 15.95824,-35.83333 35.83333,-35.83333z"></path></g></g></svg></button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col form-group">
                                    <input id="inpClienteMunicipio" name="inpClienteMunicipio" class="form-control datosCliente" placeholder="Asentamiento" required readonly/>
                                    <select id="ddlMunicipio" class="form-control-sm" style="display:none;" onchange="selectOptEntidad(this)">
                                        <option value="-1">Escoge un asentamiento</option>
                                    </select>
                                </div>
                                <div class="col form-group">
                                    <input id="inpClienteCiudad" name="inpClienteCiudad" class="form-control datosCliente" placeholder="Ciudad" required readonly/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col form-group">
                                    <input id="inpClienteEstado" name="inpClienteEstado" class="form-control datosCliente" placeholder="Estado" required readonly/>
                                </div>
                            </div>
                            <div class="form-group form-group-buttons" style="display:none;">
                                <button type="button" class="btn btn-danger pull-right" onclick="logicaFormularioCliente(1);">Cancelar</button>
                                <button type="submit" class="btn btn-success pull-right">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-agregarcliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                    <div class="col-sm-6 col-md-4 offset-md-2" style="display: none;">
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
                            <form action="<?php echo e(url('  ')); ?>" method="POST" class="row">
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

                                        <input type="" class="form-control" id="inpColoniaCliente" name="colonia" onblur="closeSuggestBox();" placeholder="Ingrese un valor." value="<?php echo e(old('colonia')); ?>" readonly>
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

                                        <input type="text" class="form-control" id="inpMunicCliente" name="municipio" placeholder="Ingrese un valor." value="<?php echo e(old('municipio')); ?>" readonly>

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

                                        <input type="" class="form-control" id="inpEstadoCliente" name="estado" placeholder="Ingrese un valor." value="<?php echo e(old('estado')); ?>" readonly>

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

    <br>
    <?php echo $__env->yieldContent('cotizadores'); ?>

    <?php $__env->startSection('scripts'); ?>
        <script type="text/javascript">
            // Función invocada en los inputs tipo number, no permite insertar datos que no sean numéricos.
            $('#form-group-inputs input[type="number"]').keydown(function(event) {
                if (event.shiftKey) {
                    event.preventDefault();
                }

                if (event.keyCode != 46 && event.keyCode != 8 && event.keyCode != 37 && event.keyCode != 39) {
                    if($(this).val().length >= 11) {
                        event.preventDefault();
                    }
                }

                if (event.keyCode < 48 || event.keyCode > 57) {
                    if (event.keyCode < 96 || event.keyCode > 105) {
                        if(event.keyCode != 46 && event.keyCode != 8 && event.keyCode != 37 && event.keyCode != 39) {
                            event.preventDefault();
                        }
                    }
                }
            });

            // Función invocada en los inputs, no permite pegar datos.
            $('#form-group-inputs input[type="number"]').on('paste', function(e){
                e.preventDefault();
            });

            // Función invocada en los inputs, no permite copiar datos.
            $('#form-group-inputs input[type="number"]').on('copy', function(e){
                e.preventDefault();
            });

            // Función invocada mediante el select, muestra/oculta secciones.
            $("#tarifa-actual").change(function () {
                $("#tarifa-actual option:selected").each(function () {
                    $('#fm-mensual').collapse("show");
                });
            });

            // Función invocada mediante el checkbox, modifica valores/propiedades de inputs.
            $("#switch-2").change(function () {
                if ($('#switch-2').prop('checked')) {

                    for (var count = 2; count <= 12; count++) {
                        $("#men-val-" + count).attr("readonly", "readonly");
                        $("#men-val-" + count + "a").attr("readonly", "readonly");

                        var value1 = $("#men-val-1").val();
                        var value2 = $("#men-val-1a").val();

                        $("#men-val-" + count).val(value1);
                        $("#men-val-" + count + "a").val(value2);
                    }
                } else {
                    for (var count = 2; count <= 12; count++) {
                        $("#men-val-" + count).removeAttr("readonly", "readonly");
                        $("#men-val-" + count + "a").removeAttr("readonly", "readonly");
                    }
                }
            });

            // Función invocada por el input, agrega su valor a los demás.
            $("#men-val-1").keyup(function () {
                if ($('#switch-2').prop('checked')) {
                    for (var count = 2; count <= 12; count++) {
                        var value = $(this).val();

                        $("#men-val-" + count).val(value);
                    }
                }
            });

            $("#men-val-1a").keyup(function () {
                if ($('#switch-2').prop('checked')) {
                    for (var count = 2; count <= 12; count++) {
                        var value = $(this).val();

                        $("#men-val-" + count + "a").val(value);
                    }
                }
            });
        </script>

        <script type="text/javascript">
            function filterFloat(evt,input){
                // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
                var key = window.Event ? evt.which : evt.keyCode;
                var chark = String.fromCharCode(key);
                var tempValue = input.value+chark;
                if(key >= 48 && key <= 57) {
                    if(filter(tempValue)=== false) {
                        return false;
                    } else {
                        return true;
                    }
                } else {
                    if(key == 8 || key == 13 || key == 0) {
                        return true;
                    } else if(key == 46) {
                        if(filter(tempValue)=== false) {
                            return false;
                        } else {
                            return true;
                        }
                    } else {
                        return false;
                    }
                }
            }
            function filter(__val__){
                var preg = /^([0-9]+\.?[0-9]{0,2})$/;
                if(preg.test(__val__) === true) {
                    return true;
                } else {
                    return false;
                }
            }
        </script>
    <?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make($layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/roles/seller/cotizador/cotizador.blade.php ENDPATH**/ ?>