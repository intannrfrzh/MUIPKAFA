<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\activities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
use App\Models\Activity;
$conn = mysqli_connect("localhost", "root", "",);
class studentActivitiesController extends Controller
{
    // To view all activities
    public function viewListStudent(Request $request)
    {
        $User_ID = $request->User_ID;
        Session::put('User_ID', $User_ID);
        $approvedActivities = activities::where('A_Activity_status', 'approved')->get();
        //$activities = activities::all();
        return view('KAFAactivities.viewListStudent', compact('approvedActivities', 'User_ID' ));
    }

    // To show the form for viewing an existing activity
    public function show($id)
    {
        $User_ID = Session::get('User_ID');

        $activity = activities::findOrFail($id);
        return view('KAFAactivities.viewActivities', compact('activity', 'User_ID'));
    }

}