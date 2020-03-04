<!DOCTYPE>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/levantamiento.css">
    <title>Etesla Paneles Solares - Levantamiento</title>
</head>

<body>
    <div class="container-levantamiento">
        <div class="wrap-levantamiento">
            <div class="row">
                <div class="col text-center">
                    <h3>Formato de levantamiento.</h3>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <small style="font-size: 10px; font-weight: bold;">INFORMACIÓN DEL CLIENTE.</small>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="l_name_client" style="font-weight: bold;">Cliente:</label>

                                <input type="text" readonly class="form-control-plaintext" id="l_name_client" value="Eduardo Herrera Aldaraca" disabled="disabled">
                            </div>

                            <div class="form-group">
                                <label for="l_direction_client" style="font-weight: bold;">Dirección:</label>

                                <input type="text" readonly class="form-control-plaintext" id="l_direction_client" value="Calle Jalisco #5, U.H. Puerta del Sol, Orizaba-Veracruz" disabled="disabled">
                            </div>

                            <div class="form-group">
                                <label for="l_quantity_client" style="font-weight: bold;">Cantidad y capacidad por panel:</label>

                                <input type="text" readonly class="form-control-plaintext" id="l_quantity_client" value="Una cantidad grande" disabled="disabled">
                            </div>

                            <div class="form-group">
                                <label for="l_investor_client" style="font-weight: bold;">Inversor:</label>

                                <input type="text" readonly class="form-control-plaintext" id="l_investor_client" value="Una cantidad grande" disabled="disabled">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <small style="font-size: 10px; font-weight: bold;">CANALIZACIÓN.</small>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="l_pipeline" style="font-weight: bold;">¿La tubería es visible?:</label>
                                <br/>

                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="l_pipeline_1" name="customRadio" class="custom-control-input">
                                    <label class="custom-control-label" for="l_pipeline_1">Sí</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="l_pipeline_2" name="customRadio" class="custom-control-input">
                                    <label class="custom-control-label" for="l_pipeline_2">No</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="l_notes" style="font-weight: bold;">Especificaciones:</label>

                                <textarea class="form-control" id="l_specs_pipeline" style="max-height: 135px; min-height: 135px;" placeholder="Ingresar información."></textarea>
                            </div>

                            <div class="form-group">
                                <label for="l_trajectory" style="font-weight: bold;">Longitud de trayectoria:</label>

                                <div class="input-group">
                                    <input type="number" step="any" class="form-control" id="l_trajectory" placeholder="Ingresar información.">

                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">mtrs</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr/>

            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <small style="font-size: 10px; font-weight: bold;">ESPACIO PARA LA INSTALACIÓN.</small>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="l_space_instalation" style="font-weight: bold;">Espacios disponibles para instalar:</label>

                                            <input type="number" class="form-control" id="l_space_instalation" placeholder="Ingresar información.">
                                        </div>

                                        <div class="form-group">
                                            <label for="l_description_surface" style="font-weight: bold;">Descripción de la superficie:</label>
                                            
                                            <textarea class="form-control" id="l_description_surface" style="max-height: 115px; min-height: 115px;" placeholder="Ingresar información."></textarea>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="l_image_prev" style="font-weight: bold;">Previsualización de la superficie:</label>
                                            
                                            <input class="form-control" id="l_image_prev" type="file" />

                                            <hr>

                                            <div id="preview-surface" style="height: 130px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="l_available_area" style="font-weight: bold;">Área disponible :</label>

                                            <div class="input-group">
                                                <input type="number" step="any" class="form-control" id="l_available_area" placeholder="Ingresar información.">

                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">m²</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="l_inclination_area" style="font-weight: bold;">Inclinación en el área a instalar:</label>
                                            
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="l_inclination_area" placeholder="Ingresar información.">
                                                
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">°</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="l_shadow_projection" style="font-weight: bold;">Especificaciones de proyección de sombras:</label>
                                            
                                            <textarea class="form-control" id="l_shadow_projection" style="max-height: 125px; min-height: 125px;" placeholder="Ingresar información."></textarea>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="l_image_shadow" style="font-weight: bold;">Previsualización de la sombra:</label>
                                            
                                            <input class="form-control" id="l_image_shadow" type="file" />

                                            <hr>

                                            <div id="preview-shadow" style="height: 230px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="l_access_instalation" style="font-weight: bold;">Acceso hacia el área de instalación:</label>
                                            <br/>

                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="radio_access_1" name="l_access_instalation" class="custom-control-input">
                                                <label class="custom-control-label" for="radio_access_1">Interior del domicilio.</label>
                                            </div>

                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="radio_access_2" name="l_access_instalation" class="custom-control-input">
                                                <label class="custom-control-label" for="radio_access_2">Exterior del domicilio.</label>
                                            </div>

                                            <br/>
                                            <small style="font-weight: bold;">* Para alturas mayores a 3 mtrs, se requiere escalera telescópica.</small>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="l_specs_instalation" style="font-weight: bold;">Especificaciones:</label>
                                            
                                            <textarea class="form-control" id="l_specs_instalation" style="max-height: 125px; min-height: 125px;" placeholder="Ingresar información."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr/>

            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <small style="font-size: 10px; font-weight: bold;">PUNTO DE INTERCONEXIÓN.</small>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <div class="row justify-content-md-center">
                                    <div class="col">
                                        <div class="form-group text-center">
                                            <label for="l_type_cfe" style="font-weight: bold;">¿Cuál es el tipo de servicio CFE?:</label>
                                            <br/>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="l_type_cfe" id="radio_cfe_1" class="custom-control-input" onclick="monofasico()" checked="checked">
                                                <label class="custom-control-label" for="radio_cfe_1">Monofásico</label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="l_type_cfe" id="radio_cfe_2" class="custom-control-input" onclick="bifasico()">
                                                <label class="custom-control-label" for="radio_cfe_2">Bifásico</label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="l_type_cfe" id="radio_cfe_3" class="custom-control-input" onclick="trifasico()">
                                                <label class="custom-control-label" for="radio_cfe_3">Trifásico</label>
                                            </div>
                                        </div>

                                        <br/>

                                        <div class="row" id="divMonofasico">
                                            <div class="col-12 col-md-6">
                                                <div class="col text-center">
                                                    <p style="font-size: 17.5px; font-weight: bold;">Voltaje</p>
                                                </div>

                                                <div class="form-group">
                                                    <label for="l_voltage_l1n" style="font-weight: bold;">L1,N:</label>

                                                    <div class="input-group">
                                                        <input type="number" step="any" class="form-control" id="l_voltage_l1n" placeholder="Ingresar información.">
                                                        
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" id="basic-addon2">volts</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <div class="col text-center">
                                                    <p style="font-size: 17.5px; font-weight: bold;">Corriente</p>
                                                </div>

                                                <div class="form-group">
                                                    <label for="l_stream_l1" style="font-weight: bold;">L1:</label>

                                                    <div class="input-group">
                                                        <input type="number" step="any" class="form-control" id="l_stream_l1" placeholder="Ingresar información.">
                                                        
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" id="basic-addon2">amps</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" id="divBifasico" style="display:none;">
                                            <div class="col-12 col-md-6">
                                                <div class="col text-center">
                                                    <p style="font-size: 17.5px; font-weight: bold;">Voltaje</p>
                                                </div>

                                                <div class="form-group">
                                                    <label for="l_voltage_l1l2" style="font-weight: bold;">L1,L2:</label>

                                                    <div class="input-group">
                                                        <input type="number" step="any" class="form-control" id="l_voltage_l1l2" placeholder="Ingresar información.">
                                                        
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" id="basic-addon2">volts</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="l_voltage_l1n" style="font-weight: bold;">L1,N:</label>

                                                    <div class="input-group">
                                                        <input type="number" step="any" class="form-control" id="l_voltage_l1n" placeholder="Ingresar información.">
                                                        
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" id="basic-addon2">volts</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="l_voltage_l2n" style="font-weight: bold;">L2,N:</label>

                                                    <div class="input-group">
                                                        <input type="number" step="any" class="form-control" id="l_voltage_l2n" placeholder="Ingresar información.">
                                                        
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" id="basic-addon2">volts</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <div class="col text-center">
                                                    <p style="font-size: 17.5px; font-weight: bold;">Corriente</p>
                                                </div>

                                                <div class="form-group">
                                                    <label for="l_voltage_l1" style="font-weight: bold;">L1:</label>

                                                    <div class="input-group">
                                                        <input type="number" step="any" class="form-control" id="l_stream_l1" placeholder="Ingresar información.">
                                                        
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" id="basic-addon2">amps</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="l_voltage_l2" style="font-weight: bold;">L2:</label>

                                                    <div class="input-group">
                                                        <input type="number" step="any" class="form-control" id="l_stream_l2" placeholder="Ingresar información.">
                                                        
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" id="basic-addon2">amps</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" id="divTrifasico" style="display:none;">
                                            <div class="col-12 col-md-8">
                                                <div class="col text-center">
                                                    <p style="font-size: 17.5px; font-weight: bold;">Voltaje</p>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="l_voltage_l1l2" style="font-weight: bold;">L1,L2:</label>

                                                            <div class="input-group">
                                                                <input type="number" step="any" class="form-control" id="l_voltage_l1l2" placeholder="Ingresar información.">
                                                                
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon2">volts</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="l_voltage_l3l1" style="font-weight: bold;">L3,L1:</label>

                                                            <div class="input-group">
                                                                <input type="number" step="any" class="form-control" id="l_voltage_l3l1" placeholder="Ingresar información.">
                                                                
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon2">volts</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="l_voltage_l2l3" style="font-weight: bold;">L2,L3:</label>

                                                            <div class="input-group">
                                                                <input type="number" step="any" class="form-control" id="l_voltage_l2l3" placeholder="Ingresar información.">
                                                                
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon2">volts</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="l_voltage_l1n" style="font-weight: bold;">L1,N:</label>

                                                            <div class="input-group">
                                                                <input type="number" step="any" class="form-control" id="l_voltage_l1n" placeholder="Ingresar información.">
                                                                
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon2">volts</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="l_voltage_l2n" style="font-weight: bold;">L2,N:</label>

                                                            <div class="input-group">
                                                                <input type="number" step="any" class="form-control" id="l_voltage_l2n" placeholder="Ingresar información.">
                                                                
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon2">volts</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="l_voltage_l3n" style="font-weight: bold;">L3,N:</label>

                                                            <div class="input-group">
                                                                <input type="number" step="any" class="form-control" id="l_voltage_l3n" placeholder="Ingresar información.">
                                                                
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon2">volts</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-4">
                                                <div class="col text-center">
                                                    <p style="font-size: 17.5px; font-weight: bold;">Corriente</p>
                                                </div>

                                                <div class="form-group">
                                                    <label for="l_stream_l1" style="font-weight: bold;">L1:</label>

                                                    <div class="input-group">
                                                        <input type="number" step="any" class="form-control" id="l_stream_l1" placeholder="Ingresar información.">
                                                        
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" id="basic-addon2">amps</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="l_stream_l2" style="font-weight: bold;">L2:</label>

                                                    <div class="input-group">
                                                        <input type="number" step="any" class="form-control" id="l_stream_l2" placeholder="Ingresar información.">
                                                        
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" id="basic-addon2">amps</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="l_stream_l3" style="font-weight: bold;">L3:</label>

                                                    <div class="input-group">
                                                        <input type="number" step="any" class="form-control" id="l_stream_l3" placeholder="Ingresar información.">
                                                        
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" id="basic-addon2">amps</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group">
                                <div class="row justify-content-md-center">
                                    <div class="col">
                                        <div class="form-group text-center">
                                            <label for="l_choose_option" style="font-weight: bold;">Elige una opción:</label>
                                            <br/>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="l_choose_option" id="radio_option_1" class="custom-control-input" onclick="ampersCuchilla()" checked="checked">
                                                <label class="custom-control-label" for="radio_option_1">Interruptor de cuchillas</label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="l_choose_option" id="radio_option_2" class="custom-control-input" onclick="ampersDistribucion()">
                                                <label class="custom-control-label" for="radio_option_2">Tablero de distribución</label>
                                            </div>
                                        </div>

                                        <br/>

                                        <div class="row" id="divAmpers1">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="l_fuse_amps" style="font-weight: bold;">Ampers de fusibles:</label>

                                                    <div class="input-group">
                                                        <input type="number" step="any" class="form-control" id="l_fuse_amps" placeholder="Ingresar información.">
                                                        
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" id="basic-addon2">amps</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" id="divAmpers2" style="display: none;">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="l_principal_amps" style="font-weight: bold;">Ampers de ITM principal:</label>

                                                    <div class="input-group">
                                                        <input type="number" step="any" class="form-control" id="l_principal_amps" placeholder="Ingresar información.">
                                                        
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" id="basic-addon2">amps</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="l_interconnection_specification" style="font-weight: bold;">Especificación de punto de interconexión:</label>
                                            
                                            <textarea class="form-control" id="l_interconnection_specification" style="max-height: 100px; min-height: 100px;" placeholder="Ingresar información."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="l_new_measurer" style="font-weight: bold;">¿Se requiere preparación nueva del medidor?:</label>
                                            <br/>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="radio_measurer_1" name="l_new_measurer" class="custom-control-input">
                                                <label class="custom-control-label" for="radio_measurer_1">Sí</label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="radio_measurer_2" name="l_new_measurer" class="custom-control-input">
                                                <label class="custom-control-label" for="radio_measurer_2">No</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="l_specs_measurer" style="font-weight: bold;">Especificaciones:</label>
                                            
                                            <textarea class="form-control" id="l_specs_measurer" style="max-height: 127.5px; min-height: 127.5px;" placeholder="Ingresar información."></textarea>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="l_image_measurer" style="font-weight: bold;">Previsualización del medidor:</label>
                                            
                                            <input class="form-control" id="l_image_measurer" type="file" />

                                            <hr>

                                            <div id="preview-measurer" style="height: 130px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="l_physical_earth" style="font-weight: bold;">¿Se requiere instalación de tierra fisica?:</label>
                                            <br/>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="radio_physical_1" name="l_physical_earth" class="custom-control-input">
                                                <label class="custom-control-label" for="radio_physical_1">Sí</label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="radio_physical_2" name="l_physical_earth" class="custom-control-input">
                                                <label class="custom-control-label" for="radio_physical_2">No</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="l_specs_physical" style="font-weight: bold;">Especificaciones:</label>
                                            
                                            <textarea class="form-control" id="l_specs_physical" style="max-height: 127.5px; min-height: 127.5px;" placeholder="Ingresar información."></textarea>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="l_installation_inverter" style="font-weight: bold;">¿El inversor se instalará en?:</label>
                                            <br/>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="radio_inverter_1" name="l_installation_inverter" class="custom-control-input">
                                                <label class="custom-control-label" for="radio_inverter_1">Interior</label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="radio_inverter_2" name="l_installation_inverter" class="custom-control-input">
                                                <label class="custom-control-label" for="radio_inverter_2">Exterior</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="l_specs_inverter" style="font-weight: bold;">Especificaciones:</label>
                                            
                                            <textarea class="form-control" id="l_specs_inverter" style="max-height: 127.5px; min-height: 127.5px;" placeholder="Ingresar información."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="l_wifi_access" style="font-weight: bold;">¿El lugar tiene acceso a Wifi?:</label>
                                            <br/>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="radio_wifi_1" name="l_wifi_access" class="custom-control-input">
                                                <label class="custom-control-label" for="radio_wifi_1">Sí</label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="radio_wifi_2" name="l_wifi_access" class="custom-control-input">
                                                <label class="custom-control-label" for="radio_wifi_2">No</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="l_image_prev" style="font-weight: bold;">Especificaciones:</label>
                                            
                                            <textarea class="form-control" id="l_specs_wifi" style="max-height: 127.5px; min-height: 127.5px;" placeholder="Ingresar información."></textarea>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="l_material_reception" style="font-weight: bold;">¿Tiene espacio para la recepción de materiales?:</label>
                                            <br/>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="radio_reception_1" name="l_material_reception" class="custom-control-input">
                                                <label class="custom-control-label" for="radio_reception_1">Sí</label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="radio_reception_2" name="l_material_reception" class="custom-control-input">
                                                <label class="custom-control-label" for="radio_reception_2">No</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="l_specs_reception" style="font-weight: bold;">Especificaciones:</label>
                                            
                                            <textarea class="form-control" id="l_specs_reception" style="max-height: 127.5px; min-height: 127.5px;" placeholder="Ingresar información."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col text-center">
                    <button type="button" class="btn btn-success btn-lg">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/levantamiento.js"></script>

<script>
    function readImage (input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#blah').attr('src', e.target.result); // Renderizamos la imagen
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#imgInp").change(function () {
    // Código a ejecutar cuando se detecta un cambio de archivO
    readImage(this);
  });
</script>
</html>