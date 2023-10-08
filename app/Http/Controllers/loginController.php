<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function handleLogin(LoginRequest $request){
        return $request;
    }
}
