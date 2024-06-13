<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KafaAdmin;
use Illuminate\Support\Facades\DB;
use App\Models\StudentRegistration;

class KafaController extends Controller
{
    public function dashboard($User_ID){

       // Retrieve the admin details
      $admin = KafaAdmin::where('User_ID', $User_ID)->firstOrFail();
        
      // Pass the role and User_ID to the view
        return view('tempt.admintempt', compact('User_ID', 'admin'));
    }

    //register student
public function registerStudent($User_ID){
    //show registration form
    return view('manageprofile.AdminRegisterStudent', compact('User_ID'));
}

    //show list of student
    public function studentList($User_ID){
        // Retrieve student info from database
        $students = DB::select('select * from student_registration');

        //view student list
        return view('manageprofile.AdminStudentList', compact('User_ID', 'students'));
        
    }
}
