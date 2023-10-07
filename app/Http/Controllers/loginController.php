<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function handleLogin(Request $request){
        $request->validate([
            'email' => ['required',  'email'],
            'password' => 'required'
        ]);
        return $request;
    }
}