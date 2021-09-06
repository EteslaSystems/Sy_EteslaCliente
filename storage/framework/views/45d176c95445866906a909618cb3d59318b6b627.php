<!DOCTYPE>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/register.css">
        <link rel="stylesheet" href="<?php echo e(asset('css/alert-bootstrap.css')); ?>">
        <title>Etesla Paneles Solares - <?php $__env->startSection('titleAuth'); ?><?php echo $__env->yieldSection(); ?></title>
    </head>
    <body>
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

        <?php echo $__env->yieldContent('bodyLog'); ?>
    </body>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <!--==========================================================================================================-->
    <script src="js/log.js"></script>
    <script src="<?php echo e(asset('js/alert-bootstrap.js')); ?>" type="text/javascript"></script>
    <script type="text/javascript">
        window.onload = function() {
            myAlert();

            ///
            sessionStorage.removeItem("tarifaMT");
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
</html>
<?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/authentication/templateAuth.blade.php ENDPATH**/ ?>