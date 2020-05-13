<div class="modal fade" id="modal_editarcliente<?php echo e($cliente->idPersona); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Editar cliente.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12">
                        <form method="put" action="" class="background-muted">
                            <div class="row mn-1 pa-ma-1">
                                <div class="col-sm-6 col-md-4 offset-md-2">
                                    <div class="form-group">
                                        <label for="serviceCFE">No. servicio CFE</label>
                                        <input type="number" class="form-control border border-success" id="serviceCFE" placeholder="Ingrese un valor." disabled="true">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label for="inpCPCliente2">Código postal</label>
                                        <input type="number" class="form-control border border-success" id="inpCPCliente2" onblur="postalCodeLookup2();" placeholder="Ingrese un valor.">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12">
                        <form action="/editar-cliente/<?php echo e($cliente->idPersona); ?>" method="put" class="row">
                            <?php echo csrf_field(); ?>
                            <div class="col-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="nameClient">Nombre(s)</label>
                                    <input type="text" class="form-control" id="nameClient" name="nombrePersona" placeholder="Ingrese un valor." value="<?php echo e($cliente->vNombrePersona); ?>">
                                    <?php $__errorArgs = ['nombrePersona'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group">
                                    <label for="firstClient">Apellido Paterno</label>
                                    <input type="text" class="form-control" id="firstClient" name="primerApellido" placeholder="Ingrese un valor." value="<?php echo e($cliente->vPrimerApellido); ?>">
                                    <?php $__errorArgs = ['primerApellido'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group">
                                    <label for="lastClient">Apellido Materno</label>
                                    <input type="text" class="form-control" id="lastClient" name="segundoApellido" placeholder="Ingrese un valor." value="<?php echo e($cliente->vSegundoApellido); ?>">
                                    <?php $__errorArgs = ['segundoApellido'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group">
                                    <label for="emailClient">Correo Electrónico</label>
                                    <input type="text" class="form-control" id="emailClient" name="email" placeholder="Ingrese un valor." value="<?php echo e($cliente->vEmail); ?>">
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group">
                                    <label for="phoneClient">Teléfono</label>
                                    <input type="number" class="form-control" id="phoneClient" name="telefono" placeholder="Ingrese un valor."value="<?php echo e($cliente->vTelefono); ?>" onkeypress="return filterFloat(event,this);">
                                    <?php $__errorArgs = ['telefono'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="cellphoneClient">Teléfono celular</label>
                                    <input type="number" class="form-control" id="cellphoneClient" name="celular" placeholder="Ingrese un valor." value="<?php echo e($cliente->vCelular); ?>" onkeypress="return filterFloat(event,this);">
                                    <?php $__errorArgs = ['celular'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group">
                                    <label for="addressClient">Dirección</label>
                                    <?php ($direccion = explode("-", $cliente->vCalle)); ?>
                                    <input type="text" class="form-control" id="addressClient" name="calle" placeholder="Ingrese un valor." value="<?php echo e($direccion[0]); ?>">
                                    <?php $__errorArgs = ['calle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group">
                                    <label for="inpColoniaCliente2">Colonia</label>
                                    <?php ($posicion = stripos($cliente->vCalle, "-") + 1); ?>
                                    <?php ($colonia = substr($cliente->vCalle, $posicion, 100)); ?>
                                    <input type="" class="form-control" id="inpColoniaCliente2" name="colonia" onblur="closeSuggestBox2();" placeholder="Ingrese un valor." value="<?php echo e($colonia); ?>" disabled="true">
                                    <span style="position: absolute; top: 243px; left: 16px; z-index:1000;visibility: hidden;" id="suggestBoxElement2"></span></span>
                                    <?php $__errorArgs = ['colonia'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group">
                                    <label for="inpMunicCliente2">Municipio / Localidad</label>
                                    <input type="text" class="form-control" id="inpMunicCliente2" name="municipio" placeholder="Ingrese un valor." value="<?php echo e($cliente->vMunicipio); ?>" disabled="true">
                                    <?php $__errorArgs = ['municipio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group">
                                    <label for="inpEstadoCliente2">Estado</label>
                                    <input type="" class="form-control" id="inpEstadoCliente2" name="estado" placeholder="Ingrese un valor." value="<?php echo e($cliente->vEstado); ?>" disabled="true">
                                    <?php $__errorArgs = ['estado'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar edición</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    /*#region Busqueda por Codigo Postal - Jesús Daniel Carrera Falcón*/
    var postalcodes2;

    function getLocation2(jData) {
        if (jData == null) {
            return;
        }

        postalcodes2 = jData.postalcodes2;

        if (postalcodes2.length > 1) {
                document.getElementById('suggestBoxElement2').style.visibility = 'visible';
                var suggestBoxHTML = '';

                for (i=0; i<jData.postalcodes2.length; i++) {
                    suggestBoxHTML += "<div class='suggestions' id=pcId2"+ i +" onmousedown='suggestBoxMouseDown2("+ i +")' onmouseover='suggestBoxMouseOver2("+ i +")' onmouseout='suggestBoxMouseOut2("+ i +")'> " + postalcodes2[i].placeName +'</div>';
                }
                document.getElementById('suggestBoxElement2').innerHTML = suggestBoxHTML;
                var municipio = document.getElementById("inpMunicCliente2");
                var estado = document.getElementById("inpEstadoCliente2");
                municipio.value = postalcodes2[0].adminName2;
                estado.value = postalcodes2[0].adminName1;
        } else {
            if (postalcodes2.length == 1) {
                var placeInput = document.getElementById("inpColoniaCliente2");
                var municipio = document.getElementById("inpMunicCliente2");
                var estado = document.getElementById("inpEstadoCliente2");
                placeInput.value = postalcodes2[0].placeName;
                municipio.value = postalcodes2[0].adminName2;
                estado.value = postalcodes2[0].adminName1;
            }
            closeSuggestBox2();
        }
    }

    function closeSuggestBox2() {
        document.getElementById('suggestBoxElement2').innerHTML = '';
        document.getElementById('suggestBoxElement2').style.visibility = 'hidden';
    }

    function suggestBoxMouseOut2(obj) {
        document.getElementById('pcId2'+ obj).className = 'suggestions';
    }

    function suggestBoxMouseDown2(obj) {
        closeSuggestBox2();
        var placeInput = document.getElementById("inpColoniaCliente2");
        placeInput.value = postalcodes2[obj].placeName;
    }

    function suggestBoxMouseOver2(obj) {
        document.getElementById('pcId2'+ obj).className = 'suggestionMouseOver';
    }

    function postalCodeLookup2() {
        if (geonamesPostalCodeCountries.toString().search('MX') == -1) {
            return;
        }
        
        document.getElementById('suggestBoxElement2').style.visibility = 'visible';
        document.getElementById('suggestBoxElement2').innerHTML = '<small><i>cargando...</i></small>';

        var postalcode = document.getElementById("inpCPCliente2").value;

        request = 'http://api.geonames.org/postalCodeLookupJSON?postalcode=' + postalcode  + '&country=MX&callback=getLocation2&username=urakirabe';

        aObj = new JSONscriptRequest(request);
        aObj.buildScriptTag();
        aObj.addScriptTag();
    }

    //--------------------------------------------------------------------------------------------------------------

    function JSONscriptRequest(fullUrl) {
        this.fullUrl = fullUrl; 
        this.noCacheIE = '&noCacheIE=' + (new Date()).getTime();
        this.headLoc = document.getElementsByTagName("head").item(0);
        this.scriptId = 'YJscriptId' + JSONscriptRequest.scriptCounter++;
    }

    JSONscriptRequest.scriptCounter = 1;

    JSONscriptRequest.prototype.buildScriptTag = function () {
        this.scriptObj = document.createElement("script");
        this.scriptObj.setAttribute("type", "text/javascript");
        this.scriptObj.setAttribute("src", this.fullUrl + this.noCacheIE);
        this.scriptObj.setAttribute("id", this.scriptId);
    }

    JSONscriptRequest.prototype.removeScriptTag = function () {
        this.headLoc.removeChild(this.scriptObj);  
    }

    JSONscriptRequest.prototype.addScriptTag = function () {
        this.headLoc.appendChild(this.scriptObj);
    }
    /*#endregion*/
</script><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/template/modal_editarCliente.blade.php ENDPATH**/ ?>