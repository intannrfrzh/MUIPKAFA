<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//model used
use App\Models\StudentResult;
use App\Models\StudentRegistration;
use App\Models\Subject;

class TeacherResultController extends Controller
{
    //show list of student
    public function showResultsList($User_ID)
{
    //$students = StudentRegistration::all();
    //$subjectCode = 'UPKK01';
    //$results = [];

    $list = DB::table('student_registration')
        ->leftJoin('student_result', function($join) {
            $join->on('student_registration.User_ID', '=', 'student_result.SR_Student_ID')
                 ->where('student_result.S_Subject_ID', 'UPKK01')
                 ->orWhereNull('student_result.S_Subject_ID');
        })
        ->leftJoin('subject', 'student_result.S_Subject_ID', '=', 'subject.S_Subject_ID')
        ->select(
            'student_registration.User_ID',
            'student_registration.SR_Student_Name',
            'student_result.R_Result_Verfication',
            'subject.S_Subject_name'
        )
        ->get();
    return view('manageStudentResult.teacher.teacher_resultstdlist', compact('User_ID', 'list'));
}


// Show specific student results
public function showStudentResults($User_ID, $studentId)
{
    $student = StudentRegistration::where('User_ID', $studentId)->firstOrFail();
    $results = StudentResult::where('SR_Student_ID', $student->User_ID)
                            ->with('subject') // Eager load the subject relation
                            ->get();

    // Debugging logs
    \Log::info('Student:', [$student]);
    \Log::info('Results:', $results->toArray());

    return view('manageStudentResult.teacher.teacher_viewresult', compact('User_ID', 'student', 'results'));
}


// Add result form
public function addResultForm($User_ID, $studentId)
{
    // Retrieve the student details
    $student = DB::table('student_registration')
        ->where('User_ID', $studentId)
        ->first();
    
    // Retrieve the list of subjects
    $subjects = DB::table('subject')
        ->leftJoin('student_result', function($join) use ($studentId) {
            $join->on('subject.S_Subject_ID', '=', 'student_result.S_Subject_ID')
                 ->where('student_result.SR_Student_ID', '=', $studentId);
        })
        ->select('subject.S_Subject_ID', 'subject.S_Subject_name', 'student_result.R_Result_grade')
        ->get();

    return view('manageStudentResult.teacher.teacher_addresult', compact('User_ID', 'student', 'subjects'));
}

// Save the result
public function saveResult(Request $request, $User_ID, $studentId)
{
    $teacherId = auth()->user()->User_ID; // Get the authenticated teacher ID
    $subjects = $request->input('subjects');
    
    foreach ($subjects as $subject) {
        StudentResult::updateOrCreate(
            [
                'SR_Student_ID' => $studentId,
                'S_Subject_ID' => $subject['id']
            ],
            [
                'R_Result_grade' => $subject['grade'],
                'T_Teacher_ID' => $teacherId // Include the teacher ID
            ]
        );
    }

    return redirect()->route('teacher.resultslist', ['User_ID' => $User_ID])
                     ->with('success', 'Results saved successfully.');
}

    

//end of controller
}


