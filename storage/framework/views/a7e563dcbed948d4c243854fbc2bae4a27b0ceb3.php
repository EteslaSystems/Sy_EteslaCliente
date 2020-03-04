<?php $__env->startSection('formgroup-1'); ?>
    <div class="form-group row">
        <label for="VMOCMaterialF" class="col-sm-6 col-form-label">VMOC</label>
        <div class="col-sm-10">
            <div class="input-group mb-2">
                <input type="text" class="form-control" id="VMOCMaterialF" placeholder="VMOC">
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formgroup-2'); ?>
    <div class="form-group row">
        <label for="PMINMaterialF" class="col-sm-6 col-form-label">PMIN</label>
        <div class="col-sm-10">
            <div class="input-group mb-2">
                <input type="text" class="form-control" id="PMINMaterialF" placeholder="PMIN">
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formgroup-3'); ?>
    <div class="form-group row">
        <label for="VMINMaterialF" class="col-sm-6 col-form-label">VMIN</label>
        <div class="col-sm-10">
            <div class="input-group mb-2">
                <input type="text" class="form-control" id="VMINMaterialF" placeholder="VMIN">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="PMAXMaterialF" class="col-sm-6 col-form-label">PMAX</label>
        <div class="col-sm-10">
            <div class="input-group mb-2">
                <input type="text" class="form-control" id="PMAXMaterialF" placeholder="PMAX">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success pull-right" title="guardar">Guardar</button>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('tablaMaterialFotovoltaico'); ?>
    <div class="table-responsive-sm">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Potencia</th>
                    <th>ISC</th>
                    <th>PRECIO</th>
                    <th>VMIN</th>
                    <th>VMAX</th>
                    <th>PMIN</th>
                    <th>PMAX</th>
                    <th style="text-align:center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>1</th>
                    <td>Inversor Fronius IG V Plus 3.0-1 UNI</td>
                    <td>Fronius</td>
                    <td>3000</td>
                    <td>14</td>
                    <td>1157.86</td>
                    <td>230</td>
                    <td>600</td>
                    <td>2500</td>
                    <td>3450</td>
                    <td>
                        <button id="btnEdit" class="btn btn-lg btn-warning" title="editar"><img src="https://img.icons8.com/material-outlined/18/000000/multi-edit.png"></button>
                    </td>
                    <td>
                        <button id="btnExc" class="btn btn-lg btn-danger" title="eliminar"><img src="https://img.icons8.com/material-outlined/18/000000/delete-trash.png"></button>
                    </td>
                </tr>
                <tr>
                    <th>2</th>
                    <td>Inversor Fronius IG Plus V 3.8-1 UNI</td>
                    <td>Fronius</td>
                    <td>3800</td>
                    <td>17.8</td>
                    <td>1363.26</td>
                    <td>230</td>
                    <td>600</td>
                    <td>3200</td>
                    <td>4400</td>
                    <td>
                        <button class="btn btn-lg btn-warning" title="editar"><img src="https://img.icons8.com/material-outlined/18/000000/multi-edit.png"></button>
                    </td>
                    <td>
                        <button class="btn btn-lg btn-danger" title="eliminar"><img src="https://img.icons8.com/material-outlined/18/000000/delete-trash.png"></button>
                    </td>
                </tr>
                <tr>
                    <th>3</th>
                    <td>Inversor Fronius IG Plus V 5.0-1 UNI</td>
                    <td>Fronius</td>
                    <td>5000</td>
                    <td>23.4</td>
                    <td>1820.71</td>
                    <td>230</td>
                    <td>600</td>
                    <td>4250</td>
                    <td>5750</td>
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
<?php echo $__env->make('template/materialFotovoltaico', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\EteslaPanelesSolares\resources\views/roles/admin/inversores.blade.php ENDPATH**/ ?>