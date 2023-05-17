<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function create()
    {
        return view('register.create');
    }
    public function store()
    {
        //create class  
        $attributes = request()->validate([
            'username' =>'required|max:255|unique:users,username',
            'name' => 'required|max:255',
            'email' =>'required|email|unique:users,email',
            'password' =>'required|min:6',
        ]);
        //$attributes['password'] = bcrypt($attributes['password']);

       $user =  User::create($attributes);

       auth()->login($user);

       // session()->flash('success', 'Your account has been created successfully');
        return redirect("/")->with('success', 'Your account has been created successfully');
    }
}