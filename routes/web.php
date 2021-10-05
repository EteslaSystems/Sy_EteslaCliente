<?php
Route::get('/pdf', function(){
    return view('PDFTemplates.pdfBajaTension');
});
Route::get('/pdfCreate', 'PDFController@visualizarPDF');

/* --------------- Usuario --------------- */
Route::get('/', 'usuarioController@index');
Route::post('/', 'usuarioController@validarUsuario');
Route::get('/registro', 'usuarioController@mostrarRegistrarUsuario')->name('registro');
Route::post('/registro', 'usuarioController@registrarUsuario');
Route::get('/perfil', 'usuarioController@visualizarPerfil');
Route::post('/perfil', 'usuarioController@editarPerfil');
Route::get('/olvidoPassword', 'usuarioController@olvidoContrasenia');
Route::post('/olvidoPassword', 'usuarioController@recuperarContrasenia');
Route::get('/logout', 'usuarioController@cerrarSesion');
Route::get('/verificarEmail/{email}', 'usuarioController@verificarEmail');
/* --------------------------------------- */

/* --------------- Vendedor --------------- */
Route::get('/vendedor', 'vendedorController@index');

Route::get('/registrarCliente', 'vendedorController@misClientes');
Route::get('/clientes', 'vendedorController@clientes');

//////COTIZACION
Route::post('/PDFgenerate', 'CotizacionController@generatePDF');
Route::post('/GuardarPropuesta','CotizacionController@guardarPropuesta');

/* --- Cotizacion Media Tension --- */
Route::get('/mediaT', 'MediaTensionController@index');
Route::get('/mediaTension', 'MediaTensionController@index');
//1er paso MT (MediaTension)
Route::post('/enviarPeriodos','MediaTensionController@sendPeriodsToServer');
Route::post('/firstStepPower','MediaTensionController@firstStepPower'); //[Hoja_Excel: POWER]
//2do paso MT
Route::post('/enviarInvSeleccionado','MediaTensionController@sendInversorSelected');
//3er paso MT
Route::post('/calcularVT','MediaTensionController@calculateViaticsTotals');//Calcular Viaticos y Totales

//Resultados cotizacion MT
Route::get('/resultados', 'ResultadosController@index');

/* --- Cotizacion Individual --- */
Route::get('/individual', 'CotizacionIndividualController@index');
Route::post('/enviarCotizIndiv','CotizacionIndividualController@sendSingleQuotation');

/* --- Cotizacion Baja Tension --- */
Route::get('/bajaTension', 'BajaTensionController@index');
Route::post('/sendPeriodsBT', 'BajaTensionController@getCotizacionBT');
Route::post('/calcularViaticosBTI', 'BajaTensionController@calculaViaticos_BT');
//Busqueda_inteligente
Route::post('/askCombinations', 'BajaTensionController@askCombination');
//[ Hoja:POWER ]
Route::post('/powerBT', 'BajaTensionController@getPowerBT');
/* ---------------------------------------- */

/* --------------- Cliente --------------- */
// Route::post('/agregar-cliente','MediaTensionController@create');

Route::post('/registrarCliente', 'clienteController@registrarCliente');
Route::get('/eliminar-cliente/{idCliente}', 'clienteController@eliminarCliente');
Route::get('/editar-cliente/{idPersona}', 'clienteController@mostrarCliente');
Route::put('/editar-cliente/{idPersona}', 'clienteController@actualizarCliente');



/* ------------------------------------------------ */
Route::post('/consultarClientePorId', 'clienteController@consultarClientePorId');

Route::put('/buscarCliente/{cliente?}','clienteController@consultarClientePorNombre');
/* ------------------------------------------------ */


/* ------------------Cliente_Propuesta(s)--------------------- */
Route::post('/propuestasByClient', 'PropuestasController@getPropuestasByClient');
/* --------------------------------- */



/* --------------- Administrador --------------- */
Route::get('/admin', 'administradorController@index');

//Material_Fotovoltaico
Route::get('/material-fotovoltaico', 'MaterialFotovoltaicoController@index' );

//PANELES
Route::get('/paneles', 'PanelesController@index');
Route::post('/agregar-panel', 'PanelesController@create');
Route::get('/eliminar-panel/{idPanel}', 'PanelesController@destroy');
Route::get('/editar-panel/{idPanel}', 'PanelesController@edit');
Route::put('/editar-panel/{idPanel}', 'PanelesController@update');

//INVERSORES
Route::get('/inversores', 'InversoresController@index');
Route::post('/inversoresSelectos', 'InversoresController@getInversoresSelectos');
Route::post('/agregar-inversor', 'InversoresController@create');
Route::get('/eliminar-inversor/{idInversor}', 'InversoresController@destroy');
Route::get('/editar-inversor/{idInversor}', 'InversoresController@edit');
Route::put('/editar-inversor/{idInversor}', 'InversoresController@update');

//ESTRUCTURAS
Route::get('/estructuras', 'EstructurasController@read');
Route::post('/agregar-estructura', 'EstructurasController@create');
Route::get('/eliminar-estructura/{idEstructura}', 'EstructurasController@destroy');

Route::put('/editar-estructura/{idEstructura?}', 'EstructurasController@edit');
/* --------------------------------------------- */

/* --------------- Ingeniero --------------- */
Route::get('/engineer', 'ingenieroController@index');
Route::get('/levantamiento', 'ingenieroController@levantamiento');
Route::get('/instalacion', 'ingenieroController@instalacion');
Route::get('/configuracion', 'ingenieroController@configuracion');

Route::get('/otros-materiales', 'OtrosMaterialesController@index');
Route::post('/agregar-categoria', 'OtrosMaterialesController@create');
Route::get('/eliminar-categoria/{idCategoria}', 'OtrosMaterialesController@destroy');
Route::get('/editar-categoria/{idCategoria}', 'OtrosMaterialesController@edit');
Route::put('/editar-categoria/{idCategoria}', 'OtrosMaterialesController@update');

Route::post('/agregar-materiales', 'OtrosMaterialesController@createMateriales');
Route::get('/eliminar-materiales/{idMateriales}', 'OtrosMaterialesController@destroyMateriales');
Route::get('/editar-materiales/{idMateriales}', 'OtrosMaterialesController@editMateriales');
Route::put('/editar-materiales/{idMateriales}', 'OtrosMaterialesController@updateMateriales');
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

Route::post('enviarConfiguracion',['as'=>'enviarConfiguracion','uses'=>'ConfiguracionController@enviarConfiguracion']);
