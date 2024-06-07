<?php

use App\Http\Controllers\studentResultController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('tempt/template');
    //return view('welcome');
});

Route::get('/resources/views/manageStudentResult/student/viewresult_std', [studentResultController::class, 'viewResult'])->name('student.result');


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
