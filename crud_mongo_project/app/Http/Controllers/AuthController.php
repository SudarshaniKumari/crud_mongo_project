<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validate form input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed', // 'confirmed' checks if password_confirmation matches
        ]);
    
        // Create new user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash password
        ]);
    
        // Redirect to login page with success message
        return redirect()->route('login.show')->with('success', 'Registration successful! Please log in.');
    }
    

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // Redirect to the dashboard after successful login
            return redirect()->route('dashboard');
        }
    
        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function logout()
{
    Auth::logout(); // Log the user out
    return redirect()->route('login.show'); // Redirect to the login page (or you can redirect to home)
}
    
}
