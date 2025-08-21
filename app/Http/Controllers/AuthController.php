<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show Register Form
    public function showRegister() {
        return view('auth.register');
    }

    // Handle Register
    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:admin,donor,seeker',
        ]);

        // ✅ Ensure role is saved
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        Auth::login($user);

        return $this->redirectUser();
    }

    // Show Login Form
    public function showLogin() {
        return view('auth.login');
    }

    // Handle Login
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Refresh user instance after login
            $request->session()->regenerate();

            return $this->redirectUser();
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Redirect Based on Role
    private function redirectUser() {
        $role = Auth::user()->role;

        switch ($role) {
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'donor':
                return redirect()->route('donor.dashboard');
            case 'seeker':
                return redirect()->route('seeker.dashboard');
            default:
                Auth::logout();
                return redirect()->route('login')
                    ->withErrors(['role' => 'Invalid role assigned.']);
        }
    }

    // Logout
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
