@if($rol == 1) @php($layout = 'roles/admin') @endif
@if($rol == 2) @php($layout = 'roles/operations') @endif
@if($rol == 3) @php($layout = 'roles/enginer') @endif
@if($rol == 4) @php($layout = 'roles/enginer') @endif
@if($rol == 5) @php($layout = 'roles/seller') @endif

@extends($layout)

@section('content')
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
                            <img src="{{ asset('img/panel-etesla.jpg') }}" class="rounded-circle">
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
                            {{csrf_field()}}
                            <input type="submit" id="btn-save" value="Guardar información" class="btn btn-success btn-block" style="display: none;">
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="row" style="padding: unset;">
                        <div class="col-12" style="padding: unset;">
                            <div class="card user-profil-part" id="section-info">
                                @if(isset($usuario))
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <strong>{{$usuario->vPrimerApellido}}&nbsp;{{$usuario->vSegundoApellido}}&nbsp;</strong>
                                            <b class="text-muted">{{$usuario->vNombrePersona}}</b>
                                        </h5><br>
                                        <p class="card-text">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th style="width: 30%;">
                                                            <strong>Cargo:</strong>
                                                        </th>
                                                        <td style="width: 70%;">
                                                            @if($usuario->ttTipoUsuario == 'Admin')
                                                                <strong>Administrador</strong>
                                                            @endif
                                                            @if($usuario->ttTipoUsuario == 'Operac')
                                                                <strong>Operaciones</strong>
                                                            @endif
                                                            @if($usuario->ttTipoUsuario == 'GerenteIng')
                                                                <strong>Gerente de ingeniería</strong>
                                                            @endif
                                                            @if($usuario->ttTipoUsuario == 'Ing')
                                                                <strong>Ingeniero</strong>
                                                            @endif
                                                            @if($usuario->ttTipoUsuario == 'Vend')
                                                                <strong>Vendedor</strong>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <strong>Correo electrónico:</strong>
                                                        </th>
                                                        <td>
                                                            <strong>{{$usuario->vEmail}}</strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <strong>Sucursal:</strong>
                                                        </th>
                                                        <td>
                                                            <strong>{{$usuario->vOficina}}</strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <strong>Contraseña:</strong>
                                                        </th>
                                                        <td>
                                                            <strong>
                                                                <input type="password" class="password-user" id="inpPasswd" disabled="true" value="{{$usuario->vContrasenia}}">
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
                                                    @if($usuario->updated_at != null)
                                                        {{$usuario->updated_at}}
                                                    @else
                                                        Nunca
                                                    @endif
                                                </strong>
                                                
                                            </small>
                                        </p>
                                    </div>
                                @endif
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

                                                    @if(isset($usuario))
                                                        <div class="form-group row">
                                                            <label for="nombrePersona" class="col-sm-4 col-form-label">Nombre(s)</label>
                                                            
                                                            <div class="col-sm-8">
                                                                <input type="text" name="nombrePersona" class="form-control" id="nombrePersona" value="{{$usuario->vNombrePersona}}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="primerApellido" class="col-sm-4 col-form-label">Apellido Paterno</label>
                                                            
                                                            <div class="col-sm-8">
                                                                <input type="text" name="primerApellido" class="form-control" id="primerApellido" value="{{$usuario->vPrimerApellido}}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="segundoApellido" class="col-sm-4 col-form-label">Apellido Materno</label>
                                                            
                                                            <div class="col-sm-8">
                                                                <input type="text" name="segundoApellido" class="form-control" id="segundoApellido" value="{{$usuario->vSegundoApellido}}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="sucursal" class="col-sm-4 col-form-label">Sucursal actual</label>
                                                            
                                                            <div class="col-sm-8">
                                                                <select class="form-control" name="oficina">
                                                                    <option disabled value="-1">Selecciona la sucursal a la que perteneces</option>
                                                                    @if($usuario->vOficina == 'CDMX')
                                                                        <option selected value="CDMX">CDMX</option>
                                                                    @else
                                                                        <option value="CDMX">CDMX</option>
                                                                    @endif

                                                                    @if($usuario->vOficina == 'Puebla')
                                                                        <option selected value="Puebla">Puebla</option>
                                                                    @else
                                                                        <option value="Puebla">Puebla</option>
                                                                    @endif

                                                                    @if($usuario->vOficina == 'Veracruz')
                                                                        <option selected value="Veracruz">Veracruz</option>
                                                                    @else
                                                                        <option value="Veracruz">Veracruz</option>
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputPassword" class="col-sm-4 col-form-label">Contraseña</label>
                                                            
                                                            <div class="col-sm-8">
                                                                <input type="password" name="contrasenia" class="form-control" id="inpPasswd2" placeholder="********" required value="{{$usuario->vContrasenia}}">&nbsp;
                                                                <div class="input-group-prepend">
                                                                    <button id="btn-pass" class="btn btn-primary" type="button"><span class="fa fa-eye-slash icon"></span></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
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

    @section('scripts')
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
    @endsection
@endsection