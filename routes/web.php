<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sin_rol', function()
{
    return view('error');
});

Route::group(['middleware' => 'auth'], function() 
{
//Salir del Sistema
	Route::get('/salir','HomeController@getSalirSistema');

//Sección de rol----------------------------------------------
	Route::post('auth/rol_seleccionado', 'HomeController@postRolSeleccionado');
//Sección rutas empresa----------------------------------------------
	Route::get('empresa', 'EmpresaControlador@getRecibosPendientesEmpresa');
	Route::get('empresa/alta_oficial', 'EmpresaControlador@getAltaOficial');
	Route::get('empresa/baja_oficial', 'EmpresaControlador@getBajaOficial');
	Route::get('empresa/modificacion_oficial', 'EmpresaControlador@getModificacionOficial');
	Route::get('empresa/busqueda_oficial', 'EmpresaControlador@getBusquedaOficial');

	Route::get('empresa/recibos_pendientes_empresa', 'EmpresaControlador@getRecibosPendientesEmpresa');
	Route::get('empresa/ver_recibo_pendiente_firma_empresa/{id}', 'EmpresaControlador@getVerRecibo');
	Route::post('empresa/recibos_pendientes_empleados', 'EmpresaControlador@postFirmaMasivaRecibosPendientesEmpleados');

	Route::get('empresa/recibos_pendientes_empleados', 'EmpresaControlador@getRecibosPendientesEmpleados');
	Route::get('empresa/ver_recibo_firmado_empresa/{id}', 'EmpresaControlador@getFirmarReciboPendienteEmpresa');
	Route::get('empresa/ver_recibo_pendiente_firma_empleado/{id}', 'EmpresaControlador@getVerReciboPendienteFirmaEmpleado');

	Route::get('empresa/recibos_firmados_empresa_empleados', 'EmpresaControlador@getRecibosFirmadosEmpresaEmpleados');
	Route::get('empresa/ver_recibo_firmado_empresa_empleado/{id}', 'EmpresaControlador@getVerReciboFirmadoEmpresaEmpleado');

	Route::get('empresa/informes_empresa', 'EmpresaControlador@getInformesEmpresa');
	Route::post('empresa/resultado_informes_empresa', 'EmpresaControlador@postVerInformesEmpresa');

	Route::get('empresa/cambiar_contraseña', 'EmpresaControlador@getCambiarContraseña');

//Sección rutas rrhh----------------------------------------------

	Route::get('rrhh', 'RrhhControlador@getIndexRrhh');
	Route::get('rrhh/alta_empleado', 'RrhhControlador@getAltaEmpleado');
	Route::post('rrhh/empleado_cargado', 'RrhhControlador@postEmpleadoCargado');
	Route::get('rrhh/baja_empleado/{cedula}', 'RrhhControlador@getBajaEmpleado');
	Route::get('rrhh/modificacion_empleado/{cedula}', 'RrhhControlador@getModificacionEmpleado');
	Route::get('rrhh/empleado_modificado', 'RrhhControlador@getEmpleadoModificado');
	Route::get('rrhh/busqueda_empleado', 'RrhhControlador@getBusquedaEmpleado');
	Route::get('rrhh/datatable', 'RrhhControlador@datatable');
	Route::get('rrhh/crear_nuevo_periodo', 'RrhhControlador@getCrearNuevoPeriodo');
	Route::post('rrhh/crear_nuevo_periodo', 'RrhhControlador@getCrear');
	Route::get('rrhh/validar_recibos', 'RrhhControlador@getValidarRecibos');
	Route::post('rrhh/validar_recibos', 'RrhhControlador@postValidarRecibos');

	Route::get('rrhh/importar_recibos', 'RrhhControlador@getImportarRecibos');
	Route::post('rrhh/importar_recibos', 'RrhhControlador@getRecibosImportados');
	
	Route::get('rrhh/empleados_sin_recibos', 'RrhhControlador@getEmpleadosSinRecibos');
	Route::get('rrhh/corregir_recibos', 'RrhhControlador@getCorregirRecibos');

	Route::get('rrhh/grupos_recibos', 'RrhhControlador@getGruposRecibos');
	Route::post('rrhh/grupos_recibos', 'RrhhControlador@postCrearGrupoRecibo');

	
	Route::get('rrhh/pendientes_firma_empresa', 'RrhhControlador@getPendientesFirmaEmpresa');
	Route::get('rrhh/ver_recibo/{id}', 'RrhhControlador@getVerRecibo');


	Route::get('rrhh/pendientes_firma_empleados', 'RrhhControlador@getPendientesFirmaEmpleados');
	Route::get('rrhh/ver_recibo_pendientes_firma_empleados/{id}', 'RrhhControlador@getVerReciboPendientesFirmaEmpleados');

	Route::get('rrhh/firmados_empresa_empleados', 'RrhhControlador@getFirmadosEmpresaEmpleados');
	Route::get('rrhh/ver_recibo_firmado_empresa_empleado/{id}', 'RrhhControlador@getVerReciboFirmadoEmpresaEmpleado');
	Route::get('rrhh/todos_los_recibos', 'RrhhControlador@getTodosLosRecibos');
	Route::get('rrhh/ver_todos_los_recibos/{id}', 'RrhhControlador@getVerTodosLosRecibos');

	Route::get('rrhh/informes_rrhh', 'RrhhControlador@getInformesRrhh');
	Route::post('rrhh/resultado_informes_rrhh', 'RrhhControlador@postVerInformesRrhh');

	Route::get('rrhh/cambiar_contraseña', 'RrhhControlador@getCambiarContraseña');
 

//Sección rutas oficial----------------------------------------------

	Route::get('oficial', 'OficialControlador@getIndexOficial');
	Route::get('oficial/alta_rrhh', 'OficialControlador@getAltaRrhh');
	Route::get('oficial/baja_rrhh', 'OficialControlador@getBajaRrhh');
	Route::get('oficial/modificacion_rrhh', 'OficialControlador@getModificacionRrhh');
	Route::get('oficial/busqueda_rrhh', 'OficialControlador@getBusquedaRrhh');
	Route::get('oficial/alta_empresa', 'OficialControlador@getAltaEmpresa');
	Route::get('oficial/baja_empresa', 'OficialControlador@getBajaEmpresa');
	Route::get('oficial/modificacion_empresa', 'OficialControlador@getModificacionEmpresa');
	Route::get('oficial/busqueda_empresa', 'OficialControlador@getBusquedaEmpresa');
	Route::get('oficial/roles', 'OficialControlador@getRoles');
	Route::get('oficial/auditoria', 'OficialControlador@getAuditoria');
	Route::get('oficial/restablecer_contraseña', 'OficialControlador@getRestablecerContraseña');
	Route::get('oficial/cambiar_contraseña', 'OficialControlador@getCambiarContraseña');

//Sección rutas empleado----------------------------------------------

	Route::get('empleado', 'EmpleadoControlador@getRecibosPendientes');

	Route::get('empleado/recibos_pendientes', 'EmpleadoControlador@getRecibosPendientes');
	Route::post('empleado/recibos_firmados', 'EmpleadoControlador@postFirmaMasivaRecibosPendientesEmpleado');

	Route::get('empleado/ver_recibo_pendiente_firma_empleado/{id}', 'EmpleadoControlador@getVerReciboPendienteFirmaEmpleado');
	Route::get('empleado/ver_recibo_firmado_empresa/{id}', 'EmpleadoControlador@getFirmarReciboPendienteEmpleado');
	Route::get('empleado/ver_recibo_firmado_empleado/{id}', 'EmpleadoControlador@getFirmarReciboPendienteEmpleado');

	Route::get('empleado/recibos_firmados', 'EmpleadoControlador@getRecibosFirmados');
	Route::get('empleado/ver_recibo_firmado_empresa_empleado/{id}', 'EmpleadoControlador@getVerReciboFirmadoEmpresaEmpleado/{id}');



	Route::get('empleado/contactar_rrhh', 'EmpleadoControlador@getContactarRrhh');
	Route::get('empleado/cambiar_contraseña', 'EmpleadoControlador@getCambiarContraseña');

});




