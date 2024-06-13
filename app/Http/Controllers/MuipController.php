<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\JaipAdmin;

class MuipController extends Controller
{
    public function dashboard($User_ID){

      // Retrieve the muip details
      $muip = JaipAdmin::where('User_ID', $User_ID)->firstOrFail();

      // Pass the role and User_ID to the view
        return view('tempt.muiptempt', compact('User_ID', 'muip'));
      }

      //show list of student
    public function studentList($User_ID)
    {
        $students = DB::select('select * from student_registration');
        return view('manageprofile.MuipStudentList', compact('User_ID', 'students'));
    }

    //view specific profile
    public function viewStudentProfileMuip($User_ID, $studentId)
    {
        $student = DB::table('student_registration')
                 ->where('User_ID', $studentId)
                 ->first();

    if (!$student) {
        // Handle case when student is not found
        return redirect()->route('muip.studentList', ['User_ID' => $User_ID])->with('error', 'Student not found.');
    }

    return view('manageprofile.MuipViewStudent', compact('User_ID', 'student'));
    }
}


