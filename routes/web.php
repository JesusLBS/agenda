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
//------------------------------------------------------------------------
/*----------------------Auth----------------------*/
Route::resetPassword();
Route::emailVerification();
Route::post('logout', 'Auth\LoginController@logout')->name('logout');  
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');   
//----------------------------------------------------------------------------------------
Route::post('login','Auth\LoginController@login')->name('login');
Route::get('register','registercontroller@index');
Route::post('register','registercontroller@store')->name('register');
/*-----------------------------------------------------------------------------------------------*/
//rutas accessibles solo si el usuario no se ha logueado
Route::group(['middleware' => 'guest'], function () {
Route::get('/', function () {
    return view('welcome');
});

});

//rutas accessibles solo si el usuario esta autenticado y se ha ingresado al sistema
Route::group(['middleware' => 'auth'], function () {

Route::get('agenda_inicio','agendacontroller@index');
Route::resource('agenda','agendacontroller');
/*Inicio*/
/*----------------------Matutino----------------------*/ 
/*Aula 1*/
Route::post('informatica_matutino1','lab_informaticacontroller@store')->name('informatica_matutino1');
route::resource('informatica_matutino','lab_informaticacontroller');
Route::post('informatica_matutino1_','lab_informaticacontroller@store1_')->name('informatica_matutino1_');

//Eliminar y Modificacion
Route::get('/EliminarLabInformatica_Mat/{id_lab_infor_mat}','lab_informaticacontroller@eliminar');
Route::post('informatica_matutinoedit','lab_informaticacontroller@update')->name('informatica_matutinoedit');
/*Aula 2*/
Route::post('autocad_matutino1','lab_autocadcontroller@store')->name('autocad_matutino1');
route::resource('autocad_matutino','lab_autocadcontroller');
Route::post('autocad_matutino1_','lab_autocadcontroller@store1_')->name('autocad_matutino1_'); 
//Eliminar y Modificacion
Route::get('/EliminarLabAutocad_Mat/{id_lab_autocad_mat}','lab_autocadcontroller@eliminar');
Route::post('autocad_matutinoedit','lab_autocadcontroller@update')->name('autocad_matutinoedit');
/*Aula 3*/
Route::post('administracion_matutino1','taller_administracioncontroller@store')->name('administracion_matutino1');
route::resource('taller_admin_matutino','taller_administracioncontroller');
Route::post('administracion_matutino1_','taller_administracioncontroller@store1_')->name('administracion_matutino1_'); 
//Eliminar y Modificacion
Route::get('/EliminarAdminMat_Mat/{id_lab_talleradmin_mat}','taller_administracioncontroller@eliminar');
Route::post('admin_matutinoedit','taller_administracioncontroller@update')->name('admin_matutinoedit');
/*Aula 4*/
Route::post('auditorio1','auditoriocontroller@store')->name('auditorio1');
route::resource('auditorio_matutino','auditoriocontroller');
Route::post('auditorio1_','auditoriocontroller@store1_')->name('auditorio1_');
//Eliminar y Modificacion
Route::get('/EliminarAuditorio_Mat/{id_auditorio_mat}','auditoriocontroller@eliminar');
Route::post('auditorio_matutinoedit','auditoriocontroller@update')->name('auditorio_matutinoedit');
/*----------------------Vespertino----------------------*/
/*Aula 1*/
Route::post('informatica_vespertino1','lab_informaticacontrollerves@store')->name('informatica_vespertino1');
route::resource('informatica_vespertino','lab_informaticacontrollerves');
Route::post('informatica_vespertino1_','lab_informaticacontrollerves@store1_')->name('informatica_vespertino1_');
//Eliminar y Modificacion
Route::get('/EliminarLabInformatica_Ves/{id_lab_infor_ves}','lab_informaticacontrollerves@eliminar');
Route::post('informatica_vespertinoedit','lab_informaticacontrollerves@update')->name('informatica_vespertinoedit');
/*Aula 2*/
Route::post('autocad_vespertino1','lab_autocadcontrollerves@store')->name('autocad_vespertino1');
route::resource('autocad_vespertino','lab_autocadcontrollerves');
Route::post('autocad_vespertino1_','lab_autocadcontrollerves@store1_')->name('autocad_vespertino1_');
//Eliminar y Modificacion
Route::get('/EliminarLabAutocad_Ves/{id_lab_autocad_ves}','lab_autocadcontrollerves@eliminar');
Route::post('autocad_vespertinoedit','lab_autocadcontrollerves@update')->name('autocad_vespertinoedit');
/*Aula 3*/
Route::post('administracion_vespertino1','taller_administracioncontrollerves@store')->name('administracion_vespertino1');
route::resource('taller_admin_vespertino','taller_administracioncontrollerves');
Route::post('administracion_vespertino1_','taller_administracioncontrollerves@store1_')->name('administracion_vespertino1_');
//Eliminar y Modificacion
Route::get('/EliminarAdminMat_Ves/{id_lab_talleradmin_ves}','taller_administracioncontrollerves@eliminar');
Route::post('admin_vespertinoedit','taller_administracioncontrollerves@update')->name('admin_vespertinoedit');
/*Aula 4*/
Route::post('auditoriovespertino1','auditoriocontrollerves@store')->name('auditoriovespertino1');
route::resource('auditorio_vespertino','auditoriocontrollerves');
Route::post('auditoriovespertino1_','auditoriocontrollerves@store1_')->name('auditoriovespertino1_');
//Eliminar y Modificacion
Route::get('/EliminarAuditorio_Vest/{id_auditorio_ves}','auditoriocontrollerves@eliminar');
Route::post('auditorio_vespertinoedit','auditoriocontrollerves@update')->name('auditorio_vespertinoedit');
/*---------------------------------------------------------------------------*/
/*Modulos*/
route::resource('modulos','modulocontroller');
Route::post('modulos1','modulocontroller@store')->name('modulos1');
//Eliminar y Modificacion
Route::get('/EliminarModulo/{id_modulo}','modulocontroller@eliminar');
Route::get('/DesactivarModulo/{id_modulo}','modulocontroller@desactivar');
Route::post('moduloedit','modulocontroller@update')->name('moduloedit');
/*Docentes*/
route::resource('docentes','docentecontroller');
Route::post('docentes1','docentecontroller@store')->name('docentes1');
//Eliminar y Modificacion
Route::get('/EliminarDocente/{id_docente}','docentecontroller@eliminar');
Route::get('/DesactivarDocente/{id_docente}','docentecontroller@desactivar');
Route::post('docenteedit','docentecontroller@update')->name('docenteedit');



/*----------------------Matutino PDF----------------------*/
/*-------------------------------------------------------- PDF Informatica Matutino------------------------------------------------------------*/
//Reporte de PDF Registros
Route::get('informaticam/{criterio?}','pdfcontroller@informaticam');
//Reporte de PDF por criterio
Route::get('informaticam1_/{criterio?}','pdfcontroller@informaticam1_');
//Criterio de Busqueda
Route::post('buscar_infor','lab_informaticacontroller@show')->name('buscar_infor'); 
/*-------------------------------------------------------- PDF Autocad Matutino------------------------------------------------------------*/
//Reporte de PDF Registros
Route::get('autocadm/{criterio?}','pdfcontroller@autocadm');
//Reporte de PDF por criterio 
Route::get('autocadm1_/{criterio?}','pdfcontroller@autocadm1_');
//Criterio de Busqueda
Route::post('buscar_autocad','lab_autocadcontroller@show')->name('buscar_autocad');
/*-------------------------------------------------------- PDF Taller de Administracion Matutino------------------------------------------------------------*/
//Reporte de PDF Registros
Route::get('talleradminm/{criterio?}','pdfcontroller@talleradminm');
//Reporte de PDF por criterio
Route::get('talleradminm1_/{criterio?}','pdfcontroller@talleradminm1_'); 
//Criterio de Busqueda
Route::post('buscar_talleradmin','taller_administracioncontroller@show')->name('buscar_talleradmin');
/*-------------------------------------------------------- PDF Auditorio Matutino------------------------------------------------------------*/
//Reporte de PDF Registros
Route::get('auditoriom/{criterio?}','pdfcontroller@auditoriom');
//Reporte de PDF por criterio
Route::get('auditoriom1_/{criterio?}','pdfcontroller@auditoriom1_');
//Criterio de Busqueda
Route::post('buscar_auditorio','auditoriocontroller@show')->name('buscar_auditorio');
/*----------------------Vespertino PDF----------------------*/
/*-------------------------------------------------------- PDF Informatica Vespertino------------------------------------------------------------*/
//Reporte de PDF Registros
Route::get('informaticav/{criterio?}','pdfcontroller@informaticav');
//Reporte de PDF por criterio
Route::get('informaticav1_/{criterio?}','pdfcontroller@informaticav1_');
//Criterio de Busqueda
Route::post('buscar_infor_ves','lab_informaticacontrollerves@show')->name('buscar_infor_ves'); 
/*-------------------------------------------------------- PDF Autocad Vespertino------------------------------------------------------------*/
//Reporte de PDF Registros
Route::get('autocadv/{criterio?}','pdfcontroller@autocadv');
//Reporte de PDF por criterio
Route::get('autocadv1_/{criterio?}','pdfcontroller@autocadv1_');
//Criterio de Busqueda
Route::post('buscar_autocad_ves','lab_autocadcontrollerves@show')->name('buscar_autocad_ves');
/*-------------------------------------------------------- PDF Taller de Administracion Vespertino------------------------------------------------------------*/
//Reporte de PDF Registros
Route::get('talleradminv/{criterio?}','pdfcontroller@talleradminv');
//Reporte de PDF por criterio
Route::get('talleradminv1_/{criterio?}','pdfcontroller@talleradminv1_');
//Criterio de Busqueda
Route::post('buscar_talleradmin_ves','taller_administracioncontrollerves@show')->name('buscar_talleradmin_ves');
/*-------------------------------------------------------- PDF Auditorio Vespertino------------------------------------------------------------*/
//Reporte de PDF Registros
Route::get('auditoriov/{criterio?}','pdfcontroller@auditoriov');
//Reporte de PDF por criterio
Route::get('auditoriov1_/{criterio?}','pdfcontroller@auditoriov1_');
//Criterio de Busqueda
Route::post('buscar_auditorio_ves','auditoriocontrollerves@show')->name('buscar_auditorio_ves'); 
});



Route::group(['middleware' => 'usuarioadmin'], function(){
	/*Modulos*/
route::resource('modulos','modulocontroller');
Route::post('modulos1','modulocontroller@store')->name('modulos1');
//Eliminar y Modificacion
Route::get('/EliminarModulo/{id_modulo}','modulocontroller@eliminar');
Route::get('/DesactivarModulo/{id_modulo}','modulocontroller@desactivar');
Route::post('moduloedit','modulocontroller@update')->name('moduloedit');
/*Docentes*/
route::resource('docentes','docentecontroller');
Route::post('docentes1','docentecontroller@store')->name('docentes1');
//Eliminar y Modificacion
Route::get('/EliminarDocente/{id_docente}','docentecontroller@eliminar');
Route::get('/DesactivarDocente/{id_docente}','docentecontroller@desactivar');
Route::post('docenteedit','docentecontroller@update')->name('docenteedit');
Route::get('agenda_actualizada','administrador@actualizaragenda');
/*Users*/
route::resource('admin_users','usercontroller');
Route::get('/Admin_Activar_User/{id}','usercontroller@activaruser');
Route::get('/Admin_Desactivar_User/{id}','usercontroller@desactivaruser');
Route::get('admin_usersactivos','usercontroller@index2');
Route::post('useredit','usercontroller@update')->name('useredit');
//Eliminar 
Route::get('/EliminarUser/{id}','usercontroller@eliminar');
Route::get('/admin','administrador@index');
Route::get('/activ','administrador@activacion');
Route::get('/editinfor','lab_informaticacontroller@show');
Route::get('/editautocad','lab_autocadcontroller@show');
Route::get('/editadmin','taller_administracioncontroller@show');
Route::get('/editauditorio','auditoriocontroller@show');
Route::get('/editinforves','lab_informaticacontrollerves@show');
Route::get('/editadminves','taller_administracioncontrollerves@show');
Route::get('/editautocadves','lab_autocadcontrollerves@show');
Route::get('/editauditorioves','auditoriocontrollerves@show');
Route::get('register_admin','administrador@index2');
Route::post('register1','administrador@store1')->name('register1');

});

