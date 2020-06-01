<?php

namespace App\Providers;
use App\Models\EnginType;
use App\Models\EnginModele;
use App\Models\EnginMarque;

use App\Models\Cuve;

use App\Models\Produit;

use App\Models\Categorie;

use App\Models\Station;
use App\Models\Petrolier;
use App\Models\Entreprise;

use Illuminate\Support\ServiceProvider;
use View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['engins.fields'], function ($view) {
            $produitItems = Produit::pluck('produit','id')->toArray();
            $view->with('produitItems', $produitItems);
        });
        View::composer(['engins.fields'], function ($view) {
            $engin_typeItems = EnginType::pluck('type','id')->toArray();
            $view->with('engin_typeItems', $engin_typeItems);
        });
        View::composer(['engins.fields'], function ($view) {
            $engin_modeleItems = EnginModele::pluck('modele','id')->toArray();
            $view->with('engin_modeleItems', $engin_modeleItems);
        });
        View::composer(['engins.fields'], function ($view) {
            $engin_marqueItems = EnginMarque::pluck('marque','id')->toArray();
            $view->with('engin_marqueItems', $engin_marqueItems);
        });
        View::composer(['engin_modeles.fields'], function ($view) {
            $engin_marqueItems = EnginMarque::pluck('marque','id')->toArray();
            $view->with('engin_marqueItems', $engin_marqueItems);
        });
        View::composer(['pompes.fields'], function ($view) {
            $cufeItems = Cuve::pluck('cuve','id')->toArray();
            $view->with('cufeItems', $cufeItems);
        });
        View::composer(['pompes.fields'], function ($view) {
            $produitItems = Produit::pluck('produit','id')->toArray();
            $view->with('produitItems', $produitItems);
        });
        View::composer(['pompes.fields'], function ($view) {
            $stationItems = Station::pluck('station','id')->toArray();
            $view->with('stationItems', $stationItems);
        });
        View::composer(['cuves.fields'], function ($view) {
            $produitItems = Produit::pluck('produit','id')->toArray();
            $view->with('produitItems', $produitItems);
        });
        View::composer(['cuves.fields','pompistes.fields'], function ($view) {
            $stationItems = Station::pluck('station','id')->toArray();
            $view->with('stationItems', $stationItems);
        });
        View::composer(['produits.fields'], function ($view) {
            $categoryItems = Categorie::pluck('categorie','id')->toArray();
            $view->with('categoryItems', $categoryItems);
        });
        
        View::composer(['stations.fields'], function ($view) {
            $petrolierItems = Petrolier::pluck('petrolier','id')->toArray();
            $view->with('petrolierItems', $petrolierItems);
        });
        View::composer(['agences.fields'], function ($view) {
            $entrepriseItems = Entreprise::pluck('libelle','id')->toArray();
            $view->with('entrepriseItems', $entrepriseItems);
        });
        //
    }
}