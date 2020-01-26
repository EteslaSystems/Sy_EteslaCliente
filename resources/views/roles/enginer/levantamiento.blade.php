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
            <span class="levantamiento-form-title">Formato de Levantamiento</span>
            <!-- Inicio de contenedor gris -->
            <div class="row">
                <div class="col">
                    <div class="wrap contenedor-input100">
                        <span class="label-input100">INFORMACIÓN CLIENTE</span>
                        <div class="form-group">
                            <label class="label-1-client">Cliente</label>
                            <label>Eduardo Herrera Aldaraca</label>
                        </div>
                        <div class="form-group">
                            <label class="label-1-client">Dirección</label>
                            <label>Calle Jalisco #5, U.H. Puerta del Sol, Orizaba-Veracruz</label>
                        </div>
                        <div class="form-group">
                            <label class="label-1-client">Inversor</label>
                            <label>Una cantidad grande</label>
                        </div>
                        <div class="form-group">
                            <label class="label-1-client">Cantidad y capacidad por panel</label>
                            <label>Una cantidad grande</label>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="wrap contenedor-input100">
                        <!-- AQUI DEBE DE INICIAR EL FORMULARIO -->
                        <span class="label-input100">CANALIZACIÓN</span>
                        <br>
                        <label class="label-1-client">Tuberia visible</label>
                        <div class="form-group pull-right">
                            <input class="form-check-input-inline" type="checkbox" id="opcSiTuberiaVisible" value="si">
                            <label class="form-check-label" for="opcSiTuberiaVisible">Si</label>
                            <input class="form-check-input-inline" type="checkbox" id="opcNoTuberiaVisible" value="no">
                            <label class="form-check-label" for="opcNoTuberiaVisible">No</label>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="Longitud de trayectoria">
                        </div>
                        <textarea class="form-control form-control-inline" rows="7" placeholder="Notas"></textarea>
                    </div>
                </div>
            </div>
            <div class="wrap contenedor-input100">
                <span class="label-input100">ESPACIO PARA INSTALAR</span>  
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label class="label-1-client">Espacios disponibles para instalar</label>
                            <input type="number" class="form-control" placeholder="Espacios disponibles para instalación">
                        </div>
                        <textarea class="form-control form-control-inline" rows="7" placeholder="Descripción de superficie"></textarea>
                    </div>
                    <div class="col">
                        <!-- Espacio para subir imagen y previsualizarla -->
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Escoge una imagen</label>
                        </div>
                        <img id="imgPrevious" class="img-fluid">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label class="label-1-client">Área disponible</label>
                            <input type="number" class="form-control" placeholder="Área disponible">
                        </div>
                        <div class="form-group">
                            <label class="label-1-client">Inclinación en área a instalar</label>
                            <input type="number" class="form-control" placeholder="Inclinación en área a instalar">
                        </div>
                    </div>
                    <div class="col">
                        <textarea class="form-control form-control-inline" rows="7" placeholder="Proyección de sombras"></textarea>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label class="label-1-client">Acceso hacia área a instalar</label>
                        </div>
                        <div class="form-group">
                            <div class="row justify-content-center">
                                <input class="form-check-input-inline" type="checkbox" name="accesoAreaInstalar" id="opcSiAccesoAreaInstalar" value="si">
                                <label class="form-check-label" for="opcSiAcesoAreaInstalar">Interior de domicilio</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row justify-content-center">
                                <input class="form-check-input-inline" type="checkbox" name="accesoAreaInstalar" id="opcNoAccesoAreaInstalar" value="no">
                                <label class="form-check-label" for="opcNoAcesoAreaInstalar">Exterior de domicilio</label>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <textarea class="form-control form-control-inline" rows="7" placeholder="Acceso hacia área a instalar"></textarea>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <label class="label-1-client">*altura mayor de 3 metros se requiere escalera telescópica*</label>
                </div>
            </div>
            <div class="wrap contenedor-input100">
                <span class="label-input100">PUNTO DE INTERCONEXIÓN</span>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label class="label-1-client">Tablero de distribución</label>
                            <textarea class="form-control form-control-inline" rows="7" placeholder="Notas del tablero de distribución"></textarea>
                        </div>
                    </div>
                    <div class="col">
                        <!-- Espacio para subir imagen y previsualizarla -->
                        <label class="label-1-client">Lugar para subir foto y la previsualización de la misma</label>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <label class="label-1-client">Se requiere preparación nueva de medidor</label>
                        <div class="form-group">
                            <input class="form-check-input-inline" type="checkbox" id="opcSiTierraFisica" value="si">
                            <label class="form-check-label" for="opcSiTierraFisica">Si</label>
                            <input class="form-check-input-inline" type="checkbox" id="opcNoTierraFisica" value="no">
                            <label class="form-check-label" for="opcNoTierraFisica">No</label>
                        </div>
                        <textarea class="form-control form-control-inline" rows="7" placeholder="Notas de prepraración nueva de medidor"></textarea>
                    </div>
                    <div class="col">
                        <!-- Espacio para subir imagen y previsualizarla -->
                        <label class="label-1-client">Lugar para subir foto y la previsualización de la misma</label>
                    </div>
                </div>
                <hr>
                <div class="row justify-content-center">
                    <div class="col">
                        <label class="label-1-client">Servicio CFE</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optServicioCFE" id="opcSiAccesoAreaInstalar" value="si" onclick="monofasico()" checked>Monofásico
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optServicioCFE" id="opcSiAccesoAreaInstalar" value="si" onclick="bifasico()">Bifásico
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optServicioCFE" id="opcSiAccesoAreaInstalar" value="si" onclick="trifasico()">Trifásico
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="label-1-client">Voltaje</label>
                                </div>
                                <div class="col">
                                    <label class="label-1-client">Corriente</label>
                                </div>
                            </div>
                            <div class="row" id="divMonofasico">
                                <div class="col">
                                    <label>L1,N</label>
                                    <input class="form-control">
                                </div>
                                <div class="col">
                                    <label>L1</label>
                                    <input class="form-control">
                                </div>
                            </div>
                            <div class="row" id="divBifasico" style="display:none;">
                                <div class="col">
                                    <label>L1,L2</label>
                                    <input class="form-control">
                                    <label>L1,N</label>
                                    <input class="form-control">
                                    <label>L2,N</label>
                                    <input class="form-control">
                                </div>
                                <div class="col">
                                    <label>L1</label>
                                    <input class="form-control">
                                    <label>L2</label>
                                    <input class="form-control">
                                </div>
                            </div> 
                            <div class="row" id="divTrifasico" style="display:none;">
                                <div class="col">
                                    <label>L1,L2</label>
                                    <input class="form-control">
                                    <label>L3,L1</label>
                                    <input class="form-control">
                                    <label>L2,L3</label>
                                    <input class="form-control">
                                    <label>L1,N</label>
                                    <input class="form-control">
                                    <label>L2,N</label>
                                    <input class="form-control">
                                    <label>L3,N</label>
                                    <input class="form-control">
                                </div>
                                <div class="col">
                                    <label>L1</label>
                                    <input class="form-control">
                                    <label>L2</label>
                                    <input class="form-control">
                                    <label>L3</label>
                                    <input class="form-control">
                                </div>
                            </div> 
                        </div>  
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <label class="label-1-client">El sitio tiene acceso a WIFI</label>
                        <div class="form-group">
                            <input class="form-check-input-inline" type="checkbox" id="opcSiAccesoWifi" value="si">
                            <label class="form-check-label" for="opcSiAccesoWifi">Si</label>
                            <input class="form-check-input-inline" type="checkbox" id="opcNoAccesoWifi" value="no">
                            <label class="form-check-label" for="opcNoAccesoWifi">No</label>
                        </div>
                        <div class="form-group">
                            <label class="label-1-client">Especificación de punto de interconexion</label>
                            <textarea class="form-control form-control-inline" rows="7" placeholder="Especificación del punto de interconexión"></textarea>
                        </div>
                    </div>
                    <div class="col">
                        <label class="label-1-client">Espacio para recepción de materiales</label>
                        <div class="form-group">
                            <input class="form-check-input-inline" type="checkbox" id="opcSiRecepcionMateriales" value="si">
                            <label class="form-check-label" for="opcSiRecepcionMateriales">Si</label>
                            <input class="form-check-input-inline" type="checkbox" id="opcNoRecepcionMateriales" value="no">
                            <label class="form-check-label" for="opcNoRecepcionMateriales">No</label>
                        </div>
                        <div class="form-group">
                            <label class="label-1-client">Interruptor de cuchillas</label>
                            <textarea class="form-control form-control-inline" rows="7" placeholder="Notas del interruptor de cuchillas"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group-inline">
                            <label class="label-1-client">Se requiere instalación de tierra fisica</label>
                            <input class="form-check-input-inline" type="checkbox" id="opcSiTierraFisica" value="si">
                            <label class="form-check-label" for="opcSiTierraFisica">Si</label>
                            <input class="form-check-input-inline" type="checkbox" id="opcNoTierraFisica" value="no">
                            <label class="form-check-label" for="opcNoTierraFisica">No</label>
                            <textarea class="form-control form-control-inline" rows="6" placeholder="¿Se requiere instalación de tierra fisica?"></textarea>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group-inline">
                            <label class="label-1-client">El inversor se instalará</label>
                            <input class="form-check-input-inline" type="checkbox" id="opcInversorInterior" value="interior">
                            <label class="form-check-label" for="opcInversorInterior">Interior</label>
                            <input class="form-check-input-inline" type="checkbox" id="opcInversorExterior" value="exterior">
                            <label class="form-check-label" for="opcInversorExterior">Exterior</label>
                            <textarea class="form-control form-control-inline" rows="6" placeholder="Descripción de la superficie donde se instalará el inversor"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-success btn-lg pull-right">Cargar</button>
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