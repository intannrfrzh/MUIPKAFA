<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

//module controller
use App\Http\Controllers\KafaController;
use App\Http\Controllers\MuipController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;

//activities controller
use App\Http\Controllers\adminActivitiesController;
use App\Http\Controllers\muipActivitiesController;
use App\Http\Controllers\teacherActivitiesController;

//result controller
use App\Http\Controllers\adminResultController;
use App\Http\Controllers\MuipResultController;
use App\Http\Controllers\TeacherResultController;
use App\Http\Controllers\StudentResultController;



//register routes
Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store'])->middleware('setUserIdInSession');

// Login routes
require __DIR__.'/auth.php';

// Home route
Route::get('/', function () {
    return view('tempt.home');
});

// Role-based routes
Route::middleware(['auth'])->group(function () {
    // kafa Admin Routes
    Route::middleware(['role:K_admin'])->group(function () {
        Route::get('admin/home/{User_ID}', [KafaController::class, 'dashboard'])->name('admin.home');
        
         // Activities admin routes
         Route::get('/admin/activities', [adminActivitiesController::class, 'listActivitiesAdmin'])->name('listActivitiesAdmin');
         Route::get('/admin/activities/create', [adminActivitiesController::class, 'create'])->name('create');
         Route::post('/admin/activities/store', [adminActivitiesController::class, 'store'])->name('store');
         Route::get('/admin/activities/{id}/edit', [adminActivitiesController::class, 'editActivities'])->name('editActivities');
         Route::put('/admin/activities/{id}', [adminActivitiesController::class, 'update'])->name('update');
         Route::delete('/admin/activities/{id}', [adminActivitiesController::class, 'destroy'])->name('destroy');
         Route::get('/admin/activities/{id}', [adminActivitiesController::class, 'show'])->name('show');
         Route::put('/admin/activities/approve/{id}', [adminActivitiesController::class, 'approve'])->name('approveActivity');
         Route::delete('/admin/activities/reject/{id}', [adminActivitiesController::class, 'reject'])->name('rejectActivity');


         // Result admin routes
        Route::get('/admin/results/{User_ID}', [AdminResultController::class, 'showResultsList'])->name('admin.resultslist');
        Route::get('/admin/results/{User_ID}/{studentId}', [AdminResultController::class, 'showStudentResults'])->name('admin.viewresult');
        Route::get('/admin/{User_ID}/student/{studentId}/results', [AdminResultController::class, 'editVerification'])->name('admin.updateInterface');
        Route::put('/admin/update-verification/{User_ID}/{studentId}', [AdminResultController::class, 'updateVerification'])->name('admin.updateVerification');

    });

    //muip admin routes
    Route::middleware(['role:J_admin'])->group(function () {
        Route::get('muip/home/{User_ID}', [MuipController::class, 'dashboard'])->name('muip.home');

       //activities muip routes
       Route::get('/resources/views/KAFAactivities/viewActivities/{id}', [muipActivitiesController::class, 'show'])->name('show');
       Route::get('/resources/views/KAFAactivities/verifyActivities', [muipActivitiesController::class, 'verifyActivities'])->name('verifyActivities');
       Route::put('/resources/views/KAFAactivities/approve/{id}', [muipActivitiesController::class, 'approve'])->name('approve');
       Route::delete('/resources/views/KAFAactivities/reject/{id}', [muipActivitiesController::class, 'reject'])->name('reject');
       Route::put('/resources/views/KAFAactivities/change/{id}', [muipActivitiesController::class, 'change'])->name('change');

       // Result muip routes
       Route::get('/muip/results/{User_ID}', [MuipResultController::class, 'showResultsList'])->name('muip.resultslist');
        Route::get('/muip/results/{User_ID}/{studentId}', [MuipResultController::class, 'showStudentResults'])->name('muip.viewresult');
    });

    // Teacher Routes
    Route::middleware(['role:teacher'])->group(function () {
        Route::get('teacher/home/{User_ID}', [TeacherController::class, 'dashboard'])->name('teacher.home');

        // Teacher Activities Route
        Route::get('/resources/views/KAFAactivities/viewListTeacher', [teacherActivitiesController::class, 'viewListTeacher'])->name('viewListTeacher');
        Route::get('/resources/views/KAFAactivities/viewActivities/{id}', [teacherActivitiesController::class, 'show'])->name('show');

        // Teacher Result Route
        Route::get('/teacher/results/{User_ID}', [TeacherResultController::class, 'showResultsList'])->name('teacher.resultslist');
        Route::get('/teacher/results/{User_ID}/{studentId}', [TeacherResultController::class, 'showStudentResults'])->name('teacher.viewresult');
        Route::get('/teacher/add-result/{User_ID}/{studentId}', [TeacherResultController::class, 'addResultForm'])->name('teacher.addResult');
        Route::post('/teacher/{User_ID}/student/{studentId}/results', [TeacherResultController::class, 'saveResult'])->name('teacher.saveResult');
        Route::get('/teacher/{User_ID}/student/{studentId}/results', [TeacherResultController::class, 'editResult'])->name('teacher.updateInterface');
        Route::put('/teacher/edit-result/{User_ID}/{studentId}', [TeacherResultController::class, 'updateResults'])->name('teacher.updateResult');
        Route::delete('/teacher/{User_ID}/student/{studentId}/result', [TeacherResultController::class, 'deleteResults'])->name('teacher.deleteResults');

    });

    // Student Routes
        Route::middleware(['role:student'])->group(function () {
        Route::get('student/home/{User_ID}', function ($User_ID) {
            \Log::info("Accessing student home for User_ID: " . $User_ID);
            return app(StudentController::class)->dashboard($User_ID);
        })->name('student.home');

        // Student Result Route
        Route::get('/result/{User_ID}', [StudentResultController::class, 'viewResult'])->name('student.result');
    });
});

// Logout Route
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
