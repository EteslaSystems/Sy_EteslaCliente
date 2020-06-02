@extends('template/body')
<!-- Aqui va la ruta que redirecciona al nicio del Rol #Operations# -->
@section('rutaInicioUser')
    {{'/o'}}
@stop
@section('sidebar')
	<a href="#cotizadorSubmenu1" data-toggle="collapse" aria-expanded="false" class="list-group-item list-group-item-action bg-light dropdown-toggle"><img src="https://img.icons8.com/plasticine/30/000000/calculator.png"> Cotizador</a>
	<ul class="collapse list-unstyled" id="cotizadorSubmenu1">
	    <li>
	        <a class="list-group-item list-group-item-action bg-ligth" href="/mediaTension">Media tensión</a>
	    </li>
	    <li>
	        <a class="list-group-item list-group-item-action bg-ligth" href="/bajaTension">Baja tensión</a>
	    </li>
	    <li>
	        <a class="list-group-item list-group-item-action bg-ligth" href="/individual">Individual</a>
	    </li>
	</ul>
    	<a href="#cotizadorSubmenu" data-toggle="collapse" aria-expanded="false" class="list-group-item list-group-item-action bg-light dropdown-toggle"><img src="https://img.icons8.com/plasticine/30/000000/gears.png"> Operaciones</a>
    	<ul class="collapse list-unstyled" id="cotizadorSubmenu">
    		<li>
    			<a class="list-group-item list-group-item-action bg-ligth" href="#">Pendientes</a>
    		</li>
    	</ul>
@stop
@section('')
@endsection