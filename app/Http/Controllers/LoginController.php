<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){

        return view('admin.login',[
            'title' => 'Login',
        ]);
    }

    public function store(Request $request)
    {
        $valid = User::all();
        $valid = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($valid)) {
            $request->session()->put('username', $valid);
            $request->session()->regenerate();
            return redirect()->intended('/a_home');
        }
        return back()->with('loginError', 'Login failed');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return Redirect('/');
    }
}
