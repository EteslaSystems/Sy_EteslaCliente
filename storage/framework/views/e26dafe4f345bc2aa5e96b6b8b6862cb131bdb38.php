<!DOCTYPE>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/index.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/alert-bootstrap.css')); ?>">
    <script type="text/javascript" src="http://api.geonames.org/export/geonamesData.js?username=urakirabe"></script>
    <title>Etesla Paneles Solares - <?php $__env->startSection('title'); ?><?php echo $__env->yieldSection(); ?></title>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <?php if(session('status-success')): ?>
                    <div class="alert alert-success alert-dismissible fade show myAlert" role="alert">
                        <strong>¡Correcto!</strong> <?php echo e(session('status-success')); ?>


                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php elseif(session('status-fail')): ?>
                    <div class="alert alert-danger alert-dismissible fade show myAlert" role="alert">
                        <strong>¡Error!</strong> <?php echo e(session('status-fail')); ?>


                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <?php echo $__env->yieldContent('body'); ?>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="<?php echo e(asset('js/alert-bootstrap.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/index.js')); ?>"></script> <!-- Este archivo es necesario para el CP y buscador -->
<script src="<?php echo e(asset('js/log.js')); ?>"></script>
<!--script src="<?php echo e(asset('js/cotizador/mediaTension/mediaTension.js')); ?>"></script-->
<script src="<?php echo e(asset('js/cotizador/mediaTension/GDMTH.js')); ?>"></script>
<script src="<?php echo e(asset('js/cotizador/mediaTension/GDMTO.js')); ?>"></script>
<script src="<?php echo e(asset('js/cotizador/mediaTension/individual.js')); ?>"></script>
<script src="<?php echo e(asset('js/cotizador/bajaTension.js')); ?>"></script>

<script type="text/javascript">
    window.onload = function() {
        myAlert();
    };

    $(document).ready(function(){
        var height = $(window).height();
        $('#full-screen').height(height);

        $("#vmasbtn").click(function(){
            $("#vmas").hide();
        });

        $("#vmenosbtn").click(function(){
            setTimeout(function() {
                $("#vmas").show();
            }, 175);
        });
    });
</script>

<?php echo $__env->yieldContent('scripts'); ?>
</html><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/template/head.blade.php ENDPATH**/ ?>