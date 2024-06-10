<?php

use App\Http\Controllers\adminActivitiesController;
use App\Http\Controllers\muipActivitiesController;
use App\Http\Controllers\teacherActivitiesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('tempt/template');
    //return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/resources/views/KAFAactivities/listActivitiesAdmin', [adminActivitiesController::class, 'listActivitiesAdmin'])->name('listActivitiesAdmin');
Route::get('/resources/views/KAFAactivities/addActivities', [adminActivitiesController::class, 'create'])->name('create');
Route::post('/resources/views/KAFAactivities/store', [adminActivitiesController::class, 'store'])->name('store');
Route::get('/resources/views/KAFAactivities/{id}/editActivities', [adminActivitiesController::class, 'editActivities'])->name('editActivities');
Route::put('/resources/views/KAFAactivities/{id}', [adminActivitiesController::class, 'update'])->name('update');
Route::delete('/resources/views/KAFAactivities/{id}', [adminActivitiesController::class, 'destroy'])->name('destroy');
Route::get('/resources/views/KAFAactivities/viewActivities/{id}', [adminActivitiesController::class, 'show'])->name('show');
Route::put('/resources/views/KAFAactivities/approve/{id}', [AdminActivitiesController::class, 'approve'])->name('approveActivity');
Route::delete('/resources/views/KAFAactivities/reject/{id}', [AdminActivitiesController::class, 'reject'])->name('rejectActivity');

Route::get('/resources/views/KAFAactivities/verifyActivities', [muipActivitiesController::class, 'verifyActivities'])->name('verifyActivities');
Route::put('/resources/views/KAFAactivities/approve/{id}', [muipActivitiesController::class, 'approve'])->name('approve');
Route::delete('/resources/views/KAFAactivities/reject/{id}', [muipActivitiesController::class, 'reject'])->name('reject');
Route::put('/resources/views/KAFAactivities/change/{id}', [muipActivitiesController::class, 'change'])->name('change');
Route::get('/resources/views/KAFAactivities/viewActivities/{id}', [muipActivitiesController::class, 'show'])->name('show');

Route::get('/resources/views/KAFAactivities/viewListTeacher', [teacherActivitiesController::class, 'viewListTeacher'])->name('viewListTeacher');
Route::get('/resources/views/KAFAactivities/viewActivities/{id}', [teacherActivitiesController::class, 'show'])->name('show');

/*Route::prefix('admin')->group(function () {
    Route::get('/activities', [AdminActivitiesController::class, 'listActivitiesAdmin'])->name('admin.listActivitiesAdmin');
    Route::get('/activities/create', [AdminActivitiesController::class, 'create'])->name('admin.createActivity');
    Route::post('/activities', [AdminActivitiesController::class, 'store'])->name('admin.storeActivity');
    Route::get('/activities/{id}/edit', [AdminActivitiesController::class, 'edit'])->name('admin.editActivity');
    Route::put('/activities/{id}', [AdminActivitiesController::class, 'update'])->name('admin.updateActivity');
    Route::delete('/activities/{id}', [AdminActivitiesController::class, 'destroy'])->name('admin.destroyActivity');
});*/