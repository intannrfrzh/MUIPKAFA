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
Route::get('/resources/views/KAFAactivities/addActivities', [adminActivitiesController::class, 'create'])->name('create');
Route::post('/resources/views/KAFAactivities/editActivities/{id}', [adminActivitiesController::class, 'edit'])->name('edit');
Route::post('/resources/views/KAFAactivities/updateActivities/{id}', [adminActivitiesController::class, 'update'])->name('update');
Route::get('/resources/views/KAFAactivities/deleteActivities/{id}', [adminActivitiesController::class, 'destroy'])->name('destroy');

/*Route::prefix('admin')->group(function () {
    Route::get('/activities', [AdminActivitiesController::class, 'viewActivitiesAdmin'])->name('admin.viewActivitiesAdmin');
    Route::get('/activities/create', [AdminActivitiesController::class, 'create'])->name('admin.createActivity');
    Route::post('/activities', [AdminActivitiesController::class, 'store'])->name('admin.storeActivity');
    Route::get('/activities/{id}/edit', [AdminActivitiesController::class, 'edit'])->name('admin.editActivity');
    Route::put('/activities/{id}', [AdminActivitiesController::class, 'update'])->name('admin.updateActivity');
    Route::delete('/activities/{id}', [AdminActivitiesController::class, 'destroy'])->name('admin.destroyActivity');
});*/