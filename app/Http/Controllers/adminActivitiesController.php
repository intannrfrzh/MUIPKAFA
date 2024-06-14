<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\activities;
use App\Models\KafaAdmin;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class AdminActivitiesController extends Controller
{
    // To view all activities
    public function listActivitiesAdmin(Request $request)
    {
        $User_ID = $request->User_ID;
        Session::put('User_ID', $User_ID);

        $pendingActivities = activities::where('A_Activity_status', 'pending')->get();
        $approvedActivities = activities::where('A_Activity_status', 'approved')->get();
        $rejectedActivities = activities::where('A_Activity_status', 'rejected')->get();
        
        //$activities = activities::all();
        return view('KAFAactivities.listActivitiesAdmin', compact('pendingActivities', 'approvedActivities', 'rejectedActivities', 'User_ID' ));
    }

    // To show the form for creating a new activity
    public function create()
    {
        $User_ID = Session::get('User_ID');
        return view('KAFAactivities.addActivities', compact('User_ID'));
        
    }

    // To store a newly created activity in the database
    public function store(Request $request)
{ 
    $User_ID = $request->input('User_ID');
    // Set default values for K_Admin_ID and J_Admin_ID
    $kAdminId = 'AD21075'; // Set the appropriate default value
    $jAdminId = 'JP21017'; // Set the appropriate default value
    
    $User_ID = $request->input('User_ID');

    Log::info('Request data: ', $request->all());

    $activities = new activities();
    
    $activities->K_Admin_ID = $kAdminId;
    $activities->J_Admin_ID = $jAdminId;
    $activities->A_Activity_name = $request->A_Activity_name;
    $activities->A_Activity_details = $request->A_Activity_details;
    $activities->A_Activity_datestart = $request->A_Activity_datestart;
    $activities->A_Activity_timestart = $request->A_Activity_timestart;
    $activities->A_Activity_dateend = $request->A_Activity_dateend;
    $activities->A_Activity_timeend = $request->A_Activity_timeend;
    $activities ->save();
    
        return redirect()->route('listActivitiesAdmin', ['User_ID' => $User_ID])->with('success', 'Activity added successfully.');
}



    // To show the form for editing an existing activity
    public function editActivities($id)
    {
        $User_ID = Session::get('User_ID');
        $activity = activities::findOrFail($id);
        return view('KAFAactivities.editActivities', compact('activity', 'User_ID'));
    }

    // To update the specified activity in the database
    public function update(Request $request, $id)
    {
        $User_ID = $request->input('User_ID');

        $request->validate([
            
            'K_Admin_ID' => 'kAdminId',
            'J_Admin_ID'=>'jAdminId',
            'A_Activity_name' => 'required|string|max:255',
            'A_Activity_details' => 'required|string',
            'A_Activity_datestart' => 'required|date',
            'A_Activity_dateend' => 'required|date',
            'A_Activity_timestart' => 'required',
            'A_Activity_timeend' => 'required',
        ]);

        $activity = activities::findOrFail($id);
        $activity->update([
            'A_Activity_name' => $request->A_Activity_name,
            'A_Activity_details' => $request->A_Activity_details,
            'A_Activity_datestart' => $request->A_Activity_datestart,
            'A_Activity_dateend' => $request->A_Activity_dateend,
            'A_Activity_timestart' => $request->A_Activity_timestart,
            'A_Activity_timeend' => $request->A_Activity_timeend,
        ]);

        return redirect()->route('listActivitiesAdmin', ['User_ID' => $User_ID])->with('success', 'Activity updated successfully');
    }

    // To delete the specified activity from the database
    public function destroy($id)
    {
        $activity = activities::findOrFail($id);
        $activity->delete();
        return redirect()->route('listActivitiesAdmin')->with('success', 'Activity deleted successfully.');
    }

    // To show the form for viewing an existing activity
    public function show($id)
    {
        $User_ID = Session::get('User_ID');

        $activity = activities::findOrFail($id);
        return view('KAFAactivities.viewActivities', compact('activity', 'User_ID'));
    }

    // Approve an activity
    public function approve($id)
    {
        $activity = activities::findOrFail($id);
        $activity->A_Activity_status = 'approved';
        $activity->save();

        return redirect()->route('listActivitiesAdmin')->with('success', 'Activity approved successfully.');
    }

    // Reject an activity
    public function reject($id)
    {
        $activity = activities::findOrFail($id);
        $activity->A_Activity_status = 'rejected';
        $activity->save();

        return redirect()->route('listActivitiesAdmin')->with('success', 'Activity rejected successfully.');
    }

    
}
