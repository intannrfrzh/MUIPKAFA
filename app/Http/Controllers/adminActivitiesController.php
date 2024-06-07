<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminActivitiesController extends Controller
{
    ////to view student result
    public function viewActivitiesAdmin()
    {
        // Your logic to fetch and display the student's result
        return view('KAFAactivities.viewActivitiesAdmin');
    }
}
