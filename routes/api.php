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

//---------------------------------------------------------------------------

    //Routes
Route::namespace('Api')->group( function(){
    Route::post('/clients/add', [App\Http\Controllers\Api\ClientsController::class, 'add'])->name('/clients/add');
    Route::get('/clients', [App\Http\Controllers\Api\ClientsController::class, 'list'])->name('/clients');
    Route::get('/clients/{id}', [App\Http\Controllers\Api\ClientsController::class, 'select'])->name('/clients');
    Route::put('/clients/{id}', [App\Http\Controllers\Api\ClientsController::class, 'update'])->name('/clients');
    Route::delete('/clients/{id}', [App\Http\Controllers\Api\ClientsController::class, 'delete'])->name('/clients');

});