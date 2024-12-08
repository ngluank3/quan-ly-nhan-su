<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaoHiemController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('baoHiem', BaoHiemController::class);