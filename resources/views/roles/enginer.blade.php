@extends('template/body')
@section('title')
    {{'Ingeniero'}}
@stop
<!-- Aqui va la ruta que redirecciona al nicio del Rol #Seller# -->
@section('rutaInicioUser')
    {{'/e'}}
@stop
@section('sidebar')
    <a href="/levantamiento" aria-expanded="false" class="list-group-item list-group-item-action bg-light"><img src="https://img.icons8.com/cotton/25/000000/document-1.png"> Levantamiento</a>
    <a href="/instalacion" aria-expanded="false" class="list-group-item list-group-item-action bg-light"><img src="https://img.icons8.com/dusk/30/000000/swiss-army-knife.png"> Instalaciones</a>
    <a href="configuracion" aria-expanded="false" class="list-group-item list-group-item-action bg-light"><img src="https://img.icons8.com/ios-filled/30/000000/strategy-board.png"> Configuración</a>
    <a href="#" data-toggle="collapse" aria-expanded="false" class="list-group-item list-group-item-action bg-light"><img src="https://img.icons8.com/bubbles/40/000000/ticket.png"> Tickets</a>
@stop
@section('content')
	<div id="page-content-wrapper">
		<div class="container-fluid">
		    <br>
		    @yield('enginerContent')
		</div>
	</div>
@endsection

