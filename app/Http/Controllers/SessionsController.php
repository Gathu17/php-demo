<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye');
    }
    public function create()
    {
        return view('sessions.create');
    }
    public function store()
    {

        $attributes = request()->validate([
            'email' => 'required|email',
            'name' => 'required',
        ]);

        if (! auth()->attempt($attributes)) {
           return back()
            ->withInput()
            ->withErrors(['email' => 'Your credentials could not be verified']);
        }

        session()->regenerate();
         return redirect('/')->with('success', 'Welcome back!');
        // throw ValidationException::withMessages([
        //     'email' => 'Your credentials could not be verified'
        // ]);

        
    }
}