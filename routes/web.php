<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CovidController;

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

Route::get('/','CovidController@index');
Route::get('/statindo','CovidController@StatIndo');

Route::get('/update/data/first','CovidController@InsertDataFirst');
Route::get('/data/summary','CovidController@getDataSummary');
Route::get('/data/update','CovidController@DataUpdate');
Route::get('/data/global/update','CovidController@updateGlobalSummary');
Route::get('/frame','CovidController@getFrame');



Route::get('/data/indocase','CovidController@IndoCase');
Route::get('/data/globalcase','CovidController@GlobalCase');

Route::get('/info/{country}',function($country){


    return CovidController::InfoCountry($country);

});

Route::get('/json/{country}',function($country){


    return CovidController::DynamicCase($country);

});