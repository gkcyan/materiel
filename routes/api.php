<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('entreprises', 'EntrepriseAPIController');

Route::resource('agences', 'AgenceAPIController');

Route::resource('transporteurs', 'TransporteurAPIController');

Route::resource('petroliers', 'PetrolierAPIController');

Route::resource('stations', 'StationAPIController');

Route::resource('pompistes', 'PompisteAPIController');

Route::resource('categories', 'CategorieAPIController');

Route::resource('produits', 'ProduitAPIController');

Route::resource('cuves', 'CuveAPIController');

Route::resource('pompes', 'PompeAPIController');

Route::resource('engin_marques', 'EnginMarqueAPIController');

Route::resource('engin_modeles', 'EnginModeleAPIController');