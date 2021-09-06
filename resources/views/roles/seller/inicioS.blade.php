@extends('roles/seller')
@section('inicioS')
    <br>
    <div class="row justify-content-md-center">
        <div class="card" style="width: 60rem;">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <img src="{{ asset('img/billeteDolar.png') }}" width="400px" height="200px">
                    </div>
                    <div class="hr-vertical"></div>
                    <div class="col">
                        <div class="form-group">
                            <label><strong>Precio dolar</strong></label>
                            <p>${{ $precioDolar -> precioDolar }} MXN</p>
                        </div>
                        <div class="form-group">
                            <label><strong>Ultima actualizacion</strong></label>
                            <p>{{ $precioDolar -> fechaUpdate }}</p>
                        </div>
                        <div class="form-group">
                            <label><strong>Fuente web</strong></label><br>
                            <a href="{{ $precioDolar -> fuente }}">{{ $precioDolar -> fuente }}</a>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
@endsection