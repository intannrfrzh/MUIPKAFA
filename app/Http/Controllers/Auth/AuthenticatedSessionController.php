<?php
// app/Http/Controllers/Auth/AuthenticatedSessionController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        // Get the user's role and ID
        $role = $request->user()->role;
        $User_ID = $request->user()->User_ID;


        // Redirect based on the user's role
        switch ($role) {
            case 'K_admin':
                return redirect()->intended(route('admin.home', ['role' => $role, 'User_ID' => $User_ID]));
            case 'J_admin':
                return redirect()->intended(route('muip.home', ['role' => $role, 'User_ID' => $User_ID]));
            case 'teacher':
                return redirect()->intended(route('teacher.home', ['role' => $role, 'User_ID' => $User_ID]));
            case 'student':
                return redirect()->intended(route('student.home', ['role' => $role, 'User_ID' => $User_ID]));
            default:
                return redirect()->intended('/');
        }
        /*
        $role = Auth::user()->role;
        switch ($role) {
            case 'K_admin':
            case 'J_admin':
                return redirect()->intended(route('admin.home'));
            case 'teacher':
                return redirect()->intended(route('teacher.home'));
            case 'student':
                return redirect()->intended(route('student.home'));
            default:
                return redirect()->intended(route('index'));
        }**/
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
