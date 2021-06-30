@extends('roles/seller')
@section('content')
@section('agregarClientes')
@show
    <div class="container-fluid">
        @if(@isset($consultarClientes))
            @unless($consultarClientes)
                <h1>No cuenta con clientes registrados!</h1>
            @else
                {{ $consultarClientes->links() }}
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col" style="text-align:center;">Cliente</th>
                            <th scope="col" style="text-align:center;">Direccion</th>
                            <th scope="col" style="text-align:center;">Cant. Propuestas</th>
                            <th scope="col" style="text-align:center;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($consultarClientes as $cliente)
                            <tr>
                                <td>{{ $cliente->vNombrePersona }} {{ $cliente->vPrimerApellido }} {{ $cliente->vSegundoApellido }}</td>
                                <td>{{ $cliente->vCalle }} {{ $cliente->vMunicipio }} {{ $cliente->vEstado }}</td>
                                <td>\</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button id="btnEditar" type="button" class="btn btn-primary btn-sm" title="Editar" data-toggle="modal" data-target="#modalEditClient"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style="fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M132.92788,1.65385c-3.92788,-0.02584 -7.77824,1.36959 -10.75,4.34135l-6.61538,6.82212l43.62019,43.82692l6.61538,-6.82212c5.96935,-5.96935 6.02103,-15.65985 0,-21.70673l-21.91346,-21.91346c-3.02344,-3.02344 -7.02885,-4.52224 -10.95673,-4.54808zM108.12019,18.8125l-10.33654,9.92308l45.48077,45.48077l10.54327,-9.71635zM91.16827,35.97115l-71.52885,70.90865c-1.65385,0.85276 -2.84254,2.35156 -3.30769,4.13462l-15.29808,51.88942c-0.69772,2.27404 -0.07753,4.78065 1.60217,6.46034c1.67969,1.67969 4.18629,2.29988 6.46033,1.60216l51.88942,-15.29808c2.40324,-0.36178 4.39303,-2.04147 5.16827,-4.34135l70.49519,-69.875l-9.71635,-9.71635l-72.35577,72.5625l-29.14904,8.47596l-6.20192,-6.20192l8.88942,-30.38942l71.73558,-71.52885zM106.87981,51.88942l-72.5625,72.76923l10.54327,2.27404l1.44712,9.71635l72.76923,-72.5625z"></path></g></g></svg></button>
                                        <button id="btnEliminar" type="button" class="btn btn-danger btn-sm" title="Eliminar"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M75.25,21.5c-6.22962,0 -10.75,4.52038 -10.75,10.75v5.375h-32.25v10.75h5.375v86c0,8.89025 7.23475,16.125 16.125,16.125h52.52173l10.75,-10.75h-63.27173c-2.96162,0 -5.375,-2.408 -5.375,-5.375v-86h75.25v51.98633l10.75,10.75v-62.73633h5.375v-10.75h-32.25v-5.375c0,-6.22962 -4.52038,-10.75 -10.75,-10.75zM75.25,32.25h21.5v5.375h-21.5zM59.125,64.5v59.125h10.75v-59.125zM80.625,64.5v59.125h10.75v-59.125zM102.125,64.5v40.16553l10.75,-10.75v-29.41553zM115.0271,106.9646l-7.5271,7.5271l24.99585,24.98535l-24.99585,24.99585l7.5271,7.5271l24.99585,-24.99585l24.44995,24.46045l7.5271,-7.5271l-24.46045,-24.46045l24.46045,-24.44995l-7.5271,-7.5271l-24.44995,24.46045z"></path></g></g></svg></button>
                                        <button id="btnPropuestas" type="button" class="btn btn-secondary btn-sm" title="Propuestas" data-toggle="modal" data-target="#modalPropstFromClient"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M136.16667,21.5h-100.33333c-7.91917,0 -14.33333,6.41417 -14.33333,14.33333v100.33333c0,7.91917 6.41417,14.33333 14.33333,14.33333h71.66667l43,-43v-71.66667c0,-7.91917 -6.41417,-14.33333 -14.33333,-14.33333zM136.16667,100.33333h-35.83333v35.83333h-64.5v-100.33333h100.33333z"></path></g></g></svg></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Modal - Editar Cliente -->
                <div id="modalEditClient" class="modal fade  bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog  modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Editar cliente:</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Modal body text goes here.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal - Propuestas Data -->
                <div id="modalPropstFromClient" class="modal fade  bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog  modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Propuestas</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Aqui vienen un listado de las propuestas</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endunless
        @endif
    </div>
@endsection
