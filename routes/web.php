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

// Route::get('web', function () {
//     return view('mapa_dash');
// });

Route::get('/','InicioController@mapa_full')->name('inicio');
// Route::get('/','InicioController@index')->name('inicio');
Route::get('pais','InicioController@paises')->name('paises');
Route::post('paises','InicioController@paises')->name('paises');

Route::get('historial','InicioController@historial')->name('historial');

Route::get('imports', 'InicioController@viewimport')->name('viewimport');
Route::post('import', 'InicioController@importCsv')->name('import');

Route::post('import-confirmado', 'InicioController@imporConfirmadoCsv')->name('historial.confirmado');
Route::post('import-recuperado', 'InicioController@imporRecuperadoCsv')->name('historial.recuperado');
Route::post('import-muerte', 'InicioController@imporMuertoCsv')->name('historial.muerte');
Route::post('import-departamento', 'InicioController@importDepartamentoCsv')->name('historial.departamento');


// Route::get('dataperu', function () {
//     return view('import');
// });
Route::get('dataperu', 'ImportController@viewImport')->name('data_import');
Route::post('import-data-peru', 'ImportController@importDataperuCsv')->name('data.peru');
Route::post('import-ubigeo', 'ImportController@importUbigeoperuCsv')->name('data.ubigeo');
Route::post('import-hospitalizacion', 'ImportController@importHospitalizadoCsv')->name('data.hospitalizacion');
Route::post('import-test-result', 'ImportController@importTestresultCsv')->name('data.test_result');