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

Route::get('/', function () {
    return view('welcome');
});


/*
Route::get('/{locale}', function ($locale) {
    
    App::getLocale();

    return view('welcome');
});
 
*/
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index');

//Route::get('login', 'HomeController@index')->middleware('verified');

Route::resource('users', 'UserController')->middleware('auth');


// Route qui permet de connaître la langue active
Route::get('locale', 'LocalizationController@getLang');

// Route qui permet de modifier la langue
Route::get('locale/{lang}', 'LocalizationController@setLang');


