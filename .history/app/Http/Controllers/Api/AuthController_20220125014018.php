<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request){

    }

    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);
        if($validator->fails())
            return response()->json([
                'message'=>'Validation error',
                'data'=>$validator->errors()
            ],422);
            return $request->all();
            try{
                User::create([
                    'name',
                    'email',
                ]);
            }catch(Exception $e){
                return response()->json([
                    'message'=>$e->getMessage()
                ], $e->getCode());
            }
    }
}
