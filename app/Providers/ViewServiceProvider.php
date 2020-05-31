<?php

namespace App\Providers;
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
        View::composer(['pompistes.fields'], function ($view) {
            $stationItems = Station::pluck('station','id')->toArray();
            $view->with('stationItems', $stationItems);
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