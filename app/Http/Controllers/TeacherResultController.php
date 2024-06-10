<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//model used
use App\Models\StudentResult;
use App\Models\StudentRegistration;
use App\Models\Subject;

class TeacherResultController extends Controller
{
    //show list of student
    public function showResultsList($User_ID)
{
    // Fetch all students
    $students = StudentRegistration::all();

    $subjectCode = 'UPKK01';
    $results = [];

    foreach ($students as $student) {
        // Fetch results for the specific subject
        $studentResults = StudentResult::where('SR_Student_ID', $student->User_ID)
                                        ->where('S_Subject_ID', $subjectCode)
                                        ->get();


        // Debugging logs to verify data
    \Log::info('Students:', $students->toArray());
    \Log::info('Results:', $results);

    
        // Check if there are any results and add them to the results array
        if ($studentResults->isNotEmpty()) {
            $results[$student->User_ID] = $studentResults;
        } else {
            $results[$student->User_ID] = null;  // Set null if no results are found
        }
    }

    // Pass the data to the view
    return view('manageStudentResult.teacher.teacher_resultstdlist', [
        'User_ID' => $User_ID,
        'students' => $students,
        'results' => $results,
        'subjectCode' => $subjectCode
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
    
    // Add result form
    public function addResultForm($User_ID, $studentId)
    {
        // Fetch the student details
        $student = StudentRegistration::where('User_ID', $studentId)->firstOrFail();

        // Fetch all subjects
        $subjects = Subject::all();

        // Debugging log to verify student and subjects
        \Log::info('Student:', $student->toArray());
        \Log::info('Subjects:', $subjects->toArray());

        return view('manageStudentResult.teacher.teacher_addresult', [
           'User_ID' => $User_ID,
            'student' => $student,
            'subjects' => $subjects,
        ]);
    }

    // Store result
public function storeResult(Request $request, $User_ID)
{
    $validated = $request->validate([
        'SR_Student_ID' => 'required',
        'R_Result_grade' => 'required',
        'S_Subject_ID' => 'required'
    ]);

    $result = new StudentResult($validated);
    $result->save();

    return redirect()->route('teacher.resultslist', ['User_ID' => $User_ID])->with('success', 'Result added successfully.');
}

}


