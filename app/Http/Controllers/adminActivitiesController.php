<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\activities;
use Illuminate\Http\Request;
use App\Models\Activity;

class AdminActivitiesController extends Controller
{
    // To view all activities
    public function viewActivitiesAdmin()
    {
        $activities = activities::all();
        return view('KAFAactivities.viewActivitiesAdmin', compact('activities'));
    }

    // To show the form for creating a new activity
    public function create()
    {
        return view('KAFAactivities.addActivities');
    }

    // To store a newly created activity in the database
    public function store(Request $request)
    {
        $request->validate([
            'K_Admin_ID' => 'required',
            'J_Admin_ID' => 'required',
            'T_Teacher_ID' => 'required',
            'A_Activity_name' => 'required',
            'A_Activity_details' => 'required',
            'A_Activity_date' => 'required|date',
            'A_Activity_time' => 'required',
            'status' => 'required'
        ]);

        activities::create($request->all());
        return redirect()->route('admin.viewActivitiesAdmin')->with('success', 'Activity created successfully.');
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
        $request->validate([
            'K_Admin_ID' => 'required',
            'J_Admin_ID' => 'required',
            'T_Teacher_ID' => 'required',
            'A_Activity_name' => 'required',
            'A_Activity_details' => 'required',
            'A_Activity_date' => 'required|date',
            'A_Activity_time' => 'required',
            'status' => 'required'
        ]);

        $activity = activities::findOrFail($id);
        $activity->update($request->all());
        return redirect()->route('admin.viewActivitiesAdmin')->with('success', 'Activity updated successfully.');
    }

    // To delete the specified activity from the database
    public function destroy($id)
    {
        $activity = activities::findOrFail($id);
        $activity->delete();
        return redirect()->route('admin.viewActivitiesAdmin')->with('success', 'Activity deleted successfully.');
    }
}
