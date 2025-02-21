<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            Session::put('user', $user->name);
            return redirect('/welcome')->with('success', 'Login Successful');
        } else {
            return back()->with('fail', 'Invalid Credentials');
        }
    }

    // Show welcome page
    public function welcome()
    {
        if (!Session::has('user')) {
            return redirect('/login')->with('fail', 'Please login first.');
        }
        return view('welcome');
    }

    // Logout user
    public function logout()
    {
        Session::forget('user');
        return redirect('/login')->with('success', 'Logged out successfully.');
    }
}
