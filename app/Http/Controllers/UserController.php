<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Load all users
    public function loadAllUsers() {
        $all_users = User::all();
        return view('users', compact('all_users'));
    }

    // Load the add user form
    public function loadAddUsers() {
        return view('add-user');
    }

    // Add new user
    public function AddUser(Request $request) {
        // Validate input
        $request->validate([
            'full_name' => 'required|string',
            'phone_number' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:4|max:8',
        ]);

        try {
            // Create new user
            $new_user = new User;
            $new_user->name = $request->full_name;
            $new_user->phone_number = $request->phone_number;
            $new_user->email = $request->email;
            $new_user->password = $request->password;
            $new_user->save();

            return redirect('/users')->with('success', 'User Added Successfully');
        } catch (\Exception $e) {
            return redirect('/add/users')->with('fail', $e->getMessage());       
        }
    }

   

  
  
    
}
