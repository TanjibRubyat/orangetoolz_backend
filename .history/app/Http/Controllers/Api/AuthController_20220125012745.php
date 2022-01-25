<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){

    }

    public function register(Request $request){
        Validator::make($request->all(),{
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        })
    }
}
