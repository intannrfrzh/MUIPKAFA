<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MuipController extends Controller
{
    public function dashboard($User_ID){
      // Pass the role and User_ID to the view
        return view('tempt.muiptempt', compact('User_ID'));
      }
}
