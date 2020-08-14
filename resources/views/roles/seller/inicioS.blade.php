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
                        @foreach($precioDolar as $precioDolars)
                            <div class="form-group">
                                <label><strong>Precio dolar</strong></label>
                                <p>${{ $precioDolars -> precioDolar }} MXN</p>
                            </div>
                            <div class="form-group">
                                <label><strong>Ultima actualizacion</strong></label>
                                <p>{{ $precioDolars -> fechaUpdate }}</p>
                            </div>
                            <div class="form-group">
                                <label><strong>Fuente web</strong></label><br>
                                <a href="{{ $precioDolars -> fuente }}">{{ $precioDolars -> fuente }}</a>
                            </div>
                        @endforeach
                    </div>  
                </div>
            </div>
        </div>
    </div>
@endsection