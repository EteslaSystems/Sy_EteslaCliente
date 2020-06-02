<?php if($rol == 1): ?> <?php ($layout = 'roles/admin'); ?> <?php endif; ?>
<?php if($rol == 2): ?> <?php ($layout = 'roles/operations'); ?> <?php endif; ?>
<?php if($rol == 3): ?> <?php ($layout = 'roles/enginer'); ?> <?php endif; ?>
<?php if($rol == 4): ?> <?php ($layout = 'roles/enginer'); ?> <?php endif; ?>
<?php if($rol == 5): ?> <?php ($layout = 'roles/seller'); ?> <?php endif; ?>



<?php $__env->startSection('content'); ?>
    <div class="container" style="padding: unset;">
        <div class="container-fluid" style="padding: unset;">
            <div class="row" style="padding: unset;">
                <div class="col-12 image-section" style="padding: unset;">
                    <img src="https://innovandtalent.es/wp-content/uploads/2019/06/innov-2-1-2000x800.jpg">
                </div>
            </div>
            <div class="row">
                <div class="col-3 user-profil-part">
                    <div class="row">
                        <div class="col-12 user-image text-center">
                            <img src="<?php echo e(asset('img/panel-etesla.jpg')); ?>" class="rounded-circle">
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-9 text-center" style="margin-top: 100px; margin-bottom: 10px;">
                            <button type="button" class="btn btn-primary btn-block" id="btn-edit">
                                Editar mi información
                            </button>
                        </div>
                        <div class="col-9 text-center">
                            <button type="button" class="btn btn-danger btn-block" id="btn-cancel" style="display: none;">
                                Cancelar edición
                            </button>
                        </div><br><br><br>
                        <div class="col-9 text-center">
                            <form method="post">
                            <?php echo e(csrf_field()); ?>

                            <input type="submit" id="btn-save" value="Guardar información" class="btn btn-success btn-block" style="display: none;">
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="row" style="padding: unset;">
                        <div class="col-12" style="padding: unset;">
                            <div class="card user-profil-part" id="section-info">
                                <?php if(isset($usuario)): ?>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <strong><?php echo e($usuario->vPrimerApellido); ?>&nbsp;<?php echo e($usuario->vSegundoApellido); ?>&nbsp;</strong>
                                            <b class="text-muted"><?php echo e($usuario->vNombrePersona); ?></b>
                                        </h5><br>
                                        <p class="card-text">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th style="width: 30%;">
                                                            <strong>Cargo:</strong>
                                                        </th>
                                                        <td style="width: 70%;">
                                                            <?php if($usuario->ttTipoUsuario == 'Admin'): ?>
                                                                <strong>Administrador</strong>
                                                            <?php endif; ?>
                                                            <?php if($usuario->ttTipoUsuario == 'Operac'): ?>
                                                                <strong>Operaciones</strong>
                                                            <?php endif; ?>
                                                            <?php if($usuario->ttTipoUsuario == 'GerenteIng'): ?>
                                                                <strong>Gerente de ingeniería</strong>
                                                            <?php endif; ?>
                                                            <?php if($usuario->ttTipoUsuario == 'Ing'): ?>
                                                                <strong>Ingeniero</strong>
                                                            <?php endif; ?>
                                                            <?php if($usuario->ttTipoUsuario == 'Vend'): ?>
                                                                <strong>Vendedor</strong>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <strong>Correo electrónico:</strong>
                                                        </th>
                                                        <td>
                                                            <strong><?php echo e($usuario->vEmail); ?></strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <strong>Sucursal:</strong>
                                                        </th>
                                                        <td>
                                                            <strong><?php echo e($usuario->vOficina); ?></strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <strong>Contraseña:</strong>
                                                        </th>
                                                        <td>
                                                            <strong>
                                                                <input type="password" class="password-user" id="inpPasswd" disabled="true" value="<?php echo e($usuario->vContrasenia); ?>">
                                                                <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarContrasenia()">
                                                                    <span class="fa fa-eye-slash icon"></span>
                                                                </button>
                                                            </strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </p><hr>
                                        <p class="card-text text-right">
                                            <small class="text-muted">
                                                Última vez editado: <strong>&nbsp;
                                                    <?php if($usuario->updated_at != null): ?>
                                                        <?php echo e($usuario->updated_at); ?>

                                                    <?php else: ?>
                                                        Nunca
                                                    <?php endif; ?>
                                                </strong>
                                                
                                            </small>
                                        </p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="card user-profil-part" id="section-edit" style="display: none;">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <strong>Editar </strong>
                                        <b class="text-muted"> Información</b>
                                    </h5><br>
                                    <p class="card-text">
                                        <div class="row">
                                            <div class="col-12">

                                                    <?php if(isset($usuario)): ?>
                                                        <div class="form-group row">
                                                            <label for="nombrePersona" class="col-sm-4 col-form-label">Nombre(s)</label>
                                                            
                                                            <div class="col-sm-8">
                                                                <input type="text" name="nombrePersona" class="form-control" id="nombrePersona" value="<?php echo e($usuario->vNombrePersona); ?>">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="primerApellido" class="col-sm-4 col-form-label">Apellido Paterno</label>
                                                            
                                                            <div class="col-sm-8">
                                                                <input type="text" name="primerApellido" class="form-control" id="primerApellido" value="<?php echo e($usuario->vPrimerApellido); ?>">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="segundoApellido" class="col-sm-4 col-form-label">Apellido Materno</label>
                                                            
                                                            <div class="col-sm-8">
                                                                <input type="text" name="segundoApellido" class="form-control" id="segundoApellido" value="<?php echo e($usuario->vSegundoApellido); ?>">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="sucursal" class="col-sm-4 col-form-label">Sucursal actual</label>
                                                            
                                                            <div class="col-sm-8">
                                                                <select class="form-control" name="oficina">
                                                                    <option disabled value="-1">Selecciona la sucursal a la que perteneces</option>
                                                                    <?php if($usuario->vOficina == 'CDMX'): ?>
                                                                        <option selected value="CDMX">CDMX</option>
                                                                    <?php else: ?>
                                                                        <option value="CDMX">CDMX</option>
                                                                    <?php endif; ?>

                                                                    <?php if($usuario->vOficina == 'Puebla'): ?>
                                                                        <option selected value="Puebla">Puebla</option>
                                                                    <?php else: ?>
                                                                        <option value="Puebla">Puebla</option>
                                                                    <?php endif; ?>

                                                                    <?php if($usuario->vOficina == 'Veracruz'): ?>
                                                                        <option selected value="Veracruz">Veracruz</option>
                                                                    <?php else: ?>
                                                                        <option value="Veracruz">Veracruz</option>
                                                                    <?php endif; ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputPassword" class="col-sm-4 col-form-label">Contraseña</label>
                                                            
                                                            <div class="col-sm-8">
                                                                <input type="password" name="contrasenia" class="form-control" id="inpPasswd2" placeholder="********" required value="<?php echo e($usuario->vContrasenia); ?>">&nbsp;
                                                                <div class="input-group-prepend">
                                                                    <button id="btn-pass" class="btn btn-primary" type="button"><span class="fa fa-eye-slash icon"></span></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </form>
                                            </div>
                                        </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $__env->startSection('scripts'); ?>
        <script type="text/javascript">
            // Función invocada mediante el checkbox, modifica valores/propiedades de inputs.
            $("#btn-edit").click(function () {
                $('#section-info').hide();
                $('#section-edit').show();
                $('#btn-edit').hide();
                $('#btn-cancel').show();
                $('#btn-save').show();
            });

            $("#btn-cancel").click(function () {
                $('#section-info').show();
                $('#section-edit').hide();
                $('#btn-edit').show();
                $('#btn-cancel').hide();
                $('#btn-save').hide();
            });

            $("#btn-pass").click(function(){
                var cambio = document.getElementById("inpPasswd2");

                if (cambio.type == "password") {
                    cambio.type = "text";
                    $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
                } else {
                    cambio.type = "password";
                    $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
                }
            });
        </script>
    <?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make($layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/template/profileUser.blade.php ENDPATH**/ ?>