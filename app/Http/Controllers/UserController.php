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

    public function AddUser(Request $request) {
        $request->validate([
            'full_name' => 'required|string',
            'phone_number' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:4|max:8',
        ]);
    
        try {
            $new_user = new User;
            $new_user->name = $request->full_name;
            $new_user->phone_number = $request->phone_number;
            $new_user->email = $request->email;

            // Hash the password before saving it
            $new_user->password = Hash::make($request->password);
            $new_user->save();
    
            return redirect('/users')->with('success', 'User Added Successfully');
        } catch (\Exception $e) {
            return redirect('/add/users')->with('fail', $e->getMessage());       
        }
    }

    // Delete user
    public function deleteUser($id) {
        try {
            User::where('id', $id)->delete();
            return redirect('/users')->with('success', 'User Deleted Successfully');
        } catch (\Exception $e) {
            return redirect('/users')->with('fail', $e->getMessage()); 
        }
    }

    // Load edit form
    public function loadEditform($id) {
        $user = User::find($id);

        if (!$user) {
            return redirect('/users')->with('fail', 'User not found');
        }

        return view('edit-user', compact('user'));
    }

    // Edit user
    public function EditUser(Request $request) {
        // Validate input
        $request->validate([
            'full_name' => 'required|string',
            'phone_number' => 'required',
            'email' => 'required|email|unique:users,email,'.$request->user_id,
        ]);

        try {
            // Update user
            User::where('id', $request->user_id)->update([
                'name' => $request->full_name,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
            ]);

            return redirect('/users')->with('success', 'User Updated Successfully');
        } catch (\Exception $e) {
            return redirect('/edit/'.$request->user_id)->with('fail', $e->getMessage());
        }
    }
}
