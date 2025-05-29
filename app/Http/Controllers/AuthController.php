<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function Showlogin(){
        return view('Auth.login');
    }

    Public function Showregis(){
        return view('Auth.regis');
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('Showlogin');
    }

    public function login(Request $request){
        $login = $request->only('name','password');

        if (Auth::attempt($login)) {
            $request->session()->regenerate();
            //opsional redirect
            return redirect()->intended('home');
            // return redirect()->route('home');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('Showlogin');
    }
}
