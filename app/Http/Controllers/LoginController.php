<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()  {
        return view('login');
    }

    public function store(Request $request){
        $request->validate([
            'email' => 'required' ,
            'password' => 'required' ,
        ]);

        $credentials = [
            'email'=> $request->email,
            'password' => $request->password ,
        ];

       $result = Auth::attempt($credentials , $request->boolean('remember'));

       if($result){
             return redirect()->intended('/');
       }
       return back()->withInput()->withErrors([
            'email' => 'invalid email' ,
            'password' => 'invalid password'  ,
        ]);


    }
}