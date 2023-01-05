<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

use App\Models\User;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function registerPage(){
        return view('register');
    }
    public function registerUser(Request $req){

        $validatedData = $req->validate(
            [
                'username'=>'required|unique:users||min:5|max:20',
                'email'=> 'required|email:dns|unique:users',
                'password'=>'required|min:5|max:20',
                'phone_number'=> 'required|min:10|max:13',
                'address'=>'required|min:5'

            ]
        );
        $validatedData['password'] = bcrypt($validatedData['password']);
        $new_user= User::create($validatedData);
        Cart::insert(['user_id'=>$new_user->id]);
        return redirect('login')->with('success', 'Registration successfull! Please login');
    }

    public function viewProfile($i){
        return view('profile');
    }

    public function editProfilePage($id){
        // $student = Student::where('id', $id)->get();
        return view ('edit_profile');
    }

    public function updateProfile(Request $req, $id){

        $req->validate(
            [
                'username'=>'required|unique:users||min:5|max:20',
                'email'=> 'required|email:dns|unique:users',
                'phone_number'=> 'required|min:10|max:13',
                'address'=>'required|min:5'
            ]
        );
        User::where('id', $id)->update([
                'username' => $req->username,
                'email' => $req->email,
                'address' => $req->address,
                'phone_number' => $req->phone_number,
                'updated_at' => Carbon::now(),
        ]);

        return redirect('profile/'.$req->username)->with('editProfileSuccess', 'Profile has been changed');

    }

    public function editPasswordPage(){
        return view ('edit_password');
    }

    public function updatePassword(Request $req, $id){
        $user = User::findOrFail($id);
        $req->validate(
            [
                'old_password'=>'required|min:5|max:20',
                'new_password'=>'required|min:5|max:20'
            ]
        );

        $old_password = User::where('id', $id)->value('password');
        // dd($req->old_password, );
        if( Hash::check($req->old_password, $old_password) ){
            User::where('id', $id)->update([
                'password' => bcrypt($req->new_password),
                'updated_at' => Carbon::now(),
            ]);

            return redirect('profile/'.$user->username)->with('editPasswordSuccess', 'Password has been updated');
        }
        else{

            return back()->with('wrongPassword', 'Wrong password!');

        }


    }

}
