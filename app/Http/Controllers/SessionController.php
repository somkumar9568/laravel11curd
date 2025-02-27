<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;

class SessionController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('login');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4|max:8',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Store the user ID and email in session
            Session::put('user_id', $user->id);
            Session::put('user_email', $user->email);

            return redirect('/welcome')->with('success', 'Login Successful');
        } else {
            return back()->with('fail', 'Invalid Credentials');
        }
    }

    // Show welcome page
    public function welcome()
    {
        // Get the user info based on the session data
        $user = User::find(Session::get('user_id'));

        return view('welcome', compact('user'));
    }

    // Update user profile
    public function updateProfile(Request $request)
    {
        // Validate the profile data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Session::get('user_id'),
        ]);

        try {
            // Update the user profile
            $user = User::find(Session::get('user_id'));
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();

            return redirect()->route('welcome')->with('success', 'Profile updated successfully.');
        } catch (\Exception $e) {
            return back()->with('fail', 'Error updating profile: ' . $e->getMessage());
        }
    }

    // Logout user
    public function logout()
    {
        // Clear session data
        Session::forget('user_id');
        Session::forget('user_email');
        return redirect('/login')->with('success', 'Logged out successfully.');
    }
}
