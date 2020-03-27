<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center" id="full-screen" style="margin-top: -72.5px;">
            <div class="col-12 col-md-8 align-self-center" style="margin-top: 72.5px;">
                <div class="card" style="box-shadow: 0px 5px 30px 5px;">
                    <div class="row no-gutters">
                        <div class="col-2 col-md-3">
                            <img src="https://oroinformacion.com/wp-content/uploads/2019/04/paneles-solares-fotovoltaicos.jpg" class="card-img" alt="..." style="height: 100%;">
                        </div>

                        <div class="col-10 col-md-9">
                            <div class="card-body">
                                <h5 class="card-title">Información del perfil.</h5>

                                <hr>
                        
                                <div class="row">
                                    <div class="col-6 offset-3 col-md-4 offset-md-4">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                            <label class="custom-control-label" for="customSwitch1">Editar perfil</label>
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <form>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-5 col-form-label">Nombre</label>
                                        
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="staticEmail" value="Enrique Marin Toledano">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-5 col-form-label">Correo electrónico</label>
                                        
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="staticEmail" value="kikinmarin@example.com">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-5 col-form-label">Contraseña</label>

                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="staticEmail" value="************">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-5 col-form-label">Sucursal</label>

                                        <div class="col-sm-7">
                                            <select class="form-control" id="staticEmail">
                                                <option disabled>Eliga una opción:</option>
                                                <option selected>Veracruz</option>
                                                <option>Puebla</option>
                                                <option>CDMX</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col text-center">
                                            <button type="button" class="btn btn-success">Guardar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/template/profileUser.blade.php ENDPATH**/ ?>