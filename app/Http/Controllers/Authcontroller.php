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
    $validate = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // return redirect('addData');

    $user = User::where('email', $validate['email'])->first();

    if ($user) {
        if (Hash::check($validate['password'], $user->password)) {
            // Manually log in the user
            auth()->login($user);


            return view('add-data');
        } else {
            return back()->withErrors(['password' => 'Invalid credentials.']);
        }
    } else {
        return back()->withErrors(['email' => 'No account found with that email.']);
    }
}



    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
