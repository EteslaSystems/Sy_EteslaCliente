@extends('template/materialFotovoltaico')
@section('formgroup-1')
    <div class="form-group row">
        <label for="VMPMaterialF" class="col-sm-6 col-form-label">VMP</label>
        <div class="col-sm-10">
            <div class="input-group mb-2">
                <input type="text" class="form-control" id="VMPMaterialF" placeholder="VMP">
            </div>
        </div>
    </div>
@stop
@section('formgroup-3')
    <div class="form-group row">
        <label for="VOCMaterialF" class="col-sm-6 col-form-label">VOC</label>
        <div class="col-sm-10">
            <div class="input-group mb-2">
                <input type="text" class="form-control" id="VOCMaterialF" placeholder="VOC">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-6 col-form-label"></label>
        <div class="col-sm-10">
            <div class="input-group mb-2">
                <button type="submit" class="btn btn-success" title="guardar">Guardar</button>  
            </div>
        </div>
    </div>
@stop
@section('tablaMaterialFotovoltaico')
    <div class="table-responsive-sm">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Potencia</th>
                    <th>ISC</th>
                    <th>VOC</th>
                    <th>PRECIO</th>
                    <th>VMP</th>
                    <th style="text-align:center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>1</th>
                    <td>Canadian Policristalino 330 W</td>
                    <td>Canadian</td>
                    <td>330</td>
                    <td>9.44</td>
                    <td>46.1</td>
                    <td>0.33</td>
                    <td>38.6</td>
                    <td>
                        <button id="btnEdit" class="btn btn-lg btn-warning" title="editar"><img src="https://img.icons8.com/material-outlined/18/000000/multi-edit.png"></button>
                    </td>
                    <td>
                        <button id="btnExc" class="btn btn-lg btn-danger" title="eliminar"><img src="https://img.icons8.com/material-outlined/18/000000/delete-trash.png"></button>
                    </td>
                </tr>
                <tr>
                    <th>2</th>
                    <td>Canadian Policristalino 370 W</td>
                    <td>Canadian</td>
                    <td>370</td>
                    <td>9.51</td>
                    <td>46.6</td>
                    <td>0.34</td>
                    <td>39.2</td>
                    <td>
                        <button class="btn btn-lg btn-warning" title="editar"><img src="https://img.icons8.com/material-outlined/18/000000/multi-edit.png"></button>
                    </td>
                    <td>
                        <button class="btn btn-lg btn-danger" title="eliminar"><img src="https://img.icons8.com/material-outlined/18/000000/delete-trash.png"></button>
                    </td>
                </tr>
                <tr>
                    <th>3</th>
                    <td>Canadian Policristalino 410 W</td>
                    <td>Canadian</td>
                    <td>410</td>
                    <td>9.65</td>
                    <td>53.5</td>
                    <td>0.36</td>
                    <td>44.3</td>
                    <td>
                        <button id="btnEdit" class="btn btn-lg btn-warning" title="editar"><img src="https://img.icons8.com/material-outlined/18/000000/multi-edit.png"></button>
                    </td>
                    <td>
                        <button id="btnExc" class="btn btn-lg btn-danger" title="eliminar"><img src="https://img.icons8.com/material-outlined/18/000000/delete-trash.png"></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection