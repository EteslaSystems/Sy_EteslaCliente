@extends('authentication/templateAuth')
@section('titleAuth')
    {{'Olvide mi contraseña'}}
@stop
@section('bodyLog')
    <br>
    <div class="container">
        <img src="img/panel-etesla.jpg" class="cls rounded-circle mx-auto d-block" width="120" height="120">
        <div class="row justify-content-md-center">
            <small><strong>ETESLA PANELES SOLARES</strong>&#174;</small>
        </div>
        <hr>
        <p align="justify">En caso de que hayas extraviado u olvidado tu contraseña <strong>¡No te apures!</strong> 
        Solo escribe tu correo en el campo de texto y nosotros te mandaremos tus credenciales a tu dirección
        de email. En caso de no recibir dicho mail, favor de contactar al departamento de sistemas, reportando
        dicha anomalia. <a href="#">sistemas@etesla.mx</a></p>
        <form class="form-container">
            <input type="email" class="form-control" id="inpResetPasswd" placeholder="Ingresar correo electronico" required>
            <button type="submit" class="btn btn-success">Restablecer</button>
        </form>
    </div>
@endsection