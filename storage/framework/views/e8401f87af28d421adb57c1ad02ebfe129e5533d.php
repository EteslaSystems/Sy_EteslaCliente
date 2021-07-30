<?php $__env->startSection('content'); ?>
<style type="text/css">
    .my-scrollbar{
        position: relative;
        height: 200px;
        overflow: auto;
    }

    .table-wrapper-scroll-y{
        display: block;
    }

    .tableScrollXY thead tr th{
        position: sticky;
        top: 0;
        z-index: 10;
    }

    .separador{
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        border-top: 1px solid rgba(0, 0, 0, 0.1);
    }
</style>
<div class="container-fluid">
    <br>
<!-- Filtros - EquiposFotovoltaicos -->
    <div class="row">
        <div class="col-sm-6">
            <div id="PanelAdminEquipFot" class="card">
                <div class="card-body">
                    <form class="form-inline">
                        <div class="form-group">
                            <label for="ddlTipoEquipo">Tipo de equipo</label>
                            <select id="ddlTipoEquipo" class="form-control form-control-sm">
                                <option value="-1" selected>Elige una opcion</option>
                                <option value="panel">Panel</option>
                                <option value="inversor">Inversor</option>
                                <option value="estructura">Estructura</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ddlMarcaEquipo">Marca</label>
                            <select id="ddlMarcaEquipo" class="form-control form-control-sm">
                                <option value="-1" selected>Elige una opcion</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- Paneles -->
    <div class="row">
        <div class="col">
            <button id="addPanel" type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target=".modal-paneles">+</button>
        </div>
        <div class="col">
            <h3 align="right">Paneles</h3>
        </div>
        <!-- Modal agregar/editar Panel -->
        <div id="modalPanel" class="modal fade modal-paneles" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title col-11 text-center">Paneles</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body container">
                        <form method="POST" action="<?php echo e(url('agregar-panel')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <div class="row justify-content-center">
                                <div class="form-group">
                                    <label for="nombrePanel">Nombre</label>
                                    <input id="nombrePanel" name="p_nombrematerial" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="marcaPanel">Marca</label>
                                    <input id="marcaPanel" name="p_marca" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="potenciaPanel">Potencia</label>
                                    <input id="potenciaPanel" name="p_potencia" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="precioPanel">Precio</label>
                                    <input id="precioPanel" name="p_precio" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="garantiaPanel">Garantia</label>
                                    <input id="garantiaPanel" name="p_garantia" type="number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="origenPanel">Origen</label>
                                    <input id="origenPanel" name="p_origen" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="iscPanel">ISC</label>
                                    <input id="iscPanel" name="p_isc" type="number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="vocPanel">VOC</label>
                                    <input id="vocPanel" name="p_voc" type="number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="vmpPanel">VMP</label>
                                    <input id="vmpPanel" name="p_vmp" type="number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="imgPanel">Ruta imagen</label>
                                    <input id="imgPanel" name="p_imgRuta" class="form-control">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary pull-right">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="separador">
    <div class="table-wrapper-scroll-y my-scrollbar">
        <table class="table table-bordered table-striped table-sm tableScrollXY">
            <thead class="thead-dark" align="center">
                <tr>
                    <th scope="col">Marca</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Potencia</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Garantia</th>
                    <th scope="col">Origen</th>
                    <th scope="col">ISC</th>
                    <th scope="col">VOC</th>
                    <th scope="col">VMP</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $paneles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $panel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($panel->vMarca); ?></td>
                        <td><?php echo e($panel->vNombreMaterialFot); ?></td>
                        <td><?php echo e($panel->fPotencia); ?> W</td>
                        <td>$ <?php echo e($panel->fPrecio); ?> USD</td>
                        <td><?php echo e($panel->vGarantia); ?> años</td>
                        <td><?php echo e($panel->vOrigen); ?></td>
                        <td><?php echo e($panel->fISC); ?></td>
                        <td><?php echo e($panel->fVOC); ?></td>
                        <td><?php echo e($panel->fVMP); ?></td>
                        <td>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-sm btn-warning" onclick='editarPanel("<?php echo e($panel->idPanel); ?>")' title="Editar"><img src="https://img.icons8.com/ios/20/000000/edit--v1.png"/></button>
                                <a href="<?php echo e(url('eliminar-panel',$panel->idPanel)); ?>" title="Eliminar"><span class="btn btn-danger btn-sm"><img src="https://img.icons8.com/ios/20/000000/delete-forever--v1.png"/></span></a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <h1>Sin registros</h1>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <br>

<!-- Inversores -->
    <div class="row">
        <div class="col">
            <button id="addInversor" type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target=".modal-inversores">+</button>
        </div>
        <div class="col">
            <h3 align="right">Inversores</h3>
        </div>
        <!-- Modal agregar Inversor -->
        <div id="modalInversor" class="modal fade modal-inversores" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title col-11 text-center">Inversores</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="<?php echo e(url('agregar-inversor')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <div class="row justify-content-center">
                                <div class="form-group">
                                    <label for="tipoInversor">Tipo inversor</label>
                                    <select id="tipoInversor" name="sctTipoInversor" class="form-control" onchange="selectTipoInversor();">
                                        <option value="-1" selected>Elige una opcion</option>
                                        <option value="MicroInversor">MicroInversor</option>
                                        <option value="Inversor">Inversor</option>
                                    </select>
                                </div>
                                <!-- NOTA: Este apartado de controles solo se mostrara cuando se agregue un *MICROINVERSOR* -->
                                <div id="contenedorPaneleSoportados" class="form-group" style="display:none;">
                                    <label for="noPanelesSoportados">Paneles Soportados</label>
                                    <input id="noPanelesSoportados" name="i_paneleSoportados" class="form-control" type="number">
                                </div>
                                <!-- FIN NOTA -->
                                <div class="form-group">
                                    <label for="nombreInversor">Nombre</label>
                                    <input id="nombreInversor" name="i_nombrematerial" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="marcaInversor">Marca</label>
                                    <input id="marcaInversor" name="i_marca" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="potenciaInversor">Potencia</label>
                                    <input id="potenciaInversor" name="i_potencia" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="precioInversor">Precio</label>
                                    <input id="precioInversor" name="i_precio" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="garantiaInversor">Garantia</label>
                                    <input id="garantiaInversor" name="i_garantia" type="number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="origenInversor">Origen</label>
                                    <input id="origenInversor" name="i_origen" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="iscInversor">ISC</label>
                                    <input id="iscInversor" name="i_isc" type="number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="vminInversor">VMIN</label>
                                    <input id="vminInversor" name="i_vmin" type="number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="vmaxInversor">VMAX</label>
                                    <input id="vmaxInversor" name="i_vmax" type="number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="pminInversor">PMIN</label>
                                    <input id="pminInversor" name="i_pmin" type="number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="pmaxInversor">PMAX</label>
                                    <input id="pmaxInversor" name="i_pmax" type="number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="imgInversor">Ruta imagen</label>
                                    <input id="imgInversor" name="i_imgRuta" class="form-control">
                                </div>
                            </div>
                            <button id="btnGuardarInversor" type="submit" class="btn btn-sm btn-primary pull-right" style="display: none;">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="separador">
    <div class="table-wrapper-scroll-y my-scrollbar">
        <table class="table table-bordered table-striped table-sm tableScrollXY">
            <thead class="thead-dark" align="center">
                <tr>
                    <th scope="col">Marca</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Potencia</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Garantia</th>
                    <th scope="col">Origen</th>
                    <th scope="col">PMIN</th>
                    <th scope="col">PMAX</th>
                    <th scope="col">VMIN</th>
                    <th scope="col">VMAX</th>
                    <th scope="col">ISC</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $inversores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inversor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($inversor->vMarca); ?></td>
                        <td><?php echo e($inversor->vNombreMaterialFot); ?></td>
                        <td><?php echo e($inversor->fPotencia); ?> W</td>
                        <td>$ <?php echo e($inversor->fPrecio); ?> USD</td>
                        <td><?php echo e($inversor->vGarantia); ?> años</td>
                        <td><?php echo e($inversor->vOrigen); ?></td>
                        <td><?php echo e($inversor->iPMIN); ?></td>
                        <td><?php echo e($inversor->iPMAX); ?></td>
                        <td><?php echo e($inversor->iVMIN); ?></td>
                        <td><?php echo e($inversor->iVMAX); ?></td>
                        <td><?php echo e($inversor->fISC); ?></td>
                        <td>
                            <div class="btn-group" role="group">
                                <button id="btnEditarInversor" type="button" onclick='editarInversor("<?php echo e($inversor->idInversor); ?>")' class="btn btn-sm btn-warning" title="Editar"><img src="https://img.icons8.com/ios/20/000000/edit--v1.png"/></button>
                                <a href="<?php echo e(url('eliminar-inversor',$inversor->idInversor)); ?>" title="Eliminar"><span class="btn btn-danger btn-sm"><img src="https://img.icons8.com/ios/20/000000/delete-forever--v1.png"/></span></a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <h1>Sin registros</h1>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <br>

<!-- Estructuras -->
    <div class="row">
        <div class="col">
            <button id="addEstructura" type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target=".modal-estructuras">+</button>
        </div>
        <div class="col">
            <h3 align="right">Estructuras</h3>
        </div>
        <!-- Modal agregar Estructura -->
        <div id="modalEstructura" class="modal fade modal-estructuras" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title col-11 text-center">Estructuras</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="<?php echo e(url('agregar-estructura')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <div class="row justify-content-center">
                                <div class="form-group">
                                    <label for="nombreEstructura">Nombre</label>
                                    <input id="nombreEstructura" name="p_nombrematerial" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="marcaEstructura">Marca</label>
                                    <input id="marcaEstructura" name="p_marca" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="precioEstructura">Precio</label>
                                    <input id="precioEstructura" name="p_precio" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="garantiaEstructura">Garantia</label>
                                    <input id="garantiaEstructura" name="p_garantia" type="number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="origenEstructura">Origen</label>
                                    <input id="origenEstructura" name="p_origen" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="imgEstructura">Ruta imagen</label>
                                    <input id="imgEstructura" name="p_imgRuta" class="form-control">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary pull-right">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="separador">
    <div class="table-wrapper-scroll-y my-scrollbar">
        <table class="table table-bordered table-striped table-sm tableScrollXY">
            <thead class="thead-dark" align="center">
                <tr>
                    <th scope="col">Marca</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Garantia</th>
                    <th scope="col">Origen</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $estructuras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estructura): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($estructura->vMarca); ?></td>
                        <td><?php echo e($estructura->vNombreMaterialFot); ?></td>
                        <td>$ <?php echo e($estructura->fPrecio); ?> USD</td>
                        <td><?php echo e($estructura->vGarantia); ?> años</td>
                        <td><?php echo e($estructura->vOrigen); ?></td>
                        <td>
                            <div class="btn-group" role="group">
                                <button id="btnEditarEstructura" type="button" onclick='editarEstructura("<?php echo e($estructura->idEstructura); ?>")' class="btn btn-sm btn-warning" title="Editar"><img src="https://img.icons8.com/ios/20/000000/edit--v1.png"/></button>
                                <a href="<?php echo e(url('eliminar-estructura',$estructura->idEstructura)); ?>" title="Eliminar"><span class="btn btn-danger btn-sm"><img src="https://img.icons8.com/ios/20/000000/delete-forever--v1.png"/></span></a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <h1>Sin registros</h1>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
    /*#section Panel*/
    function editarPanel(idPanel){
        new Promise((resolve, reject) => {
            $.ajax({
                type: "GET",
                url: "/",
                traditional: true,
                data: idPanel,
                succes: function(panelFiltrado){
                    if(panelFiltrado.status === 200){

                    }
                    else{
                        alert('Al parecer surgio un error al consultar info. del Panel seleccionado');
                    }
                }
            });
        });

        //Abrir modal
        $('#modalPanel').modal('show');
    }
    /*#endsection*/
    /*#section Inversor*/
    function selectTipoInversor(){
        let tipoInversorSeleccionado = $('#tipoInversor').val();

        if(tipoInversorSeleccionado != "-1"){
            if(tipoInversorSeleccionado === 'Inversor'){ ///Inversor central
                $('#contenedorPaneleSoportados').css('display','none');
            }
            else{ ///Microinversor
                $('#contenedorPaneleSoportados').css('display','');
            }

            $('#btnGuardarInversor').css('display','');
        }
        else{
            $('#contenedorPaneleSoportados').css('display','none');
            $('#btnGuardarInversor').css('display','none');
        }
    }

    function editarInversor(idInversor){
        new Promise((resolve, reject) => {
            $.ajax({
                type: "GET",
                url: "/",
                traditional: true,
                data: idInversor,
                succes: function(inversorFiltrado){
                    if(inversorFiltrado.status === 200){

                    }
                    else{
                        alert('Al parecer surgio un error al consultar info. del Inversor seleccionado');
                    }
                }
            });
        });



        //Abrir modal
        $('#modalInversor').modal('show');
    }
    /*#endsection*/
    /*#section Estructura*/
    async function editarEstructura(idEstructura){
        let estructuraFiltrada = await filtrarEstructura(idEstructura);

        //Abrir modal
        // $('#modalEstructura').modal('show');
    }

    function filtrarEstructura(idEstruct){
        return new Promise((resolve, reject) => {
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                type: "GET",
                url: `/editar-estructura/${idEstruct}`,
                succes: function(estructuraFiltrada){
                    console.log(estructuraFiltrada);

                    if(estructuraFiltrada.status === 200){
                        console.log(estructuraFiltrada);
                    }
                    else{
                        alert('Al parecer surgio un error al consultar info. de la Estructura seleccionada');
                        console.log(estructuraFiltrada.message);
                    }
                },
                error: function(error){
                    alert('Al parecer surgio un error al consultar info. de la Estructura seleccionada');
                    console.log(error.message);
                }
            });
        });
    }
    /*#endsection*/
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('roles/admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/roles/admin/materialFotovoltaico.blade.php ENDPATH**/ ?>