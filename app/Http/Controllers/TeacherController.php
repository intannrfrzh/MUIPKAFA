<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

//model used
use App\Models\StudentResult;
use App\Models\StudentRegistration;
use App\Models\Teacher;


class TeacherController extends Controller
{
    public function dashboard($User_ID){

        // Retrieve the teacher details
      $teacher = Teacher::where('User_ID', $User_ID)->firstOrFail();

        // Pass the role and User_ID to the view
        return view('tempt.teachertempt', compact('User_ID', 'teacher'));
    }

    //show list of student
    public function showResultsList($User_ID)
    {
        // Fetch student registration data
        $students = StudentRegistration::all();

        // Pass the data to the view
        return view('manageStudentResult.teacher.teacher_resultstdlist', [
            'User_ID' => $User_ID,
            'students' => $students
        ]);
    }

    // Show specific student results
    public function showStudentResults($User_ID, $studentId)
    {
        $student = StudentRegistration::where('User_ID', $studentId)->firstOrFail();
        $results = StudentResult::where('SR_Student_ID', $student->User_ID)->get();
    
        // Debugging logs
        Log::info('Student:', [$student]);
        Log::info('Results:', $results->toArray());

        return view('manageStudentResult.teacher.teacher_viewresult', compact('User_ID','student', 'results'));
    }  
    
    //show list of student
    public function studentList($User_ID)
    {
        $students = DB::select('select * from student_registration');
        return view('manageprofile.TeacherStudentList', compact('User_ID', 'students'));
    }

    //view specific profile
    public function viewStudentProfile($User_ID, $studentId)
    {
        $student = DB::table('student_registration')
                 ->where('User_ID', $studentId)
                 ->first();

    if (!$student) {
        // Handle case when student is not found
        return redirect()->route('teacher.studentList', ['User_ID' => $User_ID])->with('error', 'Student not found.');
    }

    return view('manageprofile.TeacherViewStudent', compact('User_ID', 'student'));
    }

}
