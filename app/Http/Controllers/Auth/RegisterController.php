<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\UserRegistrationNotification;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('user.authentication');
    }

    public function register(Request $request)
{
    $request->validate([
        'username' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    try {
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_approved' => false,
        ]);

        $adminEmail = Admin::pluck('email')->first();

        if ($adminEmail) {
            Mail::to($adminEmail)->send(new UserRegistrationNotification($user));
            Log::info('Email sent successfully');
        } else {
            Log::warning('No admin email found in the admins table.');
        }

        return redirect()->route('register.form')->with('status', 'Your registration is pending for approval. We will notify you once it is approved.');
    } catch (\Exception $e) {
        Log::error('User registration failed: ' . $e->getMessage());
        return redirect()->route('register.form')->withErrors(['error' => 'User registration failed. Please try again.']);
    }
}
}
