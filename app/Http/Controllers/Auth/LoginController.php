<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('user.authentication'); // Ensure the view path is correct
    }

    public function login(Request $request)
    {
        // Validate login credentials
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Check if the user exists with the provided email
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'You are not registered. Please register yourself and wait for approval.']);
        }

        // Check if the user is approved
        if (!$user->is_approved) {
            return redirect()->back()->withErrors(['email' => 'Your registration is pending approval. Please wait for admin approval.']);
        }

        // Verify the password and log the user in
        if (Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('home'); // Redirect to the desired page after successful login
        }

        // If password does not match
        return redirect()->back()->withErrors(['password' => 'The provided password is incorrect.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login.form');
    }
}
