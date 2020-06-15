<?php

use Illuminate\Support\Facades\Route;
//use Illuminate\Support\Facades\App;
//use Illuminate\Contracts\Session\Session;

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




Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->middleware('verified'); 
Route::get('/home', 'HomeController@index')->middleware('verified');
Route::get('/logout', 'HomeController@index')->middleware('verified');

Route::resource('users', 'UserController')->middleware('auth');

// Route qui permet de connaître la langue active
Route::get('locale', 'LocalizationController@getLang');

// Route qui permet de modifier la langue
Route::get('locale/{lang}', 'LocalizationController@setLang');




Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder')->middleware('auth');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template')->middleware('auth');;

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template')->middleware('auth');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate')->middleware('auth');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback')->middleware('auth');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file')->middleware('auth');

Route::resource('roles', 'RoleController')->middleware('auth');

Route::resource('permissions', 'PermissionController')->middleware('auth');

Route::resource('roleUsers', 'RoleUserController')->middleware('auth');

Route::resource('permissionRoles', 'PermissionRoleController')->middleware('auth');

Route::resource('permissionUsers', 'PermissionUserController')->middleware('auth');

Route::resource('entreprises', 'EntrepriseController')->middleware('auth');

Route::resource('agences', 'AgenceController')->middleware('auth');

Route::resource('transporteurs', 'TransporteurController')->middleware('auth');

Route::resource('petroliers', 'PetrolierController')->middleware('auth');

Route::resource('stations', 'StationController')->middleware('auth');

Route::resource('pompistes', 'PompisteController')->middleware('auth');

Route::resource('categories', 'CategorieController')->middleware('auth');

Route::resource('produits', 'ProduitController')->middleware('auth');

Route::resource('cuves', 'CuveController')->middleware('auth');

Route::resource('pompes', 'PompeController')->middleware('auth');

Route::resource('enginMarques', 'EnginMarqueController')->middleware('auth');

Route::resource('enginModeles', 'EnginModeleController')->middleware('auth');

Route::resource('enginTypes', 'EnginTypeController')->middleware('auth');

Route::resource('engins', 'EnginController')->middleware('auth');

Route::resource('processes', 'ProcessController')->middleware('auth');

Route::resource('activites', 'ActiviteController')->middleware('auth');

Route::resource('chauffeurs', 'ChauffeurController')->middleware('auth');

Route::resource('chauffeurPermis', 'ChauffeurPermiController')->middleware('auth');

Route::resource('enginKilometrages', 'EnginKilometrageController')->middleware('auth');

Route::resource('ventePetroliers', 'VentePetrolierController')->middleware('auth');

Route::resource('produitPrixes', 'ProduitPrixController')->middleware('auth');

Route::resource('bascules', 'BasculeController')->middleware('auth');

Route::resource('typeZones', 'TypeZoneController')->middleware('auth');

Route::resource('zoneCollectes', 'ZoneCollecteController')->middleware('auth');

Route::resource('baremeTransports', 'BaremeTransportController')->middleware('auth');

Route::resource('basculeDatas', 'BasculeDataController')->middleware('auth');

Route::resource('baremePenaliteTransports', 'BaremePenaliteTransportController')->middleware('auth');