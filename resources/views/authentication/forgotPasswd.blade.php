@extends('authentication/templateAuth')
@section('titleAuth')
    {{'Olvide mi contraseña'}}
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
            <div class="form-group" align="center">
                <label>
                    Si has extraviado u olvidado tu contraseña <strong>¡No te preocupes!</strong><br>
                    Solo escribe tu correo electrónico en el siguiente campo de texto<br>
                    y nosotros te enviaremos tus credenciales a tu dirección de correo.<br><br>
                    <i>
                        En caso de no recibir dicho correo, favor de contactar al departamento de sistemas<br>
                        mediante el siguiente enlace, reportando dicha anomalía.&nbsp;
                    </i>
                    <a target="_blank" href="mailto:sistemas@etesla.mx">sistemas@etesla.mx</a>
                </label>
            </div>
            <div class="form-group">
                <input id="inpResetPasswd" name="email" type="mail" class="form-control" placeholder="ejemplo@etesla.mx" required>
            </div>
            <div class="row justify-content-center">
                <input type="submit" id="btnRecuperar" value="Recuperar" class="btn btn-success btn-lg btn-block btn-register">
            </div>
        </form>
    </div>
</div>
@endsection