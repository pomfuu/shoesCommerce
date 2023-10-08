<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class registerController extends Controller
{
    public function index(){
        return view('register');
    }

    public function handleRegister(RegisterRequest $request){
        return $request;
    }
}

