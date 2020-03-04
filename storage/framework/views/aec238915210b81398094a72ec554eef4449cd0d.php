<?php $__env->startSection('content'); ?>
    <br>    
    <h1>Editar perfil</h1><hr>
    <div class="row justify-content-md-center">
        <form class="form-container">
        <h3>Información personal</h3>
        <?php echo e(csrf_field()); ?>

            <div class="form-group">
                <label class="control-label">Nombre completo</label>
                <div class="input-group mb-2">
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="inpPasswd" class="control-label">Contraseña</label>
                <div class="input-group mb-2">
                    <input type="password" id="inpPasswd" class="form-control">
                    <div class="input-group-prepend">
                        <button id="show_password" class="btn btn-success form-control" type="button" onclick="mostrarContrasenia()"><span class="fa fa-eye-slash icon"></span></button
                    </div>
                </div>
            </div>
            <!--div class="form-group">
                <label for="" class="control-label">Sucursal</label>
                <div class="input-group mb-2">
                    <select class="form-control">
                        <option>Selecciona sucursal a la que perteneces</option>
                        <option value="cdmx">CDMX</option>
                        <option value="puebla">Puebla</option>
                        <option value="veracruz">Veracruz</option>
                    </select>
                </div>
            </!--div-->
            <button type="submit" class="btn btn-success btn-lg pull-right">Actualizar</button>
        </form>
    </div>     
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\EteslaPanelesSolares\resources\views/template/profileUser.blade.php ENDPATH**/ ?>