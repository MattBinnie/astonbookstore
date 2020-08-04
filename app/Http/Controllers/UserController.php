<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getSignup(){
        return view('/signup');
    }

    public function postSignup(Request $request){
        $this->validate($request, [
            'email' => 'email|required|unique:users',
            'password' => 'required|min:4'
        ]);

        $user = new User([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'isAdmin' => false
        ]);
        $user->save();
        
        Auth::login($user);

        return redirect()->route('book.list');
    }

    public function getSignin(){
        return view('/signin');
    }

    public function postSignin(Request $request){
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required|min:4'
        ]);

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect()->route('book.list');
        }
        return redirect()->back();
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->back();
    }

}
