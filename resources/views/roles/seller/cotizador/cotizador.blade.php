@if($rol == 1) @php($layout = 'roles/admin') @endif
@if($rol == 2) @php($layout = 'roles/operations') @endif
@if($rol == 3) @php($layout = 'roles/enginer') @endif
@if($rol == 4) @php($layout = 'roles/enginer') @endif
@if($rol == 5) @php($layout = 'roles/seller') @endif

@extends($layout)

@section('links')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection

@section('content')
<br>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm">
                                <input id="inpBuscarCliente" class="form-control" placeholder="Busca a tu cliente" onkeypress="buscarCoincidenciaCliente(event)"/>
                            </div>
                            <div class="col-sm-auto">
                                <button type="button" class="btn btn-success btn-xs" title="Buscar cliente" onclick="buscarCoincidenciaCliente(this)">
                                    <img src="{{ asset('img/icon/lupa-icon.png') }}" height="24px"/>
                                </button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm">
                                <select id="ddlCoincidenciasCliente" class="form-control" style="display:none;" onchange="seleccionarCliente(this)">
                                    <option value="-1" selected>Elige un cliente</option>
                                </select>
                                <small id="txtNoHayCoincidencia" style="display:none;">No hay coincidencia</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ url('registrarCliente') }}">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <small>Datos del cliente</small>
                                    <hr class="separador" style="margin-top:-10px;">
                                </div>
                                <div class="col">
                                    <button id="btnAgregarCliente" type="button" class="btn btn-success btn-xs pull-right" style="margin-top: -12px;" onclick="logicaFormularioCliente(0);">+</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col form-group" style="display:none;">
                                    <input id="inpClienteId" name="inpClienteId" class="form-control datosCliente" placeholder="Id Cliente" readonly/>
                                </div>
                                <div class="col form-group">
                                    <input id="inpClienteNombre" name="inpClienteNombre" class="form-control datosCliente" placeholder="Nombre" required readonly/>
                                </div>
                                <div class="col form-group">
                                    <input id="inpClientePrimerAp" name="inpClientePrimerAp" class="form-control datosCliente" placeholder="Primer apellido" required readonly/>
                                </div>
                                <div class="col form-group">
                                    <input id="inpClienteSegundoAp" name="inpClienteSegundoAp" class="form-control datosCliente" placeholder="Segundo apellido" readonly/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col form-group">
                                    <input id="inpClienteTelefono" name="inpClienteTelefono" class="form-control datosCliente" placeholder="Telefono" readonly/>
                                </div>
                                <div class="col form-group">
                                    <input id="inpClienteCelular" name="inpClienteCelular" class="form-control datosCliente" placeholder="Celular" required readonly/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col form-group">
                                    <input id="inpClienteMail" name="inpClienteMail" class="form-control datosCliente" type="mail" placeholder="Correo electronico" required readonly/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col form-group">
                                    <input id="inpClienteCalle" name="inpClienteCalle" class="form-control datosCliente" placeholder="Direccion (calle)" readonly/>
                                </div>
                                <div class="col form-row">
                                    <div class="col-sm">
                                        <input id="inpCP" name="inpCP" class="form-control datosCliente" placeholder="C.P." maxlength="5" required readonly/>
                                    </div>
                                    <div class="col-sm-auto">
                                        <button id="searchCP" type="button" class="btn btn-success btn-xs" onclick="buscarCPInfo()" disabled>
                                            <img src="{{ asset('img/icon/lupa-icon.png') }}" height="24px"/>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col form-group">
                                    <input id="inpClienteMunicipio" name="inpClienteMunicipio" class="form-control datosCliente" placeholder="Asentamiento" required readonly/>
                                    <select id="ddlMunicipio" class="form-control-sm" style="display:none;" onchange="selectOptEntidad(this)">
                                        <option value="-1">Escoge un asentamiento</option>
                                    </select>
                                </div>
                                <div class="col form-group">
                                    <input id="inpClienteCiudad" name="inpClienteCiudad" class="form-control datosCliente" placeholder="Ciudad" required readonly/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col form-group">
                                    <input id="inpClienteEstado" name="inpClienteEstado" class="form-control datosCliente" placeholder="Estado" required readonly/>
                                </div>
                            </div>
                            <div class="form-group form-group-buttons" style="display:none;">
                                <button type="button" class="btn btn-danger pull-right" onclick="logicaFormularioCliente(1);">Cancelar</button>
                                <button type="submit" class="btn btn-success pull-right">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    @yield('cotizadores')

    @section('scripts')
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

        <!-- Graficos -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <!-- Graficos -->

        <script type="text/javascript">
            // Función invocada en los inputs tipo number, no permite insertar datos que no sean numéricos.
            $('#form-group-inputs input[type="number"]').keydown(function(event) {
                if (event.shiftKey) {
                    event.preventDefault();
                }

                if (event.keyCode != 46 && event.keyCode != 8 && event.keyCode != 37 && event.keyCode != 39) {
                    if($(this).val().length >= 11) {
                        event.preventDefault();
                    }
                }

                if (event.keyCode < 48 || event.keyCode > 57) {
                    if (event.keyCode < 96 || event.keyCode > 105) {
                        if(event.keyCode != 46 && event.keyCode != 8 && event.keyCode != 37 && event.keyCode != 39) {
                            event.preventDefault();
                        }
                    }
                }
            });

            // Función invocada en los inputs, no permite pegar datos.
            $('#form-group-inputs input[type="number"]').on('paste', function(e){
                e.preventDefault();
            });

            // Función invocada en los inputs, no permite copiar datos.
            $('#form-group-inputs input[type="number"]').on('copy', function(e){
                e.preventDefault();
            });

            // Función invocada mediante el select, muestra/oculta secciones.
            $("#tarifa-actual").change(function () {
                $("#tarifa-actual option:selected").each(function () {
                    $('#fm-mensual').collapse("show");
                });
            });

            // Función invocada mediante el checkbox, modifica valores/propiedades de inputs.
            $("#switch-2").change(function () {
                if ($('#switch-2').prop('checked')) {

                    for (var count = 2; count <= 12; count++) {
                        $("#men-val-" + count).attr("readonly", "readonly");
                        $("#men-val-" + count + "a").attr("readonly", "readonly");

                        var value1 = $("#men-val-1").val();
                        var value2 = $("#men-val-1a").val();

                        $("#men-val-" + count).val(value1);
                        $("#men-val-" + count + "a").val(value2);
                    }
                } else {
                    for (var count = 2; count <= 12; count++) {
                        $("#men-val-" + count).removeAttr("readonly", "readonly");
                        $("#men-val-" + count + "a").removeAttr("readonly", "readonly");
                    }
                }
            });

            // Función invocada por el input, agrega su valor a los demás.
            $("#men-val-1").keyup(function () {
                if ($('#switch-2').prop('checked')) {
                    for (var count = 2; count <= 12; count++) {
                        var value = $(this).val();

                        $("#men-val-" + count).val(value);
                    }
                }
            });

            $("#men-val-1a").keyup(function () {
                if ($('#switch-2').prop('checked')) {
                    for (var count = 2; count <= 12; count++) {
                        var value = $(this).val();

                        $("#men-val-" + count + "a").val(value);
                    }
                }
            });
        </script>

        <script type="text/javascript">
            function filterFloat(evt,input){
                // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
                var key = window.Event ? evt.which : evt.keyCode;
                var chark = String.fromCharCode(key);
                var tempValue = input.value+chark;
                if(key >= 48 && key <= 57) {
                    if(filter(tempValue)=== false) {
                        return false;
                    } else {
                        return true;
                    }
                } else {
                    if(key == 8 || key == 13 || key == 0) {
                        return true;
                    } else if(key == 46) {
                        if(filter(tempValue)=== false) {
                            return false;
                        } else {
                            return true;
                        }
                    } else {
                        return false;
                    }
                }
            }
            function filter(__val__){
                var preg = /^([0-9]+\.?[0-9]{0,2})$/;
                if(preg.test(__val__) === true) {
                    return true;
                } else {
                    return false;
                }
            }
        </script>
    @endsection
@endsection
