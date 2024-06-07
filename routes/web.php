<?php

use App\Http\Controllers\adminActivitiesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('tempt/template');
    //return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/resources/views/KAFAactivities/viewActivitiesAdmin', [adminActivitiesController::class, 'viewActivitiesAdmin'])->name('viewActivitiesAdmin');
