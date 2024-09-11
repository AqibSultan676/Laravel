<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class ResetPasswordController extends Controller
{
    public function showResetForm($token)
    {
        return view('admin.auth.passwords.reset')->with('token', $token);
    }

    public function reset(Request $request)
    {
        // Validate the request data
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        // Attempt to reset the password
        $response = Password::broker('admins')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = bcrypt($password);
                $user->save();
            }
        );

        if ($response == Password::PASSWORD_RESET) {
            // Flash a success message to the session
            return redirect()->route('admin.login')->with('status', 'Password has been reset! You can now log in with your new password.');
        } else {
            // Flash an error message to the session
            throw ValidationException::withMessages(['email' => [trans($response)]]);
        }
    }
}
