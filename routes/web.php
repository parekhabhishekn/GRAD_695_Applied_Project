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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users', 'UsersController@index')->name('users');
Route::get('/users-list', 'UsersController@list')->name('users.list');

Route::get('/integration', 'IntegrationController@index')->name('integration');
Route::get('/integrations/{user}', 'IntegrationController@integrations')->name('integrations.show');
Route::get('/registerintegration', 'UsersController@registerintegration')->name('integration.register');
Route::post('/addintegration', 'IntegrationController@create')->name('integration.add');

Route::get('/integration/{integration}', 'UsersController@registerintegration')->name('integration.view');

Route::get('/monitor', 'MonitorController@index')->name('monitor.index'); 

Route::get('/alerts', 'AlertController@index')->name('alert.index');
Route::get('/alerts-setup', 'AlertController@AlertSetup')->name('alert.setup'); 
Route::post('/addalert', 'AlertController@create')->name('alert.add');
