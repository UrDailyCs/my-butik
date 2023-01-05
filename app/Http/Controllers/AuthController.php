<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function loginPage(){
        return view('login');
    }

    public function login(Request $req){
        $validatedData = $req->validate(
            [
                'email'=> 'required|email:dns',
                'password'=>'required|min:5|max:20',
            ]
        );
        $credentials = [
            'email'=> $req->email,
            'password' => $req->password
        ];

        // dd($credentials);
        if ($req->remember){
            Cookie::queue('mycookie', $req->email, 5);
        }
        if (Auth::attempt($credentials)){
            Session::put('mysession', $credentials);

            return redirect('home');
        }
        // kl data salah
        return back()->with('loginError', 'Login failed!');
    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }

    public function adminPage(){
        return view('admin');
    }


}
