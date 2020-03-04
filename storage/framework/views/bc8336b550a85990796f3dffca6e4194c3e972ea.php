<?php $__env->startSection('content'); ?>
    <br>
    <!-- Card - Panel/Inversor -->
    <div class="card">
        <div class="card-header"><img src="https://img.icons8.com/material-outlined/24/000000/lightning-bolt.png"> Cotizador de media tensión (Configuración)</div>
        <div class="card-body">
            <label>Seleccionar panel</label>
            <select class="form-control" id="">
                <option value="">1</option>
                <option value="">2</option>
                <option value="">3</option>
            </select>
            <label>Seleccionar marca del inversor</label>
            <select class="form-control" id="">
                <option value="">1</option>
                <option value="">2</option>
                <option value="">3</option>
            </select>
        </div>
    </div><br>
    <!-- Card - GDMTO/GDMTH -->
    <div class="card">
        <div class="card-header">
            <label style="font-size:18px;"><img src="https://img.icons8.com/ios-filled/24/000000/light-automation.png">  Datos de Consumo</label>
            <div class="btn-group btn-group-toggle pull-right">
                <label class="btn btn-secondary active">
                    <input type="radio" name="optConsumptionA" checked>GDMTO
                </label>
                <label class="btn btn-secondary">
                    <input type="radio" name="optConsumptionB">GDMTH
                </label>
            </div>
        </div>
        <div class="card-body" >
            <div class="tab-content">
                <div class="tab pane fade active show" id="GDMTO" role="tabpanel">
                    <h1>GDMTO</h1>
                </div>
                <div class="tab-pane" id="GDMTH" role="tabpanel">
                    <h1>GDMTH</h1>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\EteslaPanelesSolares\resources\views/mediaTension.blade.php ENDPATH**/ ?>