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

Route::resource('rooms', 'RoomsController', ['only' => [
    'index', 'store', 'show', 'update', 'destroy'
]]);

Route::resource('extras', 'ExtrasController', ['only' => [
    'index', 'store', 'show', 'update', 'destroy'
]]);

Route::resource('seasons', 'SeasonsController', ['only' => [
    'index', 'store', 'show', 'update', 'destroy'
]]);

Route::resource('reservations', 'ReservationsController', ['only' => [
    'index', 'store', 'show', 'update', 'destroy'
]]);
