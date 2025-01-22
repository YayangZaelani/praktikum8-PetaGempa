<?php

// use App\Http\Controllers\BerandaController;
use App\Http\Controllers\PetaController;
use App\Http\Controllers\RegencyController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/beranda', function () {
    return view('beranda');
});

route::get('/gempa', function () {
    return view('gempa');
});

Route::get('/peta',[PetaController::class, 'index']);

Route::get('/',[RegencyController::class, 'index']);

route::get('/layout', function () {
    return view('layout');
});

Route::get('/kepadatan',[RegencyController::class, 'show']);

Route::get('/kawin',[RegencyController::class, 'kawin']);

Route::get('/gdp',[RegencyController::class, 'gdp']);

route::get('/provinsi', function () {
    return view('provinsi');
});

Route::get('/provinsi',[PetaController::class, 'provinsi']);

Route::get('/kabkota',[PetaController::class, 'kabkota']);