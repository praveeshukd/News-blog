<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function destroy(){
       auth()->logout();
       return redirect('/')->with('success','your logout');
    }
    public function create(){
     return view('session.create');
    }
    public function store(){
     $attributes=   request()->validate([
         'email'=>'required|email',
         'password'=>'required'  
        ]);
        if(!auth()->attempt($attributes)){
        
throw ValidationException::withMessages([
    'email' => ['Your provided email is invalid.'],
    'password' => ['Your provided password is invalid.'],
]); 
        }
        // auth failed
        session()->regenerate();
        return redirect('/')->with('success','welcome back');
    }






}
