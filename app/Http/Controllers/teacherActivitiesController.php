<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\activities;
use Illuminate\Http\Request;
use DB;
use App\Models\Activity;
$conn = mysqli_connect("localhost", "root", "",);
class teacherActivitiesController extends Controller
{
    // To view all activities
    public function viewListTeacher()
    {
        $approvedActivities = activities::where('A_Activity_status', 'approved')->get();
        //$activities = activities::all();
        return view('KAFAactivities.viewListTeacher', compact('approvedActivities'));
    }

    // To show the form for viewing an existing activity
    public function show($id)
    {
        $activity = activities::findOrFail($id);
        return view('KAFAactivities.viewActivities', compact('activity'));
    }

}