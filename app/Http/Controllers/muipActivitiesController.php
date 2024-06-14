<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\activities;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class muipActivitiesController extends Controller
{
    // To view all activities

    public function verifyActivities(Request $request)
    {
        $User_ID = $request->User_ID;
        Session::put('User_ID', $User_ID);

        $pendingActivities = activities::where('A_Activity_status', 'pending')->get();
        $approvedActivities = activities::where('A_Activity_status', 'approved')->get();
        $rejectedActivities = activities::where('A_Activity_status', 'rejected')->get();
        
        //$activities = activities::all();
        return view('KAFAactivities.verifyActivities', compact('pendingActivities', 'approvedActivities', 'rejectedActivities', 'User_ID' ));
    }

    public function approve(Request $request, $id)
    {
        // Retrieve User_ID from session
        $User_ID = Session::get('User_ID');
        // Find activity by ID
        $activity = activities::findOrFail($id);
        // Update activity status to approved
        $activity->A_Activity_status = 'APPROVED';
        $activity->save();

        // Redirect or return response
        return redirect()->route('verifyActivities', ['User_ID' => $User_ID])->with('success', 'Activity approved and saved successfully.');
    }

    // Reject an activity
    public function reject(Request $request, $id)
    {
        // Retrieve User_ID from session
        $User_ID = Session::get('User_ID');

        $activity = activities::findOrFail($id);
        $activity->A_Activity_status = 'REJECTED';
        $activity->save();

        return redirect()->route('verifyActivities', ['User_ID' => $User_ID])->with('success', 'Activity rejected successfully.');
    }

    // Change an activity status
    public function change(Request $request, $id)
    {
        // Retrieve User_ID from session
        $User_ID = Session::get('User_ID');

        $activity = activities::findOrFail($id);
        $activity->A_Activity_status = 'PENDING';
        $activity->save();

        return redirect()->route('verifyActivities', ['User_ID' => $User_ID])->with('success', 'Activity rejected successfully.');
    }

    public function show($id)
    {
        $User_ID = Session::get('User_ID');

        $activity = activities::findOrFail($id);
        return view('KAFAactivities.viewActivities', compact('activity', 'User_ID'));
    }
}