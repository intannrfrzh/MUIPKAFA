<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\StudentRegistration;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function viewResult($User_ID)
    {
        $student = User::where('User_ID', $User_ID)->firstOrFail();
        $registration = StudentRegistration::where('User_ID', $User_ID)->firstOrFail();
        return view('student.result', compact('student', 'registration'));
    } 

    public function dashboard($User_ID)
    {
        // Fetch the student registration data
        $student = StudentRegistration::where('User_ID', $User_ID)->firstOrFail();

        // Pass the user ID to the view
        return view('tempt.template', ['User_ID' => $User_ID, 'student' => $student]);
    }
}
