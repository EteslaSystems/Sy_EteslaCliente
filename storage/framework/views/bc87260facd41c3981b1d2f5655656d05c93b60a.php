<?php $__env->startSection('enginerContent'); ?>
	<?php echo $__env->make('roles.enginer.forms.form-new-category', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<hr>

	<div class="content">
        <div class="table-responsive-sm">
            <table class="table table-bordered table-hover table-sm text-center">
                <thead class="thead-dark ">
                    <tr>
                        <th style="width: 85%;">Categoría del material</th>
                        <th style="width: 15%;" colspan="3">Acciones</th>
                    </tr>
                </thead>

                <tbody>
					<?php $__currentLoopData = $vCategorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                		<tr>
                            <td><?php echo e($details->vNombreCategoOtrosMats); ?></td>
                            <td>
                                <a href="" class="btn btn-sm btn-info" title="Agregar">
                                    <img src="https://img.icons8.com/material-outlined/18/FFFFFF/plus-math.png"/>
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo e(url('editar-categoria', [$details->idCategOtrosMateriales])); ?>" class="btn btn-sm btn-warning" title="Editar">
                                    <img src="https://img.icons8.com/material-outlined/18/FFFFFF/multi-edit.png">
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo e(url('eliminar-categoria', [$details->idCategOtrosMateriales])); ?>" class="btn btn-sm btn-danger" title="Eliminar">
                                    <img src="https://img.icons8.com/material-outlined/18/FFFFFF/delete-trash.png">
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        <hr>

        <?php echo $__env->make('roles.enginer.forms.form-new-materials', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <br>

       <div class="row">
        	<div class="col-4">
	        	<form class="form-inline">
	        		<select class="form-control mr-sm-3" id="search">
	        			<option selected disabled>Selecciona una opción:</option>
	        			<option value="0">TODOS</option>

	        			<?php $__currentLoopData = $vCategorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	        					<option value="<?php echo e($details->idCategOtrosMateriales); ?>"><?php echo e($details->vNombreCategoOtrosMats); ?></option>
	        			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	        		</select>

	        		<button class="btn btn-outline-success my-3 my-sm-0" type="button" id="search-btn" disabled>Buscar</button>
	        	</form>
	        </div>
        </div>

        <br>

        <div class="table-responsive-sm">
            <table class="table table-bordered table-hover table-sm text-center">
                <thead class="thead-dark">
                    <tr>
                        <th style="width: 45%;">Partida</th>
                        <th style="width: 25%;">Categoría perteneciente</th>
                        <th style="width: 10%;">Unidad</th>
                        <th style="width: 10%;">Precio unitario</th>
                        <th style="width: 10%;" colspan="2">Acciones</th>
                    </tr>
                </thead>

                <tbody id="table-results">
                	<?php $__currentLoopData = $vMateriales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                		<tr id="<?php echo e($details->idCategOtrosMateriales); ?>">
                            <td><?php echo e($details->vPartida); ?></td>
                            <td><?php echo e($details->vNombreCategoOtrosMats); ?></td>
                            <td><?php echo e($details->vUnidad); ?></td>
                            <td>
                            	<b>$ <?php echo e($details->fPrecioUnitario); ?></b>
                            </td>
                            <td>
                                <a href="<?php echo e(url('editar-materiales', [$details->idOtrosMateriales])); ?>" class="btn btn-sm btn-warning" title="Editar">
                                    <img src="https://img.icons8.com/material-outlined/18/FFFFFF/multi-edit.png">
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo e(url('eliminar-materiales', [$details->idOtrosMateriales])); ?>" class="btn btn-sm btn-danger" title="Eliminar">
                                    <img src="https://img.icons8.com/material-outlined/18/FFFFFF/delete-trash.png">
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script type="text/javascript">
		// Función invocada mediante el checkbox, modifica valores/propiedades de inputs.
        $("#search").change(function () {
        	$("#search option:selected").each(function () {
        		$("#search-btn").removeAttr("disabled", "disabled");
        	});
        });

        $("#search-btn").click(function () {
        	var searching = $("#search").val();

        	if(searching == 0) {
        		$("#table-results tr").css("display", "");
        	} else {
        		$("#table-results tr").css("display", "none");
        		$("#table-results #" + searching).css("display", "");
        	}
        });
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('roles/enginer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/roles/enginer/otrosmateriales.blade.php ENDPATH**/ ?>