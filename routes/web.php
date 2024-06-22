<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
//use Illuminate\Support\Facades\Auth;

//module controller
use App\Http\Controllers\KafaController;
use App\Http\Controllers\MuipController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;

//activities controller
use App\Http\Controllers\adminActivitiesController;
use App\Http\Controllers\muipActivitiesController;
use App\Http\Controllers\teacherActivitiesController;
use App\Http\Controllers\studentActivitiesController;

//result controller
use App\Http\Controllers\adminResultController;
use App\Http\Controllers\MuipResultController;
use App\Http\Controllers\TeacherResultController;
use App\Http\Controllers\StudentResultController;



//register routes
//Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
//Route::post('register', [RegisteredUserController::class, 'store'])->middleware('setUserIdInSession');
//Route::post('register', [RegisteredUserController::class, 'store'])->middleware('setUserIdInSession');

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
        
        //manage profile
        Route::get('admin/home/viewStudentList/{User_ID}', [KafaController::class, 'studentList'])->name('admin.studentList');
        Route::get('admin/home/viewStudentProfile/{User_ID}/{studentId}', [KafaController::class, 'viewStudentProfile'])->name('admin.studentProfile');
        Route::get('/admin/student-profile/edit/{User_ID}/{studentId}', [KafaController::class, 'editStudentProfile'])->name('admin.editStudentProfile');
        Route::post('/admin/student-profile/update/{User_ID}/{studentId}', [KafaController::class, 'updateStudentProfile'])->name('admin.updateStudentProfile');
        //student registration
        Route::get('/admin/registerStudent/{User_ID}', [KafaController::class, 'registerUserForm'])->name('admin.registerFormUser');
        Route::post('/admin/storeUser/{User_ID}', [KafaController::class, 'storeUser'])->name('admin.storeUser');
        Route::get('/admin/registerStudent/{User_ID}/{studentId}', [KafaController::class, 'registerStudentForm'])->name('admin.registerFormStudent');
        Route::post('/admin/storeStudentDetails', [KafaController::class, 'storeStudentDetails'])->name('admin.storeStudentDetails');

         // Activities admin routes
         Route::get('/admin/activities/{User_ID}', [adminActivitiesController::class, 'listActivitiesAdmin'])->name('listActivitiesAdmin');
         Route::get('/admin/activities/{User_ID}/create', [adminActivitiesController::class, 'create'])->name('create');
         Route::post('/admin/activities/store', [adminActivitiesController::class, 'store'])->name('store');
         Route::get('/admin/activities/{id}/edit', [adminActivitiesController::class, 'editActivities'])->name('editActivities');
         Route::put('/admin/activities/{id}', [adminActivitiesController::class, 'update'])->name('update');
         Route::delete('/admin/activities/{id}', [adminActivitiesController::class, 'destroy'])->name('destroy');
         Route::get('/admin/activities/{id}/{User_ID}', [adminActivitiesController::class, 'show'])->name('activities.show');
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

        //manage profile muip routes
        Route::get('muip/home/viewStudentList/{User_ID}', [MuipController::class, 'studentList'])->name('muip.studentList');
        Route::get('muip/home/viewStudentProfile/{User_ID}/{studentId}', [MuipController::class, 'viewStudentProfile'])->name('muip.studentProfile');

       //activities muip routes
       Route::get('/muip/activities/{User_ID}', [muipActivitiesController::class, 'verifyActivities'])->name('verifyActivities');
       Route::get('/muip/activities/{id}/{User_ID}', [muipActivitiesController::class, 'show'])->name('muip.show');
       Route::put('/muip/activities/approve/{id}', [muipActivitiesController::class, 'approve'])->name('approve');
       Route::delete('/muip/activities/reject/{id}', [muipActivitiesController::class, 'reject'])->name('reject');
       Route::put('/muip/activities/change/{id}', [muipActivitiesController::class, 'change'])->name('change');

       // Result muip routes
       Route::get('/muip/results/{User_ID}', [MuipResultController::class, 'showResultsList'])->name('muip.resultslist');
        Route::get('/muip/results/{User_ID}/{studentId}', [MuipResultController::class, 'showStudentResults'])->name('muip.viewresult');
   });

        // Teacher Routes
        Route::middleware(['role:teacher'])->group(function () {
        Route::get('teacher/home/{User_ID}', [TeacherController::class, 'dashboard'])->name('teacher.home');

        //manage profile muip routes
        Route::get('teacher/home/viewStudentList/{User_ID}', [TeacherController::class, 'studentList'])->name('teacher.studentList');
        Route::get('teacher/home/viewStudentProfile/{User_ID}/{studentId}', [TeacherController::class, 'viewStudentProfile'])->name('teacher.studentProfile');

        // Teacher Activities Route
        Route::get('/teacher/activities/{User_ID}', [teacherActivitiesController::class, 'viewListTeacher'])->name('viewListTeacher');
        Route::get('/teacher/activities/view/{id}', [teacherActivitiesController::class, 'show'])->name('teacher.show');

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
            
            return app(StudentController::class)->dashboard($User_ID);
        })->name('student.home');

        // Student Profile Route
        Route::get('/profile/{User_ID}', [StudentController::class, 'viewProfile'])->name('viewProfile');

        // Student Activities Route
        Route::get('/student/activities{User_ID}', [studentActivitiesController::class, 'viewListStudent'])->name('viewListStudent');
        Route::get('/student/activities/{id}', [studentActivitiesController::class, 'show'])->name('student.show');

        // Student Result Route
        Route::get('/result/{User_ID}', [StudentResultController::class, 'viewResult'])->name('student.result');
    });
});

// Logout Route
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
