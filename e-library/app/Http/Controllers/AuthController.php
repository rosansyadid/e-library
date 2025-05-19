<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle Login Request
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Fixed typo: sesssion -> session

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The Provided Credentials Do Not Match Our Records',
        ])->onlyInput('email');

    }

    /**
     * Show Registration Form.
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle Register Request.
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // Fixed typo: require -> required
        ]);

        $user = User::create([
            'name' => $request->name, // Fixed: was copying validation rules instead of request data
            'email' => $request->email, // Fixed: was copying validation rules instead of request data
            'password' => Hash::make($request->password), // Fixed: was copying validation rules and missing Hash::make
            'role' => 'user', // Default Role User
        ]);

        // Error handling
        try {
            // Registration code
        } catch (\Exception $e) {
            \Log::error('Registration error: ' . $e->getMessage());
            return back()->withErrors(['email' => 'Registration failed: ' . $e->getMessage()]);
        }

        Auth::login($user);

        return redirect('dashboard');
    }

    /**
     * Handle Log Out Request.
     */
    public function logout(Request $request) // Fixed case: request -> Request
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}