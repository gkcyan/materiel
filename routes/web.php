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


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');


Route::resource('users', 'UserController')->middleware('auth');

// Route qui permet de connaître la langue active
Route::get('locale', 'LocalizationController@getLang');

// Route qui permet de modifier la langue
Route::get('locale/{lang}', 'LocalizationController@setLang');




Route::resource('sites', 'siteController')->middleware('auth');

Route::resource('roles', 'roleController');

Route::resource('permissions', 'PermissionController');

Route::resource('roleUsers', 'RoleUserController');

Route::resource('permissionUsers', 'PermissionUserController');

Route::resource('permissionRoles', 'PermissionRoleController');