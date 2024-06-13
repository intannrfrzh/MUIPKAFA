<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KafaAdmin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\StudentRegistration;
use App\Models\User;

class KafaController extends Controller
{
    public function dashboard($User_ID)
    {
        $admin = KafaAdmin::where('User_ID', $User_ID)->firstOrFail();
        return view('tempt.admintempt', compact('User_ID', 'admin'));
    }

    //show list of student
    public function studentList($User_ID)
    {
        $students = DB::select('select * from student_registration');
        return view('manageprofile.AdminStudentList', compact('User_ID', 'students'));
    }

    //view specific profile
    public function viewStudentProfile($User_ID, $studentId)
    {
        $student = DB::table('student_registration')
                 ->where('User_ID', $studentId)
                 ->first();

    if (!$student) {
        // Handle case when student is not found
        return redirect()->route('admin.studentList', ['User_ID' => $User_ID])->with('error', 'Student not found.');
    }

    return view('manageprofile.ViewProfileStudent', compact('User_ID', 'student'));
    }

    public function editStudentProfile($User_ID, $studentId)
{
    $student = DB::table('student_registration')
                 ->where('User_ID', $studentId)
                 ->first();

    if (!$student) {
        return redirect()->route('admin.studentList', ['User_ID' => $User_ID])->with('error', 'Student not found.');
    }

    return view('manageprofile.AdminUpdateStudent', compact('User_ID', 'student'));
}

public function updateStudentProfile(Request $request, $User_ID, $studentId)
{
    $request->validate([
        'SR_Student_Name' => 'required|string|max:255',
        'SR_Student_IC' => 'required|string',
        'SR_Student_gender' => 'required|string|in:Male,Female',
        'SR_Student_phone_no' => 'required|string|max:15',
    ]);

    DB::table('student_registration')
        ->where('User_ID', $studentId)
        ->update([
            'SR_Student_Name' => $request->SR_Student_Name,
            'SR_Student_IC' => $request->SR_Student_IC,
            'SR_Student_gender' => $request->SR_Student_gender,
            'SR_Student_phone_no' => $request->SR_Student_phone_no,
        ]);

    return redirect()->route('admin.studentProfile', ['User_ID' => $User_ID, 'studentId' => $studentId])
                     ->with('success', 'Student details updated successfully.');
}

    //show user registration form
    public function registerUserForm($User_ID)
    {
        // Retrieve the admin details based on User_ID
        $kafa = DB::table('kafa_admin')->where('User_ID', $User_ID)->first();


        return view('manageprofile.AdminRegisterUser', compact('User_ID', 'kafa'));
    }

    //store student info for login in user table
    public function storeUser(Request $request, $User_ID)
{
    $request->validate([
        'User_ID' => ['required', 'string', 'unique:users,User_ID'],
        'password' => ['required', 'string', Rules\Password::defaults()],
        'role' => ['required', 'string', 'in:student'],
    ]);

    User::create([
        'User_ID' => $request->User_ID,
        'password' => Hash::make($request->password),
        'role' => $request->role,
    ]);

    $studentId = $request->User_ID;

    return redirect()->route('admin.registerFormStudent', [$User_ID, $studentId])
                     ->with('success', 'User registered successfully. Proceed to add student details.');
}

//show student registration form
public function registerStudentForm($User_ID, $studentId)
{
    // Retrieve the admin details based on User_ID
    $kafa = DB::table('kafa_admin')->where('User_ID', $User_ID)->first();
    // Retrieve the password from the users table based on studentId
    $studentUser = User::where('User_ID', $studentId)->firstOrFail();
    $studentPassword = $studentUser->password;


    return view('manageprofile.AdminRegisterStudent', compact('User_ID', 'kafa', 'studentId', 'studentPassword'));
}

//store student details in student_registration table
public function storeStudentDetails(Request $request)
{
    $request->validate([
        'User_ID' => 'required|exists:users,User_ID',
        'SR_Student_Name' => 'required|string|max:255',
        'SR_Student_IC' => 'required|string',
        'SR_Student_gender' => 'required|string|in:Male,Female',
        'SR_Student_phone_no' => 'required|string|max:15',
        'K_Admin_ID' => 'required|exists:users,User_ID',
    ]);

    StudentRegistration::create([
        'User_ID' => $request->User_ID,
        'SR_Student_Name' => $request->SR_Student_Name,
        'SR_Student_IC' => $request->SR_Student_IC,
        'SR_Student_gender' => $request->SR_Student_gender,
        'SR_Student_phone_no' => $request->SR_Student_phone_no,
        'K_Admin_ID' => $request->K_Admin_ID,
    ]);

    return redirect()->route('admin.home', ['User_ID' => $request->K_Admin_ID])
                     ->with('success', 'Student details registered successfully.');
}

}