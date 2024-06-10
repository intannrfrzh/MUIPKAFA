<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\activities;
use Illuminate\Http\Request;
use DB;
use App\Models\Activity;
$conn = mysqli_connect("localhost", "root", "",);
class muipActivitiesController extends Controller
{
    // To view all activities
    public function verifyActivities()
    {
        $pendingActivities = activities::where('A_Activity_status', 'pending')->get();
        $approvedActivities = activities::where('A_Activity_status', 'approved')->get();
        $rejectedActivities = activities::where('A_Activity_status', 'rejected')->get();
        //$activities = activities::all();
        return view('KAFAactivities.verifyActivities', compact('pendingActivities', 'approvedActivities', 'rejectedActivities'));
    }

    public function approve($id)
    {
        // Find activity by ID
        $activity = activities::findOrFail($id);
        // Update activity status to approved
        $activity->A_Activity_status = 'APPROVED';
        $activity->save();

        // Redirect or return response
        return redirect()->route('verifyActivities')->with('success', 'Activity approved and saved successfully.');
    }

    // Reject an activity
    public function reject($id)
    {
        $activity = activities::findOrFail($id);
        $activity->A_Activity_status = 'REJECTED';
        $activity->save();

        return redirect()->route('verifyActivities')->with('success', 'Activity rejected successfully.');
    }

    // Change an activity status
    public function change($id)
    {
        $activity = activities::findOrFail($id);
        $activity->A_Activity_status = 'PENDING';
        $activity->save();

        return redirect()->route('verifyActivities')->with('success', 'Activity rejected successfully.');
    }

    public function show($id)
    {
        $activity = activities::findOrFail($id);
        return view('KAFAactivities.viewActivities', compact('activity'));
    }
}