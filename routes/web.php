<?php

/* --------------- Usuario --------------- */
Route::get('/', 'usuarioController@index');
Route::post('/', 'usuarioController@validarUsuario');
Route::get('/registro', 'usuarioController@mostrarRegistrarUsuario');
Route::post('/registro', 'usuarioController@registrarUsuario');
Route::get('/perfil', 'usuarioController@visualizarPerfil');
Route::get('/olvidoPassword', 'usuarioController@olvidoContrasenia');
/* --------------------------------------- */

/* --------------- Vendedor --------------- */
Route::get('/vendedor', 'vendedorController@index');
Route::get('/mediaTension', 'vendedorController@mediaTension');
Route::get('/bajaTension', 'vendedorController@bajaTension');
Route::get('/registrarCliente', 'vendedorController@misClientes');
Route::get('/clientes', 'vendedorController@todosClientes');
Route::get('/logout', 'vendedorController@cerrarSesion');
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
<<<<<<< HEAD

//Route::get('/mediaTension', function(){ return view('roles/seller/cotizador/mediaTension'); });

//Route::get('/bajaTension', function(){ return view('roles/seller/cotizador/bajaTension'); });

Route::get('/mediaT', function(){
    return view('roles/seller/cotizador/mediaTension');
});

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
=======
/* --------------------------------------------------------------------------- */
>>>>>>> d9ae642df67b7249346d01ca3532353dd59ffdc9
