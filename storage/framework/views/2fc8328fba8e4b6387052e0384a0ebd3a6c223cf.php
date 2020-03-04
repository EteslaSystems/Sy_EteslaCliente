<?php $__env->startSection('content'); ?>
    <?php $__env->startSection('agregarClientes'); ?>
    <?php echo $__env->yieldSection(); ?>
    <div class="table-responsive-sm">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>C.P.</th>
                    <th>Dirección</th>
                    <th>Telefono</th>
                    <th>Celular</th>
                    <th>Email</th>
                    <th style="text-align:center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>1</th>
                    <td>Jonathan Vazquez</td>
                    <td>50130</td>
                    <td>Horacio Zuñiga, Toluca-México</td>
                    <td>(721) 312-3213</td>
                    <td>(231) 231-3231</td>
                    <td>xjonatan1@hotmail.com</td>
                    <td>
                        <button id="btnEdit" class="btn btn-lg btn-warning" title="editar"><img src="https://img.icons8.com/material-outlined/18/000000/multi-edit.png"></button>
                    </td>
                    <td>
                        <button id="btnExc" class="btn btn-lg btn-danger" title="eliminar"><img src="https://img.icons8.com/material-outlined/18/000000/delete-trash.png"></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\EteslaPanelesSolares\resources\views/template/clientes.blade.php ENDPATH**/ ?>