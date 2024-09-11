<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Display all users
    public function index()
    {
        $users = User::all(); // Fetch all users from the database
        return view('admin.users.index', compact('users'));
    }

    // Approve a user
    public function approve($id)
    {
        $user = User::find($id); // Find the user by ID
        if ($user) {
            $user->is_approved = 1; // Set status to approved (1)
            $user->save(); // Save changes
            return redirect()->back()->with('success', 'User approved successfully.');
        }

        return redirect()->back()->with('error', 'User not found.');
    }

    // Reject a user
    public function reject($id)
    {
        $user = User::find($id); // Find the user by ID
        if ($user) {
            $user->is_approved = 0; // Set status to rejected (0)
            $user->save(); // Save changes
            return redirect()->back()->with('success', 'User rejected successfully.');
        }

        return redirect()->back()->with('error', 'User not found.');
    }

    // Delete a user
    public function delete($id)
    {
        $user = User::find($id); // Find the user by ID
        if ($user) {
            $user->delete(); // Delete the user
            return redirect()->back()->with('success', 'User deleted successfully.');
        }

        return redirect()->back()->with('error', 'User not found.');
    }
}
