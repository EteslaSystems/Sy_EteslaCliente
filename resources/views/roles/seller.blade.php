@extends('template/body')
<!-- Aqui va la ruta que redirecciona al nicio del Rol #Seller# -->
@section('title')
    {{'Vendedor'}}
@stop
@section('rutaInicioUser')
    {{'/s'}}
@stop
@section('sidebar')
    <a href="#cotizadorSubmenu" data-toggle="collapse" aria-expanded="false" class="list-group-item list-group-item-action bg-light dropdown-toggle"><img src="https://img.icons8.com/plasticine/30/000000/calculator.png"> Cotizador</a>
    <ul class="collapse list-unstyled" id="cotizadorSubmenu">
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
    <a href="#clientesSubmenu" data-toggle="collapse" aria-expanded="false" class="list-group-item list-group-item-action bg-light dropdown-toggle"><img src="https://img.icons8.com/dusk/30/000000/customer-insight.png"> Clientes</a>
    <ul class="collapse list-unstyled" id="clientesSubmenu">
        <li>
            <a class="list-group-item list-group-item-action bg-ligth" href="/clientes">Clientes</a>
        </li>
    </ul>
@stop
@section('content')
    <!-- Aqui va el contenido del DOM - Vista: 'inicioS' -->
    @yield('inicioS')
@endsection