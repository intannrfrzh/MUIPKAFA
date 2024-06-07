<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class studentResultController extends Controller
{
    //to view student result
    public function viewResult()
{
    // Your logic to fetch and display the student's result
    return view('manageStudentResult.student.viewresult_std');
}

}
