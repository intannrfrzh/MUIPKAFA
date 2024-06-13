<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//model used
use App\Models\StudentResult;
use App\Models\StudentRegistration;
use App\Models\Subject;

class adminResultController extends Controller
{
    //show list of student
    public function showResultsList($User_ID)
{

    //create a query to join student_registration and student_result table
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
    return view('manageStudentResult.admin.kafa_resultstdlist', compact('User_ID', 'list'));
}

//show specific student result
public function showStudentResults($User_ID, $studentId)
{
    // Retrieve the student details
    $student = StudentRegistration::where('User_ID', $studentId)->firstOrFail();

    // Create the join query for specific student results
    $results = DB::table('student_registration')
        ->leftJoin('student_result', function($join) use ($studentId) {
            $join->on('student_registration.User_ID', '=', 'student_result.SR_Student_ID')
                 ->where('student_result.SR_Student_ID', '=', $studentId);
        })
        ->leftJoin('subject', 'student_result.S_Subject_ID', '=', 'subject.S_Subject_ID')
        ->select(
            'student_registration.User_ID',
            'student_registration.SR_Student_Name',
            'student_result.S_Subject_ID',
            'student_result.R_Result_grade',
            'subject.S_Subject_name'
        )
        ->where('student_registration.User_ID', '=', $studentId)
        ->get();

    // Debugging logs
    \Log::info('Student:', [$student]);
    \Log::info('Results:', $results->toArray());

    return view('manageStudentResult.admin.kafa_viewresult', compact('User_ID', 'student', 'results'));
}


    // Method to show the form for updating a student's result verification
    public function editVerification($User_ID, $studentId)
    {
        $student = DB::table('student_registration')
            ->where('User_ID', $studentId)
            ->first();

        // Retrieve the list of subjects
        $results = DB::table('subject')
            ->leftJoin('student_result', function($join) use ($studentId) {
                $join->on('subject.S_Subject_ID', '=', 'student_result.S_Subject_ID')
                     ->where('student_result.SR_Student_ID', '=', $studentId);
            })
            ->select('subject.S_Subject_ID', 'subject.S_Subject_name', 'student_result.R_Result_grade')
            ->get();

        // Pass the student and results to the view
        return view('manageStudentResult.admin.kafa_verifyresult', compact('User_ID', 'student', 'results'));
    }

    public function updateVerification(Request $request, $User_ID, $studentId)
{
    $action = $request->input('action');

    if ($action == 'verify') {
        // Logic to verify the results
        DB::table('student_result')
            ->where('SR_Student_ID', $studentId)
            ->update(['R_Result_Verfication' => 'VERIFIED']);
        return redirect()->route('admin.resultslist', ['User_ID' => $User_ID])
            ->with('success', 'Results verified successfully.');
    } elseif ($action == 'reject') {
        // Logic to reject the results
        DB::table('student_result')
            ->where('SR_Student_ID', $studentId)
            ->update(['R_Result_Verfication' => 'REJECTED']);
        return redirect()->route('admin.resultslist', ['User_ID' => $User_ID])
            ->with('success', 'Results rejected successfully.');
    }

    return redirect()->route('admin.resultslist', ['User_ID' => $User_ID])
        ->with('error', 'Invalid action.');
}



}
