<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registerPage () {
        return view('register');
    }

    public function register (Request $req) {
        $validatedData = $req->validate([
            'username'=> 'required|unique:users||min:5|max:20',
            'email'=> 'required|email:dns|unique:users',
            'password'=> 'required|min:5|max:20',
            'phone_number' => 'required|min:10|max:13',
            'address' => 'required|min:5'
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        $new_user = User::create($validatedData);
        Cart::insert(['user_id' => $new_user->id]);
        return redirect('login')->with('success', 'Registration successfull! Please login');
    }

    public function profilePage () {
        return view('profile');
    }

    public function editProfile () {
        return view ('edit_profile');
    }

    public function updateProfile (Request $req) {
        $user_id = auth()->user()->id;
        $validatedData = $req->validate([
            'username'=>'required|unique:users||min:5|max:20',
            'email'=> 'required|email:dns|unique:users',
            'phone_number'=> 'required|min:10|max:13',
            'address'=>'required|min:5'
        ]);
        User::where('id', $user_id)->update($validatedData);
        return redirect('profile')->with('editProfileSuccess', 'Profile has been changed');
    }

    public function editPassword () {
        return view ('edit_password');
    }

    public function updatePassword (Request $req) {
        $user = auth()->user();
        $validatedData = $req->validate([
            'old_password'=>'required|min:5|max:20',
            'new_password'=>'required|min:5|max:20'
        ]);

        $old_password = $user->password;
        if (Hash::check($validatedData['old_password'], $old_password)) {
            User::where('id', $user->id)->update([
                'password' => bcrypt($validatedData['new_password']),
                'updated_at' => Carbon::now(),
            ]);
            return redirect('profile')->with('editPasswordSuccess', 'Password has been updated');
        } else {
            return back()->with('wrongPassword', 'Wrong password!');
        }
    }
}
