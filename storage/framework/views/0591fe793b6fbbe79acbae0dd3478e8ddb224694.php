<?php $__env->startSection('titleAuth'); ?>
    <?php echo e('Login'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('bodyLog'); ?>
    <section class="container-fluid bg">
        <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-3">
                <form class="fmc form-container">
                    <img src="img/panel-etesla.jpg" class="clg rounded-circle mx-auto d-block" width="90" height="90">
                    <div class="form-group">
                        <label for="inputEmailLogin">Correo electronico</label>
                        <input type="email" class="form-control" id="inputEmailLogin" aria-describedby="emailHelp" placeholder="example@etesla.mx" required>
                    </div>
                    <div class="form-group">
                        <label for="inpPasswd">Contraseña</label>
                        <div class="input-group mb-2">
                            <input type="password" class="form-control" id="inpPasswd" placeholder="********" required>                            
                            <div class="input-group-prepend">
                                <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarContrasenia()"><span class="fa fa-eye-slash icon"></span></button
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Entrar</button><br>
                    <div class="form-group">
                        <div class="row justify-content-center">
                            <label>¿No cuentas con una cuenta?</label>
                        </div>
                        <a href="<?php echo e(('/register')); ?>" align="center"><p>Registrate</p></a>
                        <div class="row justify-content-center">
                            <label>¿Olvidaste tu contraseña?</label>
                        </div>
                        <a href="/forgetPasswd" align="center"><p>Olvide mi contraseña</p></a>
                    </div>
                </form>
            </section>
        </section>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('authentication/templateAuth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\EteslaPanelesSolares\resources\views/authentication/login.blade.php ENDPATH**/ ?>