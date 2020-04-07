@extends('authentication/templateAuth')
@section('titleAuth')
    {{'Registrate'}}
@stop
@section('bodyLog')
    <br>
    <div class="container">
        <div class="row justify-content-md-center">
            <form method="post" class="form-container">
            {{csrf_field()}}
                <img src="img/panel-etesla.jpg" class="cls rounded-circle mx-auto d-block" width="120" height="120">
                <div class="row justify-content-md-center">
                    <small><strong>ETESLA PANELES SOLARES</strong>&#174;</small>
                </div>
                <hr>
                <div class="form-group">
                    <input id="inpNombreUser" name="nombrePersona" type="text" class="form-control" placeholder="Nombre(s)" required>
                </div>
                <div class="form-group">
                    <input id="inpApellido1" name="primerApellido" type="text" class="form-control" placeholder="Apellido paterno" required>
                </div>
                <div class="form-group">
                    <input id="inpApellido2" name="segundoApellido" type="text" class="form-control" placeholder="Apellido materno" required>
                </div>
                <div class="form-group">
                    <input id="inpMail" name="email" type="mail" class="form-control" placeholder="example@etesla.mx" required>
                </div>
                <div class="form-group">
                    <div class="input-group mb-2">
                        <input id="inpPasswd" name="contrasenia" type="password" class="form-control" placeholder="**********" required>
                        <div class="input-group-prepend">
                            <button id="show_password" class="btn btn-success" type="button" onclick="mostrarContrasenia()"><span class="fa fa-eye-slash icon"></span></button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <select class="form-control" name="oficina">
                        <option disabled selected value="-1">Selecciona sucursal a la que perteneces</option>
                        <option value="CDMX">CDMX</option>
                        <option value="Puebla">Puebla</option>
                        <option value="Veracruz">Veracruz</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" name="rol">
                        <option disabled selected value="-1">Seleccionar puesto que desempeñas</option>
                        <option value="5">Ventas</option>
                        <option value="2">Operaciones</option>
                        <option value="4">Ingenieria</option>
                        <option value="3">Gerente de ingenieria</option>
                    </select>
                </div>
                <div class="row justify-content-center">
                    <input type="submit" id="btnRegistrar" value="Registrate" class="btn btn-success btn-lg btn-block btn-register">
                </div>
                <div class="row justify-content-center">
                    <label>¿Ya tienes una cuenta?<a href="/"> Iniciar sesión</a></label>
                </div>
            </form>
        </div>
    </div>

    @section('scripts')
        <script type="text/javascript">
            /*#region Register*/ 
            //Validación de listas desplegables vacias
            $(document).on('change','select',function(){
                listaSucursal = document.getElementsByTagName('select')[0].value;
                listaPuesto = document.getElementsByTagName('select')[1].value;

                if(listaSucursal != -1){
                    if(listaPuesto != -1){
                        document.getElementById('btnRegistrar').disabled = false;
                    }
                }
            });
            /*#endregion*/
        </script>
    @endsection
@endsection
