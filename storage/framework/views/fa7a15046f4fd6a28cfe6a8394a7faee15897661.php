<!DOCTYPE>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Etesla Paneles Solares - Cotizador</title>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading" align="center">ETESLA</div>
            <div class="list-group list-group-flush">
                <a href="#cotizadorSubmenu" data-toggle="collapse" aria-expanded="false" class="list-group-item list-group-item-action bg-light dropdown-toggle">Cotizador</a>
                <ul class="collapse list-unstyled" id="cotizadorSubmenu">
                    <li>
                        <a class="list-group-item list-group-item-action bg-ligth" href="/mediaTension">Media tensión</a>
                    </li>
                    <li>
                        <a class="list-group-item list-group-item-action bg-ligth" href="/bajaTension">Baja tensión</a>
                    </li>
                </ul>
                <a href="#" class="list-group-item list-group-item-action bg-light">Contenido 2</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Contenido 3</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Contenido 4</a>
            </div>
        </div> 
        <!-- Navbar -->   
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-dark border-bottom">
                <a id="menu-toggle" class="navbar-brand">
                    <img src="img/eTesla_logo.png" width="100" height="30">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" id="navOption" href="#">Inicio<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Other action</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- Contenido de la página-->
            <div class="container-fluid">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/index.js"></script>
</html><?php /**PATH C:\xampp\htdocs\EteslaPanelesSolares\resources\views/layout/head.blade.php ENDPATH**/ ?>