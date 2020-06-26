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

Route::resource('engin_types', 'EnginTypeAPIController');

Route::resource('engins', 'EnginAPIController');

Route::resource('processes', 'ProcessAPIController');

Route::resource('activites', 'ActiviteAPIController');

Route::resource('chauffeurs', 'ChauffeurAPIController');

Route::resource('chauffeur_permis', 'ChauffeurPermiAPIController');

Route::resource('engin_kilometrages', 'EnginKilometrageAPIController');

Route::resource('vente_petroliers', 'VentePetrolierAPIController');

Route::resource('produit_prixes', 'ProduitPrixAPIController');

Route::resource('bascules', 'BasculeAPIController');

Route::resource('type_zones', 'TypeZoneAPIController');

Route::resource('zone_collectes', 'ZoneCollecteAPIController');





Route::resource('bareme_transports', 'BaremeTransportAPIController');

Route::resource('bascule_datas', 'BasculeDataAPIController');

Route::resource('bareme_penalite_transports', 'BaremePenaliteTransportAPIController');

Route::resource('type_fournisseurs', 'TypeFournisseurAPIController');

Route::resource('type_accomptes', 'TypeAccompteAPIController');

Route::resource('fournisseurs', 'FournisseurAPIController');

Route::resource('accomptes', 'AccompteAPIController');

Route::resource('factures', 'FactureAPIController');

Route::resource('carburant_factures', 'CarburantFactureAPIController');

Route::resource('facture_tickets', 'FactureTicketAPIController');

Route::resource('accompte_factures', 'AccompteFactureAPIController');