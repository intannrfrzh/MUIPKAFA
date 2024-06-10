<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

//model used
use App\Models\StudentResult;
use App\Models\StudentRegistration;


class TeacherController extends Controller
{
    public function dashboard($User_ID){
        // Pass the role and User_ID to the view
        return view('tempt.teachertempt', compact('User_ID'));
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
        \Log::info('Student:', [$student]);
        \Log::info('Results:', $results->toArray());

        return view('manageStudentResult.teacher.teacher_viewresult', compact('User_ID','student', 'results'));
    }       

}
