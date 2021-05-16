<?php

use Illuminate\Http\Request;

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
Route::get('/offres', 'OffreController@index');
Route::get('/offres/{id}', 'OffreController@show');
Route::post('/offres', 'OffreController@store');
Route::delete('/offres/{id}', 'OffreController@delete');
Route::put('/offres/{id}', 'OffreController@edit');
Route::get('/offres/{nameoffre}', 'OffreController@findbyname');

