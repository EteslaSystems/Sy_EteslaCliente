<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/alert-bootstrap.css') }}">
    @yield('links')
    <title>Etesla Paneles Solares - @section('title')@show</title>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                @if (session('status-success'))
                    <div class="alert alert-success alert-dismissible fade show myAlert" role="alert">
                        <strong>¡Correcto!</strong> {{ session('status-success') }}

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @elseif (session('status-fail'))
                    <div class="alert alert-danger alert-dismissible fade show myAlert" role="alert">
                        <strong>¡Error!</strong> {{ session('status-fail') }}

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
        </div>

        @yield('body')
    </div>

    <!-- Loading Spinner -->
    <div class="loading-spinner"></div>
    <!-- Fin Loading Spinner -->
</body>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<script src="{{ asset('js/alert-bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/index.js') }}"></script> <!-- Este archivo es necesario para el CP y buscador -->
<script src="{{ asset('js/log.js') }}"></script>
<script src="{{ asset('js/cotizador/bajaTension/bajaTension.js') }}"></script>
<script src="{{ asset('js/cotizador/individual/individual.js') }}"></script>

<!-- En mantenimiento -->
<script src="{{ asset('js/cotizador/mediaTension/mediaTension.js') }}"></script>
<script src="{{ asset('js/cotizador/cotizador.js') }}"></script>
<script src="{{ asset('js/cotizador/clientes.js') }}"></script>
<!-- En mantenimiento -->

@yield('scripts')

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
</html>