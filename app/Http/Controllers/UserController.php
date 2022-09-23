<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function loginForm()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if ( !Auth::attempt($request->only(['email', 'password']))) {
            return redirect('/login');
        }
        return redirect('/students');
    }

    public function form()
    {
        return view('login.create');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'unique:users,email'],
            'password' => ['required']
        ]);

        $userData = $request->only(['name', 'email', 'password']);
        $userData['password'] = Hash::make($userData['password']);
        $user = User::create($userData);
        Auth::login($user);
        return redirect('/students');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
