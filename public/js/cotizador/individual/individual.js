/*
- @description: 		Archivo correspondiente a las funciones de los controles de la cotizacion_individual.
- @author: 				LH420
- @date: 				19/05/2020
*/
/*#region Server*/
function getCotizacionIndividual(dataCotInd){
    sessionStorage.removeItem("tarifaMT");
    sessionStorage.setItem("tarifaMT", "individual");

    return new Promise((resolve, reject) => {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            url: '/enviarCotizIndiv',
            data: { dataCotInd: dataCotInd },
            dataType: 'json',
            success: function(cotizacionIndividual){
                if(cotizacionIndividual.status == 200){
                    cotizacionIndividual = cotizacionIndividual.message;

                    //***
                    console.log(cotizacionIndividual);

                    //Activar botones de -guardar- y -generar
                    $('#generarPDF').prop('disabled',false);
                    $('#guardarPropuesta').prop('disabled',false);

                    //Guardar PropuestaResult en un SessionStorage
                    sessionStorage.removeItem('ssPropuestaIndividual');
                    sessionStorage.setItem('ssPropuestaIndividual',JSON.stringify(cotizacionIndividual[0]))

                    resolve(cotizacionIndividual);
                }
                else{
                    console.log(cotizacionIndividual);
                    throw 'Error! Status Server 500!';
                }
            },
            error: function(error){
                console.log(error);
                throw 'Ocurrio un error';
            }
        });
    });
}
/*#endregion*/

/*#region Logica Botones*/
async function calcularCotizacionIndividual(){ //:Main()
    try{
        let dataCotizacionIndividual = catchDataCotizacionIndividual();
        let CotizacionIndividual = await getCotizacionIndividual(dataCotizacionIndividual);
        pintarResultadoCotizacion(CotizacionIndividual); //:void
    }
    catch(error){
        alert(error);
    }
}

function activarInputsDDL(listDesplegable){ //Activa los campos debajo de los DropDownList (paneles, inversores, estructuras)
    let dropDownListId = listDesplegable.id; //Tipo de DropwDownList [ paneles, inversores, estructuras ]
    let inputDropDownListId = '';

    switch(dropDownListId)
    {
        case 'optPaneles':
            inputDropDownListId = 'inpCantPaneles';
        break;
        case 'optInversores':
            inputDropDownListId = 'inpCantInversores';
            captaCombinacionMicros(listDesplegable);
        break;
        case 'optEstructuras':
            inputDropDownListId = 'inpCantEstructuras';
        break;
        default:
            -1;
        break;
    }

    if(listDesplegable.value != '-1' || listDesplegable.value != -1){
        $('#'+inputDropDownListId).prop('disabled', false);
    }
    else{
        limpiarInput(inputDropDownListId);
        $('#'+inputDropDownListId).prop('disabled', true);
    }
}

function cambiaValorCheckBox(checkBox){
    let checkBoxValue = checkBox.value;
    checkBoxValue = checkBoxValue == 1 ? 0 : 1;

    //Se cambia el valor del checkBox clickeado
    checkBox.value = checkBoxValue;

    //Se valida si el checkBox clickeado es el de viaticos
    if(checkBox.id == 'chbViaticos'){
        let _chbComponentesViaticos = ["chbPasaje","chbHospedaje","chbComida"];

        if(checkBoxValue == 0){
            //Se deseleccionan todos los checkbox -componentes- de *Viaticos*
            $.each(_chbComponentesViaticos, function(i, nombreChbox){
                $('#'+nombreChbox).prop('checked', false);
                $('#'+nombreChbox).prop('disabled', true);
            });
        }
        else{
            $.each(_chbComponentesViaticos, function(i, nombreChbox){
                $('#'+nombreChbox).prop('checked', true);
                $('#'+nombreChbox).prop('disabled', false);
            });
        }
    }
}

function captaCombinacionMicros(option){
    /* 
      Obtiene el tipo de -Inversor[ inversor, micro, combinacionMicros ] className del [option]
      del DropDownListInversores(select).
    */
   let valueOption = option.value;

    if(valueOption != -1){
        let tipoInversor = option[option.selectedIndex].title;

        if(tipoInversor == "Combinacion"){
            //Obtener el -texto- de la opcion seleccionada [combinacionMicroInversor]
            let nombreCombinacion = option[option.selectedIndex].text;

            //Aparece los inputs de -combinacionMicros-
            $('#cntInversor').hide();
            $('#cntCombinacion').show();

            //Activar los inputs de -combinacionMicros-
            $("#inpCantMicro1").prop("disabled",false);
            $("#inpCantMicro2").prop("disabled",false);

            //Obtener los nombres de los micros por separado
            let MicrosNombres = obtenerNombresEquiposMicros(nombreCombinacion);

            //Agregar el texto a los labels [microInversor1 && microInversor2]
            $('#lblMicroInversorUno').text("Cantidad de "+MicrosNombres.equipo1);
            $('#lblMicroInversorDos').text("Cantidad de "+MicrosNombres.equipo2);
        }
        else{
            //Aparece los inputs de -inversores-
            $('#cntCombinacion').hide();
            $('#cntInversor').show();

            //Desactivar los inputs de -combinacionMicros-
            $("#inpCantMicro1").prop("disabled",true);
            $("#inpCantMicro2").prop("disabled",true);
        }
    }
}

function limpiarInput(nombreInput){
    if(nombreInput.length > 0){
        $('#'+nombreInput).val('');
    }
    else{
        $('.inputResult').val('');
    }
}
/*#endregion*/


/*#region Funcionalidad*/
function catchDataCotizacionIndividual(){
    let dataCotIndividual = { 
        cliente: { id: null, direccion: null },
        ajustePropuesta: { aumento: null, descuento: null },
        complementos: { 
            manoObra: null, 
            otros: null, 
            viaticos: {}, 
            fletes: null 
        }, 
        agregados: null, 
        equipos: null
    };
    let _agregado = null;
    
    let catchDireccion = () => {
        let calle = $('#inpClienteCalle').val() || '';
        let asentamiento = $('#inpClienteMunicipio').val() || '';
        let ciudad = $('#inpClienteCiudad').val() || '';
        let codigoPostal = $('#inpCP').val() || '';
        let estado = $('#inpClienteEstado').val() || '';

        if(estado.length>0){
            return calle + ' ' + asentamiento + ' ' + ciudad + ' ' + codigoPostal + ' ' + estado;
        }
        else{
            banderaDelError = 1;
            alert('Falta cargar un cliente!');
        }
    };

    dataCotIndividual.cliente.id = $('#inpClienteId').val();
    dataCotIndividual.cliente.direccion = catchDireccion;

    /* Cliente */
    if(validarUsuarioCargado(dataCotIndividual.cliente.id) == true){
        /* Equipos */
        if(validarInputsEquipos() === true){
            /* Equipos (paneles, inversores, estructuras) */
            dataCotIndividual.equipos = catchDataEquipos();

            /* Complementos [ManoObra, Otros, Viaticos, Fletes] */
            dataCotIndividual.complementos.manoObra = $('#chbMO').val();
            dataCotIndividual.complementos.otros = $('#chbOtros').val();
            dataCotIndividual.complementos.viaticos = {
                /* Viaticos - Complementos */
                viaticos: $('#chbViaticos').val(),
                hospedaje: $('#chbHospedaje').val(),
                pasaje: $('#chbPasaje').val(),
                comida: $('#chbComida').val()
            };
            dataCotIndividual.complementos.fletes = $('#chbFletes').val();

            /* Agregados */
            _agregado = sessionStorage.getItem("_agregados") === null ? null : JSON.parse(sessionStorage.getItem("_agregados"));//Comprobacion de que no venga vacio
            dataCotIndividual.agregados = _agregado;

            /* AjustePropuesta */
            dataCotIndividual.ajustePropuesta = {
                aumento: $('#inpSliderAumento').val() || 0, 
                descuento: $('#inpSliderDescuento').val() || 0
            };

            return dataCotIndividual;
        }
    }
}

function pintarResultadoCotizacion(cotizacionResult){
    let cotizacionIndividual = cotizacionResult[0]; //Formating of Array to Object
    let potenciaInstalad = 0, costoPanel = 0, costoInversor = 0, costoEstructura = 0;

    /* [ Setters data ] */
    /// [ Paneles ]
    if(cotizacionIndividual.paneles != null){
        potenciaInstalad = ((cotizacionIndividual.paneles.fPotencia * cotizacionIndividual.paneles.noModulos) / 1000);
        costoPanel = cotizacionIndividual.paneles.costoTotal;
    }

    /// [ Inversores ]
    if(cotizacionIndividual.inversores != null){
        costoInversor = cotizacionIndividual.inversores.costoTotal;
    }

    /// [ Estructuras ]
    if(cotizacionIndividual.estructura._estructuras != null){
        costoEstructura = cotizacionIndividual.estructura.costoTotal;
    }

    /// [Totales && Subtotales]
    let costoViaticos = cotizacionIndividual.totales.totalViaticosMT;
    let costoMO = cotizacionIndividual.totales.manoDeObra + cotizacionIndividual.totales.otrosTotal;
    let costoFletes =cotizacionIndividual.totales.fletes; //$$ - USD
    let subtotalUSD = cotizacionIndividual.totales.precio;
    let subtotalMXN = cotizacionIndividual.totales.precioMXNSinIVA;
    let totalUSD = cotizacionIndividual.totales.precioMasIVA;
    let totalMXN = cotizacionIndividual.totales.precioMXNConIVA;

    /* ------------ */
    $('#resPotenciaInstalada').text(potenciaInstalad + ' kW');
    $('#resCostoPanel').text('$ ' + costoPanel + ' USD');
    $('#resCostInversor').text('$ ' + costoInversor + ' USD');
    $('#resCostEstruct').text('$ ' + costoEstructura + ' USD');
    $('#resCostoViaticos').text('$ ' + costoViaticos + ' USD');
    $('#resCostoMO').text('$ ' + costoMO + ' USD');
    $('#resCostoFletes').text('$ ' + costoFletes + ' USD');

    //Subtotales y totales
    $('#tdSubtotalUSD').text('$ ' + subtotalUSD.toLocaleString('es-MX') + ' USD');
    $('#tdSubtotalMXN').text('$ ' + subtotalMXN.toLocaleString('es-MX') + ' MXN');
    $('#tdTotalUSD').text('$ ' + totalUSD.toLocaleString('es-MX') + ' USD');
    $('#tdTotalMXN').text('$ ' + totalMXN.toLocaleString('es-MX') + ' MXN');
}

function catchDataEquipos(){
    let equipos = { paneles: null, inversores: null, estructuras: null };

    if($('#optPaneles').val() != '-1' || $('#optPaneles').val() != -1){
        equipos.paneles = {
            modelo: $('#optPaneles').val(),
            cantidad: $('#inpCantPaneles').val()
        };
    }
    
    if($('#optInversores').val() != '-1' || $('#optInversores').val() != -1){
        let tipoInversor = $('#optInversores option:selected').attr("title");

        if(tipoInversor === "Combinacion"){
            let nombreCombinacion = $('#optInversores option:selected').text();
            let Micros = obtenerNombresEquiposMicros(nombreCombinacion);

            equipos.inversores = {
                vNombreMaterialFot: 'nombreCombinacion',
                equipo1: {
                    modelo: Micros.equipo1,
                    cantidad: $('#inpCantMicro1').val()
                },
                equipo2: {
                    modelo: Micros.equipo2,
                    cantidad: $('#inpCantMicro2').val()
                },
                combinacion: true
            };
        }
        else{
            equipos.inversores = {
                modelo: $('#optInversores').val(),
                cantidad: $('#inpCantInversores').val()
            };
        }
    }
    
    if($('#optEstructuras').val() != '-1' || $('#optEstructuras').val() != -1){
        equipos.estructuras = {
            modelo: $('#optEstructuras').val(),
            cantidad: $('#inpCantEstructuras').val()
        };
    }

    return equipos;
}

function obtenerNombresEquiposMicros(combinacionMicros){ //Return [Object]
    /* [Descripcion]
      Se obtiene el string del nombre de la -combinacionMicros ["microInversor1+microInversor2"]-.
      Se recorre la cadena y se separa los dos nombres de los micros. Se retornan los 2 nombres por separado
    */
    let objResult = {};
    let equipo1 = "", equipo2 = "";
    let totalDeCaracteres = 0, indice = 0;
    
    //Devuelve la longitud del nombre de la -combinacion-
    totalDeCaracteres = combinacionMicros.length;

    //Equipo1
    indice = combinacionMicros.indexOf("+");
    equipo1 = combinacionMicros.substring(0, indice);

    //Equpo2
    indice = equipo1.length + 1;
    equipo2 = combinacionMicros.substring(indice, totalDeCaracteres);

    return objResult = { equipo1, equipo2 };
}
/*#endregion*/

/*#region Validaciones*/
function validarUsuarioCargado(direccion_Cliente){
    if(direccion_Cliente){
        return true;
    }
    else{
        throw "Falto cargar un cliente";
    }
}

function validarInputsEquipos(){ //Valida solo los inputs vacios de los *dropDownList que fueron ocupados*
    let _listasDesplegables = ['optPaneles','optInversores','optEstructuras']
    let inputDropDownListId = '', valorInput = '', tipoInversor = '';

    //Iteras coleccion de dropDownList
    $.each(_listasDesplegables, function(i,nombreDDL){
        //Se valida que el dropDownList haya sido usado
        if($('#'+nombreDDL).val() != '-1'){
            //Se identifica el -input- del dropDownList ocupado
            switch(nombreDDL)
            {
                case 'optPaneles':
                    inputDropDownListId = 'inpCantPaneles';
                break;
                case 'optInversores':
                    /* tipoInversor = [ inversor, micro, combinacion ] */
                    tipoInversor = $('#'+nombreDDL+' option:selected').attr("title");

                    inputDropDownListId = 'inpCantInversores';
                break;
                case 'optEstructuras':
                    inputDropDownListId = 'inpCantEstructuras';
                break;
                default:
                    -1;
                break;
            }

            //Se valida que dicho -input- NO ESTE VACIO
            if(tipoInversor != '' && tipoInversor == 'Combinacion'){ ///Combinacion de MicroInversores
                let valInpMicroInv1 = null, valInpMicroInv2 = null;

                valInpMicroInv1 = $('#inpCantMicro1').val();
                valInpMicroInv2 = $('#inpCantMicro2').val();

                if(valInpMicroInv1 === "" && valInpMicroInv2 === ""){
                    throw 'Alguno de los inputs pertenecientes a la combinacion de micro inversores se encuentra vacio.';
                }
                else if(valInpMicroInv1 === "0" || valInpMicroInv2 === "0"){
                    throw 'No se permite el valor {0}';
                }

                valorInput = [valInpMicroInv1,valInpMicroInv2];
            }
            else{
                valorInput = $('#'+inputDropDownListId).val();
            }

            if(valorInput.length < 1){
                throw 'Input '+inputDropDownListId+', se encuentra vacio.\nFavor de llenarlo o inhabilitar la lista desplegable correspondiente';
            }
            else if(valorInput === '0'){
                throw 'El valor del Input '+inputDropDownListId+', no puede ser 0.\nFavor de ingresar un valor mayor a 0';
            }
        }
        else if(i === 2 && valorInput === ""){ //En caso de que todas las listas desplegables esten inhabilitadas
            throw 'No se a seleccionado ningun equipo';
        }
    });

    return true;
}
/*#endregion*/







