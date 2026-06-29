<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show Login Page
    public function login()
    {
        return view('auth.login');
    }

    // Login User
    public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect('/dashboard')->with('success', 'Login Successful');
        }

        return back()->with('error', 'Invalid Email or Password');
    }

    // Show Register Page
    public function register()
    {
        return view('auth.register');
    }

    // Register User
    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'mobile_num'=>'required',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile_num'=>$request->mobile_num,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', 'Registration Successful');
    }

    // // Dashboard
    // public function dashboard()
    // {
    //     return view('dashboard');
    // }

    // Logout User
    public function logout()
    {
        Auth::logout();

        return redirect('/login')->with('success', 'Logged Out Successfully');
    }
}
