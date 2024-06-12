<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JaipAdmin;

class MuipController extends Controller
{
    public function dashboard($User_ID){

      // Retrieve the muip details
      $muip = JaipAdmin::where('User_ID', $User_ID)->firstOrFail();

      // Pass the role and User_ID to the view
        return view('tempt.muiptempt', compact('User_ID', 'muip'));
      }
}
