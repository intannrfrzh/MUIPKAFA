<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\activities;
use Illuminate\Http\Request;
use DB;
use App\Models\Activity;
$conn = mysqli_connect("localhost", "root", "",);
class AdminActivitiesController extends Controller
{
    // To view all activities
    public function listActivitiesAdmin()
    {
        $pendingActivities = activities::where('A_Activity_status', 'pending')->get();
        $approvedActivities = activities::where('A_Activity_status', 'approved')->get();
        $rejectedActivities = activities::where('A_Activity_status', 'rejected')->get();
        //$activities = activities::all();
        return view('KAFAactivities.listActivitiesAdmin', compact('pendingActivities', 'approvedActivities', 'rejectedActivities'));
    }

    // To show the form for creating a new activity
    public function create()
    {
        return view('KAFAactivities.addActivities');
        
    }

    // To store a newly created activity in the database
    public function store(Request $request)
{ 
    // Set default values for K_Admin_ID and J_Admin_ID
    $kAdminId = 'AD21075'; // Set the appropriate default value
    $jAdminId = 'JP21017'; // Set the appropriate default value
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
    // Validate the request data
    /*$validatedData = $request->validate([
        'A_Activity_name' => 'required|string|max:255',
        'A_Activity_details' => 'required|string',
        'A_Activity_datestart' => 'required|date',
        'A_Activity_dateend' => 'required|date|after_or_equal:A_Activity_datestart',
        'A_Activity_timestart' => 'required|date_format:H:i',
        'A_Activity_timeend' => 'required|date_format:H:i|after:A_Activity_timestart',
    ]);*/

    //activities::create($validatedData);

        return redirect()->route('listActivitiesAdmin')->with('success', 'Activity added successfully.');
}



    // To show the form for editing an existing activity
    public function editActivities($id)
    {
        $activity = activities::findOrFail($id);
        return view('KAFAactivities.editActivities', compact('activity'));
    }

    // To update the specified activity in the database
    public function update(Request $request, $id)
    {
        // Set default values for K_Admin_ID and J_Admin_ID
        $kAdminId = 'AD21075'; // Set the appropriate default value
        $jAdminId = 'JP21017'; // Set the appropriate default value

        $request->validate([
            'K_Admin_ID' => 'kAdminId',
            'J_Admin_ID' => 'jAdminId',
            'A_Activity_name' => 'required|string|max:255',
            'A_Activity_details' => 'required|string',
            'A_Activity_datestart' => 'required|date',
            'A_Activity_dateend' => 'required|date',
            'A_Activity_timestart' => 'required',
            'A_Activity_timeend' => 'required',
        ]);

        $activity = activities::findOrFail($id);
        $activity->update([
            'K_Admin_ID' => $kAdminId,
            'J_Admin_ID' => $jAdminId,
            'A_Activity_name' => $request->A_Activity_name,
            'A_Activity_details' => $request->A_Activity_details,
            'A_Activity_datestart' => $request->A_Activity_datestart,
            'A_Activity_dateend' => $request->A_Activity_dateend,
            'A_Activity_timestart' => $request->A_Activity_timestart,
            'A_Activity_timeend' => $request->A_Activity_timeend,
        ]);

        return redirect()->route('listActivitiesAdmin')->with('success', 'Activity updated successfully');
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
        $activity = activities::findOrFail($id);
        return view('KAFAactivities.viewActivities', compact('activity'));
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
