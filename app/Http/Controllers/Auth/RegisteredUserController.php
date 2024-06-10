<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the request data
        $request->validate([
            'User_ID' => ['required', 'string', 'unique:users,User_ID'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string', 'in:K_admin,J_admin,teacher,student'], // Ensure role is one of the accepted values
        ]);

        // Log the incoming data
        \Log::info('Registration data received', $request->all());

        try {
            // Create the new user
            $user = User::create([
                'User_ID' => $request->User_ID,
                'password' => Hash::make($request->password),
                'role' => $request->role, // Assign role
            ]);

            // Log the user creation
            \Log::info('User created successfully', ['User_ID' => $user->User_ID]);

            // Fire the Registered event
            event(new Registered($user));

            // Log user login
            Auth::login($user);
            \Log::info('User logged in', ['User_ID' => $user->User_ID]);

            // Redirect based on role
            $redirectPath = $this->redirectPath($user->role);
            \Log::info('Redirecting to', ['path' => $redirectPath]);

            return redirect($redirectPath);
        } catch (\Exception $e) {
            // Log the exception
            \Log::error('Registration failed', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors(['error' => 'Registration failed. Please try again.']);
        }
    }

    /**
     * Determine the redirect path based on user role.
     */
    protected function redirectPath($role): string
    {
        return match ($role) {
            'K_admin' => route('admin.home'),
            'J_admin' => route('admin.home'),
            'teacher' => route('teacher.home'),
            'student' => route('student.home'),
            default => route('home'),
        };
    }
}
