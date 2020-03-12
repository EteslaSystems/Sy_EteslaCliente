<?php

//Route::get('/buscador',function() { return view('roles.seller.cotizador.mediaTension'); });
/* --------------- Usuario --------------- */
Route::get('/', 'usuarioController@index');
Route::post('/', 'usuarioController@validarUsuario');
Route::get('/register', 'usuarioController@mostrarRegistrarUsuario');
Route::post('/register', 'usuarioController@registrarUsuario');
Route::get('/perfil', 'usuarioController@visualizarPerfil');
Route::get('/olvidoPassword', 'usuarioController@olvidoContrasenia');
Route::get('/logout', 'usuarioController@cerrarSesion');
/* --------------------------------------- */

/* --------------- Vendedor --------------- */
Route::get('/vendedor', 'vendedorController@index');
Route::get('/mediaTension', 'vendedorController@mediaTension');
Route::get('/bajaTension', 'vendedorController@bajaTension');
Route::get('/registrarCliente', 'vendedorController@misClientes');
Route::get('/clientes', 'vendedorController@todosClientes');
Route::get('/consultarClientes', 'vendedorController@consultarClientes');
/* ---------------------------------------- */

/* --------------- Cliente --------------- */
Route::post('/registrarCliente', 'clienteController@registrarCliente');
/* --------------------------------------- */

/* --------------- Administrador --------------- */
Route::get('/admin', 'administradorController@index');
Route::get('/paneles', 'administradorController@paneles');
Route::get('/inversores', 'administradorController@inversores');
/* --------------------------------------------- */

/* --------------- Ingeniero --------------- */
Route::get('/engineer', 'ingenieroController@index');
Route::get('/levantamiento', 'ingenieroController@levantamiento');
Route::get('/instalacion', 'ingenieroController@instalacion');
Route::get('/configuracion', 'ingenieroController@configuracion');
/* ----------------------------------------- */

/* --------------- Operaciones --------------- */
Route::get('/operations', 'operacionesController@index');
/* ------------------------------------------- */

/* --------------- Generales --------------- */
Route::get('/index', 'usuarioController@paginaPrincipal');
Route::get('/404', function() {
    return view('template/404');
});
/* ----------------------------------------- */

/* --------------- No se exactamente que hagan estas vistas :v --------------- */
Route::post('/enviarCorreo', ['as' => 'enviarCorreo','uses'=>'MailController@welcomeMail']);
Route::post('enviarConfiguracion',['as'=>'enviarConfiguracion','uses'=>'ConfiguracionController@enviarConfiguracion']);
Route::get('/cor',function() {
    return view('mail/welcomeMail');
});
Route::get('/head',function() {
    return view('template/head');
});
/* --------------------------------------------------------------------------- */

Route::get('/mediaT', function(){
    return view('roles/seller/cotizador/mediaTension');
});