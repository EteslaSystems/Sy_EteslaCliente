<?php $__env->startSection('content'); ?>
    <?php $__env->startSection('agregarClientes'); ?>
    <?php echo $__env->yieldSection(); ?>
    <style>
        body {
            font-family: Helvetica;
        }
        button[aria-expanded=true] .fa-plus {
            display: none;
        }
        button[aria-expanded=false] .fa-minus {
            display: none;
        }
        .btn-link {
            text-decoration : none !important;
            color: #FFF;
        }
        .btn-link:hover {
            text-decoration : none !important;
            color: #DDD;
        }
        .card-header {
            background: rgba(0, 0, 0, 0.35);
        }
        thead {
            background: rgba(0, 0, 0, 0.20);
        }
        tbody .th-1 {
            width: 5%;
        }
        tbody .th-2 {
            width: 40%;
        }
        tbody .td-1 {
            width: 55%;
            text-align: left;
        }
        tbody .td-2 {
            width: 10%;
            background: rgba(0, 0, 0, 0.20);
        }
        tbody .td-3 {
            width: 60%;
        }
        tbody .td-4 {
            width: 30%;
        }
        .centered {
            display: flex;
        }
        .centered div {
            margin: auto auto;
        }
        .centered table {
            margin: auto auto;
        }
        .centered small {
            font-size: 10px;
        }
        .transform {
            background: rgba(0, 0, 0, 0.35);
        }

        .table-image td, th {
                vertical-align: middle;
        }
    </style>

    <div class="table-responsive-sm">
        <table class="table table-image">
            <thead>
                <tr>
                    <th class="text-center">Nombre del cliente</th>
                    <th class="text-center">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $consultarClientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <!-- Fila-Encabezado acordeon -->
                    <tr data-toggle="collapse" data-target="#demo1" data-parent="#myTable">
                        <td class="td-3 text-left">
                            <i class="fa fa-user-o"></i><a href="#" title="Visualizar info. del cliente" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><?php echo e($cliente->vNombrePersona); ?> <?php echo e($cliente->vPrimerApellido); ?> <?php echo e($cliente->vSegundoApellido); ?></a>
                        </td>
                        <td class="td-4 text-center">
                            <button type="button" class="btn btn-outline-info btn-sm" title="Editar">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger btn-sm" title="Eliminar">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                    <!-- Contenido del acordion -->
                    <tr id="demo1" class="collapse">
                        <td colspan="6" class="hiddenRow">
                            <div>Demo1</div>
                        </td>
                    </tr>
                    <!-- Fin-Contenido -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <h1>No cuenta con clientes registrados!</h1>
                <?php endif; ?>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <h1>Some text about client</h1>
                </div>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('roles/seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/template/clientes.blade.php ENDPATH**/ ?>