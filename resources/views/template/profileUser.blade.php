@extends('template/body')
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
                        </div>
                    </div>
                </div>

                <div class="col-9">
                    <div class="row" style="padding: unset;">
                        <div class="col-12" style="padding: unset;">
                            <div class="card user-profil-part" id="section-info">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <strong>Ramirez Herrerias </strong>
                                        <b class="text-muted"> Benny Yael</b>
                                    </h5>

                                    <br>

                                    <p class="card-text">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th style="width: 30%;">
                                                        <strong>Cargo:</strong>
                                                    </th>
                                                    <td style="width: 70%;">
                                                        <strong>Becario precario</strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <strong>Correo electrónico:</strong>
                                                    </th>
                                                    <td>
                                                        <strong>yael.ramirez@etesla.com</strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <strong>Sucursal:</strong>
                                                    </th>
                                                    <td>
                                                        <strong>Veracruz</strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <strong>Contraseña:</strong>
                                                    </th>
                                                    <td>
                                                        <strong>Data private</strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </p>

                                    <hr>

                                    <p class="card-text text-right">
                                        <small class="text-muted">
                                            Última vez editado: <strong>&nbsp; 02/12/2020</strong>
                                        </small>
                                    </p>
                                </div>
                            </div>

                            <div class="card user-profil-part" id="section-edit" style="display: none;">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <strong>Editar </strong>
                                        <b class="text-muted"> Información</b>
                                    </h5>

                                    <br>

                                    <p class="card-text">
                                        <div class="row">
                                            <div class="col-12">
                                                <form>
                                                    <div class="form-group row">
                                                        <label for="staticEmail" class="col-sm-4 col-form-label">Nombre(s)</label>
                                                        
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="staticEmail" value="Benny Yael">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="staticEmail" class="col-sm-4 col-form-label">Apellido Paterno</label>
                                                        
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="staticEmail" value="Ramirez">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="staticEmail" class="col-sm-4 col-form-label">Apellido Materno</label>
                                                        
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="staticEmail" value="Herrerias">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="staticEmail" class="col-sm-4 col-form-label">Sucursal actual</label>
                                                        
                                                        <div class="col-sm-8">
                                                            <select class="form-control" id="staticEmail">
                                                                <option disabled>Elige una opción:</option>
                                                                <option value="" selected>Veracruz</option>
                                                                <option value="">Puebla</option>
                                                                <option value="">Ciudad de México</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputPassword" class="col-sm-4 col-form-label">Contraseña</label>
                                                        
                                                        <div class="col-sm-8">
                                                            <input type="password" class="form-control" id="inputPassword" value="************">
                                                        </div>
                                                    </div>
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
            });

            $("#btn-cancel").click(function () {
                $('#section-info').show();
                $('#section-edit').hide();
                $('#btn-edit').show();
                $('#btn-cancel').hide();
            });
        </script>
    @endsection
@endsection