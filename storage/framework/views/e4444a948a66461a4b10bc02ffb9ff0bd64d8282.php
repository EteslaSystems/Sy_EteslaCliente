<?php $__env->startSection('titleAuth'); ?>
    <?php echo e('Registrate'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('bodyLog'); ?>
    <br>    
    <div class="container">
        <div class="row justify-content-md-center">
            <form method="POST" class="form-container" action="<?php echo e('/enviarCorreo'); ?>">
            <?php echo e(csrf_field()); ?>

                <img src="img/panel-etesla.jpg" class="cls rounded-circle mx-auto d-block" width="120" height="120">
                <div class="row justify-content-md-center">
                    <small><strong>ETESLA PANELES SOLARES</strong>&#174;</small>
                </div>
                <hr>
                <div class="form-group">
                    <input id="inpNombreUser" name="inpNombreUser" type="text" class="form-control" placeholder="Nombre completo" required>
                </div>
                <div class="form-group">
                    <input id="inpMail" name="inpMail" type="mail" class="form-control" placeholder="example@etesla.mx" required>
                </div>
                <div class="form-group">
                    <div class="input-group mb-2">
                        <input id="inpPasswd" name="inpPasswd" type="password" class="form-control" placeholder="**********" required>
                        <div class="input-group-prepend">
                            <button id="show_password" class="btn btn-success" type="button" onclick="mostrarContrasenia()"><span class="fa fa-eye-slash icon"></span></button>  
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <select class="form-control">
                        <option disabled selected value="-1">Selecciona sucursal a la que perteneces</option>
                        <option value="cdmx">CDMX</option>
                        <option value="puebla">Puebla</option>
                        <option value="veracruz">Veracruz</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control">
                        <option disabled selected value="-1">Seleccionar puesto que desempeñas</option>
                        <option value="ventas">Ventas</option>
                        <option value="operaciones">Operaciones</option>
                        <option value="ingenieria">Ingenieria</option>
                        <option value="gerenteIngenieria">Gerente de ingenieria</option>
                    </select>
                </div>
                <div class="row justify-content-center">
                    <input type="submit" id="btnRegistrar" value="Registrate" class="btn btn-success btn-lg btn-block btn-register" disabled>
                </div>
                <div class="row justify-content-center">
                    <label>¿Ya tienes una cuenta?<a href="/login"> Iniciar sesión</a></label>
                </div>    
            </form>
        </div>        
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('authentication/templateAuth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\EteslaPanelesSolares\resources\views/authentication/register.blade.php ENDPATH**/ ?>