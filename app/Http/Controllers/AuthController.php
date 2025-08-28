<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Show login page
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Handle login
     */
    public function login(Request $request)
    {
        // Validation rules for login
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string|min:6',
        ], [
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 6 characters.',
        ]);

        // Attempt login
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate(); // Prevent session fixation

            // Redirect by role
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Welcome Admin!');
            } elseif (Auth::user()->role === 'donor') {
                return redirect()->route('donor.dashboard')->with('success', 'Welcome Donor!');
            } else {
                return redirect()->route('seeker.dashboard')->with('success', 'Welcome Seeker!');
            }
        }

        // If login fails
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'You have been logged out.');
    }

    /**
     * Show registration page
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Handle registration
     */
    public function register(Request $request)
    {
        // Validation rules for registration
        $request->validate([
            'name'                  => 'required|string|max:100|regex:/^[a-zA-Z\s]+$/',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|string|min:6|confirmed',
            'role'                  => 'required|in:donor,seeker',
        ], [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than 100 characters.',
            'name.regex' => 'The name must contain only letters and spaces.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 6 characters.',
            'password.confirmed' => 'The password confirmation does not match.',
            'role.required' => 'Please select a role.',
            'role.in' => 'The selected role is invalid.',
        ]);

        // Create user
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        // Auto-login after registration
        Auth::login($user);

        // Redirect based on role
        if ($user->role === 'donor') {
            return redirect()->route('donor.dashboard')->with('success', 'Registration successful! Welcome Donor!');
        } else {
            return redirect()->route('seeker.dashboard')->with('success', 'Registration successful! Welcome Seeker!');
        }
    }
}