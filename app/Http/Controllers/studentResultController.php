<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentRegistration;
use App\Models\StudentResult;

class StudentResultController extends Controller
{
    public function viewResult($User_ID)
    {
        // Fetch student registration data
        $student = StudentRegistration::where('User_ID', $User_ID)->firstOrFail();

        // Fetch student result data
        $results = StudentResult::where('SR_Student_ID', $User_ID)->get();

        // Pass the data to the view
        return view('manageStudentResult.student.viewresult_std', [
            'User_ID' => $User_ID,
            'student' => $student,
            'results' => $results
        ]);
    }
}
