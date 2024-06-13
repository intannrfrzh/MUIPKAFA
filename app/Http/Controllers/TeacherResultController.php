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

    //create a query to join student_registration and student_result table
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
    return view('manageStudentResult.teacher.teacher_resultstdlist', compact('User_ID', 'list'));
}


public function showStudentResults($User_ID, $studentId)
{
    // Retrieve the student details
    $student = StudentRegistration::where('User_ID', $studentId)->firstOrFail();

    
    //join table student_result and subject
    $results = DB::table('student_result')
            ->leftJoin('subject', 'student_result.S_Subject_ID', '=', 'subject.S_Subject_ID')
            ->leftJoin('student_registration', 'student_result.SR_Student_ID', '=', 'student_registration.User_ID')
            ->where('student_result.SR_Student_ID', $student->User_ID)
            ->select('student_result.S_Subject_ID', 'student_result.R_Result_grade', 'subject.S_Subject_name', 'student_registration.SR_Student_Name')
    ->get();
    
    /*
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

     // Retrieve the teacher details based on User_ID
     $teacher = DB::table('teachers')->where('User_ID', $User_ID)->first();

     return view('manageStudentResult.teacher.teacher_addresult', compact('User_ID', 'student', 'subjects', 'teacher'));
}

    // Save the result
    public function saveResult(Request $request, $User_ID, $studentId)
    {
        // Assuming `User_ID` is the foreign key in `teacher` table
        $teacherId = $User_ID; // Using the User_ID as Teacher_ID

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

    // Method to show the form for editing a student's result
    public function editResult($User_ID, $studentId)
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
        return view('manageStudentResult.teacher.teacher_updtresult', compact('User_ID', 'student', 'results'));
    }

    // Method to handle the form submission for updating the result
    public function updateResults(Request $request, $User_ID, $studentId)
    {
        // Validate incoming data
        $validatedData = $request->validate([
            'grades.*' => 'required|string', // Assuming grades are string values with max length of 2
        ]);

        // Update each subject's grade
        foreach ($validatedData['grades'] as $subjectId => $grade) {
            DB::table('student_result')
                ->where('SR_Student_ID', $studentId)
                ->where('S_Subject_ID', $subjectId)
                ->update(['R_Result_grade' => $grade]);
        }

        // Redirect back with a success message
        return redirect()->route('teacher.viewresult', ['User_ID' => $User_ID, 'studentId' => $studentId])
            ->with('success', 'Results updated successfully!');
    }

    public function deleteResult($User_ID, $studentId, $subjectId)
{
    // Find and delete the result
    $result = StudentResult::where('SR_Student_ID', $studentId)
                           ->where('S_Subject_ID', $subjectId)
                           ->firstOrFail();

    $result->delete();

    return redirect()->route('teacher.viewresult', ['User_ID' => $User_ID, 'studentId' => $studentId])
                     ->with('success', 'Result deleted successfully.');
}

    

//end of controller
}


