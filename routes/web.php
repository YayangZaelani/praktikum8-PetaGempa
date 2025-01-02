<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\BerandaController;
use App\Http\Controllers\PetaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/beranda', function () {
    return view('beranda');
});

route::get('/gempa', function () {
    return view('gempa');
});

Route::get('/peta',[PetaController::class, 'index']);