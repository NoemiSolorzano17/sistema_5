<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 
//Rutas Departamento
// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 
Route::resource('/Departamento', 'Departamentos');
Route::get('/Departamento', 'Departamentos@index');
Route::get('/DepartamentoCargar', 'Departamentos@cargarDepartamento');
// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 
//Rutas Tipo de Usuarios
// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 
Route::resource('/TipoUsuario','TipoUsuarios');
Route::get('/TipoUsuario', 'TipoUsuarios@index');
Route::get('/TipoUsuarioCargar', 'TipoUsuarios@cargarTipoUsuario');
// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 
//Rutas del Usuarios
// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 
Route::resource('/Usuario', 'Usuarios');
Route::get('/Usuario', 'Usuarios@index');
Route::get('/UsuarioMostrar','Usuarios@listausuario');
Route::get('/eliminarusuario/{id?}','Usuarios@eliminarusuario');
Route::get('/preparactualizarUsuario/{id}','Usuarios@preparactualizarusuario');
Route::get('/general','Usuarios@vergeneral');
// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 
//Rutas de Cargo
// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 
Route::resource('/Cargo','Cargos');
Route::get('/Cargo','Cargos@index');
Route::get('/preparactualizarcargo/{id}','Cargos@preparactualizarCargos');
Route::GET('/CargoMostrar','Cargos@listarCargos');

// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 
//Rutas de CargoUsuario
// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 
Route::resource('/CargoUsuario', 'CargosUsuarios');
Route::get('/CargoUsuario', 'CargosUsuarios@index');
Route::get('/CargosUsuariosMostrar/{id}','CargosUsuarios@listarCargosUsuarios');
Route::get('/CargosCargar','Cargos@cargarCargos');
// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 
//Rutas de Tipo De informe 
// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 
Route::resource('/TipoInforme','TipoInformes');
Route::get('/TipoInforme', 'TipoInformes@index');
Route::get('/TipoInformeCargar','TipoInformes@cargarTInforme');
// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 
//Rutas del informe 
// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // //
Route::resource('/Informe', 'Informes');
Route::get('/Informe', 'Informes@index');
Route::get('/InformeMostrar','Informes@listarInforme');
Route::get('/prepararInforme/{id}','Informes@actualizarInforme');
Route::get('/buscarInforme/{tema?}/{fecha?}','Informes@buscar_Informe');
Route::get('/buscarInformev2/{fecha?}', 'Informes@buscar_Informev2');
Route::post('/ModificarEstado/{datos?}', 'Informes@modificarInforme');
Route::get('/datosInforme/{id}','Informes@datosinformes');
Route::post('/guardarDocumento','Informes@guardararchivo');
 
// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 
//Rutas del subtema 
// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // //
Route::resource('/subtema', 'Subtemas');
Route::get('/subtema', 'Subtemas@index');
Route::get('/SubtemaMostrar','Subtemas@listasubtema');
Route::get('/preparactualizarSubtema/{id}','Subtemas@preparactualizarsubtema');
Route::get('/buscarSubtema/{descripcion?}','Subtemas@buscar_Subtema');
Route::post('/Modificar_EstadoSubtema/{datos?}','Subtemas@modificarSubtemaEstado');
Route::get('/datosSubtemas/{id}','Subtemas@datosSubtemas');

Route::get('/filtarSubtema/{id}','Subtemas@filtrarSubtema');
// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 
//Rutas de las recomendaciones
// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // //
Route::resource('/Recomendacion','Recomendaciones');
Route::get('/Recomendacion','Recomendaciones@index');
Route::get('/prepararactualizarrecomendaciones/{id}','Recomendaciones@preparactualizar');
Route::GET('/RecomendacionesMostrar','Recomendaciones@listarRecomendaciones');
Route::get('/FiltrarRecomendaciones/{id}','Recomendaciones@FiltrarRecomendaciones');
// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 
//Rutas de para asignar las recomendaciones al usuario
// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // //
Route::resource('/RecomendacionUsuario', 'RecomendacionesUsuarios');
Route::get('/RecomendacionUsuario', 'RecomendacionesUsuarios@index');
Route::get('/RecomendacionesUsuariosMostrar/{id}','RecomendacionesUsuarios@listarRecomendacionesUsuarios');
Route::get('/CargarUsuarios', 'RecomendacionesUsuarios@cargarUsuarioRecomendacione');//me carga a los usuarios
// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 
//Rutas para que los usuarios puedan ver las recomendaciones asignadas 
// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // //
Route::get('/MisRecomendaciones/{id?}', 'Usuarios@MisRecomendaciones');
Route::resource('/AsignarRecomendacion', 'RecomendacionesUsuarios');
// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 
//Rutas de estrategias
// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // //
Route::resource('/Estrategia', 'Estrategias');
Route::get('/Estrategia', 'Estrategias@index');
Route::get('/preparactualizarEstrategia/{id}','Estrategias@preparactualizarEstrategia');
Route::get('/FiltrarEstrategias/{id}','Estrategias@FiltrarEstrategias');
Route::get('/Filtrar','Estrategias@PorcentajeEstrategias');

// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 
//Rutas de Tareas
// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // //
Route::resource('/Tarea','Tareas');
Route::get('/Tarea','Tareas@index');
Route::get('/preparactualizartareas/{id}','Tareas@preparactualizar');
Route::GET('/FiltrarTareas/{id}','Tareas@FiltrarTareas');

// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 
//Rutas de entregables
// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // //
Route::resource('/Entregable','Entregables');
Route::get('/Entregable','Entregables@index');
Route::get('/preparactualizarentregables/{id}','Entregables@preparactualizar');
// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 
//Rutas de Inasistencia
// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // //
Route::resource('/Inasistencia','Inasistencias');
Route::get('/Inasistencia','Inasistencias@index');
Route::get('/preparactualizarInasistencia/{id}','Inasistencias@preparactualizarInasistencia');
Route::get('/listarInasistencia','Inasistencias@listarInasistencia');
Route::get('/FiltrarInasistencia/{id}','Inasistencias@FiltrarInasistencia');
//ME MUESTRA LAS INASISTENCIAS 
Route::get('/AsignarInasistencia', 'RecomendacionesUsuarios@mostrarinsistencia');

