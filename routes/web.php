<?php

use Illuminate\Support\Facades\Route;

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
})->name('inicio');
Route::get('/buscar','AdministradorController@BuscarMascota')->name('buscar.animal');
Route::get('/detallepedex/{id}','AdministradorController@DetallePedex')->name('detalle.pedex.animal');
Route::get('/detailspedex/{id}','AdministradorController@DetailsPedex')->name('details.pedex.animal');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



    Route::get('/listapuppey', 'AdministradorController@ListaMascota')->name('puppey.principal');
    Route::get('/creapuppey', 'AdministradorController@CrearMascota')->name('puppey.crear');
    Route::get('/editapuppey/{id}', 'AdministradorController@EditarMascota')->name('puppey.editar');
    Route::get('/deletepuppey/{id}', 'AdministradorController@EliminarMascota')->name('puppey.eliminar');
    Route::get('/genealogia', 'AdministradorController@GenealogiaMascota')->name('puppey.genealogia');
    Route::get('/detallepuppey/{id}', 'AdministradorController@DetalleMascota')->name('puppey.detalle');
    Route::resource('/puppey','AnimalController');



    Route::get('/listatipoanimal', 'AdministradorController@ListaTipoAnimal')->name('tipo.animal.principal');
    Route::get('/creatipoanimal', 'AdministradorController@CrearTipoAnimal')->name('tipo.animal.crear');
    Route::get('/editatipoanimal/{id}', 'AdministradorController@EditarTipoAnimal')->name('tipo.animal.editar');
    Route::get('/deletetipoanimal/{id}', 'AdministradorController@EliminarTipoAnimal')->name('tipo.animal.eliminar');
    Route::resource('/tipoanimal','TipoAnimalController');



    Route::get('/listaraza', 'AdministradorController@ListaRaza')->name('raza.principal');
    Route::get('/crearaza', 'AdministradorController@CrearRaza')->name('raza.crear');
    Route::get('/editaraza/{id}', 'AdministradorController@EditarRaza')->name('raza.editar');
    Route::get('/deleteraza/{id}', 'AdministradorController@EliminarRaza')->name('raza.eliminar');
    Route::resource('/raza','RazaController');



    Route::get('/listacertificado', 'AdministradorController@ListaCertificado')->name('certidicado.principal');
    Route::get('/creacertificado', 'AdministradorController@CrearCertificado')->name('certificado.crear');
    Route::get('/editacertificado/{id}', 'AdministradorController@EditarCertificado')->name('certificado.editar');
    Route::get('/deletecertificado/{id}', 'AdministradorController@EliminarCertificado')->name('certificado.eliminar');



    Route::get('/listausuario', 'AdministradorController@ListaCliente')->name('cliente.principal');
    Route::get('/creausuario', 'AdministradorController@CrearCliente')->name('cliente.crear');
    Route::get('/editausuario/{id}', 'AdministradorController@EditarCliente')->name('cliente.editar');
    Route::get('/deleteusuario/{id}', 'AdministradorController@EliminarCliente')->name('cliente.eliminar');
    Route::resource('/cliente','ClienteController');

    // Routes Ajax

    Route::get('listaraza/{id}','AdministradorController@getRaza');
    Route::get('listapadre/{id}','AdministradorController@getMascotaPadre');
    Route::get('listamadre/{id}','AdministradorController@getMascotaMadre');


    Route::get('getMascota/{id}','AdministradorController@getMascotaId');



    Route::get('registrar', 'AdministradorController@Nosotros')->name('registrar');

Route::get('inscribir', 'AdministradorController@InscribirMacota')->name('inscribir');
Route::get('/editamascotacli/{id}', 'AdministradorController@EditarMascotaCliente')->name('editar.cliente.mascota');
Route::resource('/inscripcion','InscripcionController');


Route::get('mismascotas', 'AdministradorController@MisMascotas')->name('my.mascota');



Route::get('/cambiapass/{id}', 'AdministradorController@CambiarPass')->name('user.password');
Route::get('/cambiapassword/{id}', 'AdministradorController@CambiarPassword')->name('cliente.password');
Route::resource('/changue', 'ChanguePassController');
Route::resource('/changuecli', 'ChanguePassCli');

Route::get('/resetpass/{id}', 'AdministradorController@ResetPassword')->name('reset.password');

Route::get('/listamascota/{id}', 'AdministradorController@ListaMascotas')->name('lista.mascota');



Route::resource('/resetearpass', 'ResetPassController');


Route::get('/deletemymascota/{id}', 'AdministradorController@EliminarMascotaCliente')->name('mimascota.eliminar');
