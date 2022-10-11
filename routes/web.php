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
    return view('auth/login');
});

Auth::routes();

Route::get('/activity', 'ctrJusticia@updatedActivity');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/capturaevi', 'ctrCapevidencia@index')->name('capturaevi');
Route::get('/consarevi', 'ctrConsevidencia@conservar')->name('consarevi');
Route::get('verFoto/{id}',['as' => 'verFoto/{id}','uses'=>'ctrConsevidencia@verFoto']);
Route::post('traerFoto', 'ctrConsevidencia@traerFoto')->name('traerFoto');
Route::get('colonias', 'ctrVotacion@votacionxColonia')->name('colonias');
/*Route::get('justiciaCaptura', 'ctrJusticia@justiciaCaptura')->name('justiciaCaptura');*/
Route::get('justiciaCaptura/{id_rol}',['as' =>'justiciaCaptura','uses'=>'ctrJusticia@justiciaCaptura']);
Route::post('runCapturaJusticia', 'ctrJusticia@runCapturaJusticia')->name('runCapturaJusticia');
/*Route::get('justiciaActividades', 'ctrJusticia@justiciaActividades')->name('justiciaActividades');*/
Route::get('justiciaActividades/{id_rol}',['as' =>'justiciaActividades','uses'=>'ctrJusticia@justiciaActividades']);
Route::post('runCapturaActividad', 'ctrJusticia@runCapturaActividad')->name('runCapturaActividad');
Route::post('/ActualizaGrafica', 'HomeController@ActualizaGrafica')->name('ActualizaGrafica');
Route::get('/EncargadoPanel', 'HomeController@showEncargadosPanel')->name('EncargadoPanel');
Route::get('ActividadesPanel/{id_rol}', 'HomeController@showActividadesPanel')->name('ActividadesPanel');
Route::get('PersonalPanel/{id_rol}', 'HomeController@showPersonalPanel')->name('PersonalPanel');
Route::get('/imprimirRecibo', 'ctrVotacion@imprimirRecibo')->name('imprimirRecibo');
Route::get('/imprimirBoleta', 'ctrVotacion@imprimirBoleta')->name('imprimirBoleta');
Route::get('/avisosCaptura', 'HomeController@avisosCaptura')->name('avisosCaptura');
Route::get('descargarPDF/{uni}', 'HomeController@descargarPDF')->name('descargarPDF');
Route::get('descargarPDFGeneral/{estatus}/{id_p}/{id_dep}', 'HomeController@descargarPDFGeneral')->name('descargarPDFGeneral');

Route::post('runCapturaAviso', 'ctrJusticia@runCapturaAviso')->name('runCapturaAviso');
Route::get('subirArchivo/{idR}/{idA}', 'ctrJusticia@subirArchivo')->name('subirArchivo');
Route::post('addDocXUni',['as' => 'addDocXUni','uses'=>'ctrJusticia@addDocXUni']);
Route::post('addDocXUni2',['as' => 'addDocXUni2','uses'=>'ctrJusticia@addDocXUni2']);
Route::post('downloadDoc','ctrJusticia@downloadDoc')->name('downloadDoc');
Route::post('deleteDoc','ctrJusticia@deleteDoc')->name('deleteDoc');

Route::post('downloadDoc1','HomeController@downloadDoc1')->name('downloadDoc1');
Route::post('traerDocsXUni','HomeController@traerDocsXUni')->name('traerDocsXUni');


Route::get('eliminaActividad/{id}/{idR}',['as' =>'eliminaActividad/{id}/{idR}','uses'=>'ctrJusticia@eliminaActividad']);
Route::get('modificaActividad/{act}/{idR}',['as' =>'modificaActividad/{act}/{idR}','uses'=>'ctrJusticia@actividadesModifica']);

//Route::get('eliminaPersonal/{id}/{idD}',['as' =>'eliminaPersonal/{id}/{idD}','uses'=>'ctrJusticia@eliminaPersonal']);
Route::get('eliminaPersonal/{id}/{idD}/{c}', 'ctrJusticia@eliminaPersonal')->name('eliminaPersonal');
Route::post('runModificaActividad', 'ctrJusticia@runModificaActividad')->name('runModificaActividad');
/*
*zona para estadisticos....
*/
Route::get('Graficos/{id_rol}', 'ctrEstadisticos@Graficos')->name('Graficos');
Route::post('AjaxEstadisticos',['as' =>'AjaxEstadisticos','uses'=>'ctrEstadisticos@AjaxEstadisticos']);
/*
zona para panel general
 */
Route::get('PanelGeneral','HomeController@PanelGeneral')->name('PanelGeneral');
Route::post('ajaxNombresEncargadosDepartamentos',['as' =>'ajaxNombresEncargadosDepartamentos','uses'=>'HomeController@ajaxNombresEncargadosDepartamentos']);
Route::post('ajaxDatosActividades',['as' =>'ajaxDatosActividades','uses'=>'HomeController@ajaxDatosActividades']);
Route::post('arregloDATOSTODOS',['as' =>'arregloDATOSTODOS','uses'=>'HomeController@arregloDATOSTODOS']);

// zona del mapa
Route::get('/panelMaps', 'LocationController@index')->name('panelMaps');


