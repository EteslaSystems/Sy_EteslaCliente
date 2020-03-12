<!DOCTYPE>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Etesla Paneles Solares - <?php $__env->startSection('title'); ?><?php echo $__env->yieldSection(); ?></title>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <?php echo $__env->yieldContent('body'); ?>
    </div>
    <?php if(Session::has('message')): ?>
        <?php echo Session::get('message'); ?>

    <?php endif; ?>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/index.js"></script>
<script src="js/log.js"></script>
</html>
<?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/template/head.blade.php ENDPATH**/ ?>