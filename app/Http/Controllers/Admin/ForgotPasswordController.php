<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Notifications\CustomResetPassword; // Import your custom notification class

class ForgotPasswordController extends Controller
{
    // Display the password reset request form
    public function showLinkRequestForm()
    {
        return view('admin.auth.passwords.email');
    }

    // Handle a reset link request
    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        $response = Password::broker('admins')->sendResetLink(
            $request->only('email'),
            function ($user, $token) {
                $user->notify(new CustomResetPassword($token));
            }
        );

        if ($response == Password::RESET_LINK_SENT) {
            return response()->json(['message' => 'Password reset link sent to your email.']);
        } else {
            return response()->json(['message' => 'We can\'t find a user with that email address.'], 404);
        }
    }

    // Validate email address
    protected function validateEmail(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:admins,email']);
    }
}
