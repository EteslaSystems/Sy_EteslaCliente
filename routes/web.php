<?php

/* ---------- Cambios hechos ----------*/
//Usuario
Route::get('/login', 'usuarioController@index');
Route::post('/login', 'usuarioController@validarUsuario');
Route::post('/register', 'usuarioController@registrarUsuario');
Route::post('/register', 'usuarioController@registrarUsuario');
//Vendedor
Route::get('/s', 'vendedorController@index');
Route::get('/mediaTension', 'vendedorController@mediaTension');
Route::get('/bajaTension', 'vendedorController@bajaTension');
Route::get('/mclients', 'vendedorController@misClientes');
Route::get('/client', 'vendedorController@todosClientes');
Route::get('/logout', 'vendedorController@cerrarSesion');
//Cliente
Route::post('/mclients', 'clienteController@registrarCliente');
/* ---------- Cambios hechos ----------*/

Route::post('/enviarCorreo',['as' => 'enviarCorreo','uses'=>'MailController@welcomeMail']);

Route::get('/cor',function(){
    return view('mail/welcomeMail');
});

Route::get('/admin', function(){
    return view('roles/admin');
});

Route::get('/profile', function(){
    return view('template/profileUser');
});

Route::get('/404', function(){
    return view('template/404');
});

//Route::get('/client',function(){ return view('template/clientes'); });

//Route::get('/s','sellerController@precioDelDolar');

//Route::get('/s', function(){ return view('roles/seller/inicioS'); });

Route::get('/e', function(){
    return view('roles/enginer');
});

Route::get('/o', function(){
    return view('roles/operations');
});

/* --------------- User --------------- */
//Route::get('/login', function(){ return view('authentication/login'); });

Route::get('/register', function(){
    return view('authentication/register');
});

Route::get('/forgetPasswd', function(){
    return view('authentication/forgotPasswd');
});
/* --------------- User --------------- */

Route::get('/', function(){
    return view('index');
});

Route::get('/head',function(){
    return view('template/head');
});

//Route::get('/mediaTension', function(){ return view('roles/seller/cotizador/mediaTension'); });

//Route::get('/bajaTension', function(){ return view('roles/seller/cotizador/bajaTension'); });

Route::get('/paneles', function(){
    return view('roles/admin/paneles');
});

Route::get('/inversores', function(){
    return view('roles/admin/inversores');
});

/*--- Ingeniero ---*/
Route::get('/levantamiento', function(){
    return view('roles/enginer/levantamiento');
});

Route::get('/levantamient', function(){
    return view('roles/enginer/levantamient');
});

Route::get('/instalacion', function(){
    return view('roles/enginer/instalacion');
});

Route::get('configuracion', function(){
    return view('roles/enginer/configuracion');
});

Route::post('enviarConfiguracion',['as'=>'enviarConfiguracion','uses'=>'ConfiguracionController@enviarConfiguracion']);
