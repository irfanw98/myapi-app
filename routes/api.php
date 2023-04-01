<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

//api/v1
Route::group([
    'prefix' => 'v1',
    'namespace' => 'App\Http\Controllers\Api\V1'
], function() {

    Route::post('/register', 'AuthController@register')->name('register');
    Route::post('/login', 'AuthController@login')->name('login');

    Route::group(['middleware' => ['auth:sanctum']], function () {
        //Cek User Siapa Yang Sedang Login
        Route::get('user', function(Request $request) {
            return $request->user();
        });
        Route::apiResource('users', UserController::class);
        Route::apiResource('quotes', QuoteController::class);
        Route::apiResource('tags', TagController::class);
        Route::post('/logout', 'AuthController@logout')->name('logout');
    });
});