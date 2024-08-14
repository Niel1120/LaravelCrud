<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

// Route::get('/', function () {
//     return view('index');
// });
Route::controller(DataController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/register', 'register')->name('register');
    Route::post('/registerCreate', 'registerCreate')->name('registerCreate');
});
