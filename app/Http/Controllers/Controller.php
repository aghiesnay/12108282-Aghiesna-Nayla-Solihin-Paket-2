<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class Controller extends BaseController
{
    public function login() {
        return view('login');
    }

    public function auth(Request $request) {
        // dd($request->all());
        $request->validate([
            'username' => 'username|exists:users, username',
            'password' => 'required',
        ], [
            'username.exists' => 'Username is not available',
            'username.required' => 'Username is required',
            'password.required' => 'Password is required'
        ]);

        $user = $request->only('name', 'password');
            if(Auth::attempt($user)) {
                return redirect('/dashboard')->with('sucess', 'Login successful!');
            } else {
                return redirect()->back()->with('notAllowed', 'Incorrect username or password!');
            }
    }

    public function dashboard() {
        return view('dashboard');
    }

    public function user() {
        return view('admin/user/createUser');
    }

    public function createUser(Request $request) {
        //validasi user
        // dd($request->all());
        $request->validate([
            'username' => 'username|min:4',
            'email' => 'email|email:dns',
            'password' => 'required',
            'role' => 'required',
        ]);

        //add user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make ($request->password),
            'role' => $request->role,
        ]);

        return redirect('/data-user')->with('successAdd', 'Add account successful!');
    }

    public function dataUser() {
        $users = User::all();
        return view('admin/user/dataUser', compact('users'));
    }

    public function editUser($id) {
        $user = User::findOrFail($id);
        return view('/admin/user/editUser', compact('user'));
    }

    public function updateUser (Request $request, $id) {
        // dd($request->all());
        $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email:dns',
            'role' =>'required',
        ]);

        User::where('id', $id)->update([
            'name' => $request->name,
            'email' =>  $request->email,
            'password' => Hash::make($request->password), 
            'role' =>  $request->role,
        ]);

        return redirect('/data-user')->with('successUpdate', 'User data updated successfully!');
    }

    public function deleteUser($id) {
        User::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Successfully deleted account!');
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }

    public function error() {
        return view('error');
    }

}

