<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/login')->with('success', 'Registration successful. Please log in.');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function addData(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    return redirect('addData');

    // if (Auth::attempt($credentials)) {
    //     return redirect('addData'); // Redirect to add-data after successful login
    // } else {
    //     return back()->withErrors(['email' => 'Invalid credentials']);
    // }
}



    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
