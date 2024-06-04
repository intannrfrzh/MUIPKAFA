<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('tempt/template');
    //return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
