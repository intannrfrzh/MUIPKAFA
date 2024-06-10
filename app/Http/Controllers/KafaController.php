<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KafaController extends Controller
{
    public function dashboard($User_ID){
        // Pass the role and User_ID to the view
        return view('tempt.admintempt', compact('User_ID'));
      }
}
