<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function manage()
    {
        $users = User::all();
        return view('users.manage')->with('users', $users);
    }

    public function store()
    {
        $data = request()->validate([
              'name' => ['required', 'string', 'max:255'],
              'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
              'password' => ['required', 'string', 'min:8'],
              // 'password-confirm' => ['required', 'string', 'min:8'],
              'role' => 'required',
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);

        Session::flash('message', 'User has been created.');
        return "success";
    }

    public function edit(request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();

        Session::flash('message', 'User has been edited.');
        return "success";
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        Session::flash('message', 'User has been deleted.');
        return "success";
    }
}
