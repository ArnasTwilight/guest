<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('guests', \App\Http\Controllers\GuestController::class, ['only' => ['index', 'show', 'store', 'update', 'destroy']]);
