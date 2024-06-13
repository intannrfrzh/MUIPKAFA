<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KafaAdmin;

class KafaController extends Controller
{
    public function dashboard($User_ID){

       // Retrieve the admin details
      $admin = KafaAdmin::where('User_ID', $User_ID)->firstOrFail();
        // Pass the role and User_ID to the view
        return view('tempt.admintempt', compact('User_ID', 'admin'));
    }
}
