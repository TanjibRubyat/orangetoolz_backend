<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => "required|email",
            "password" => "required",
        ]);
        if ($validator->fails()) {
            return send_error('Validation error', $validator->errors(), 422);
        } 
        $credetials = $request->only('email', 'password');
        return $credentials;
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);
        if ($validator->fails())
            return response()->json([
                'message' => 'Validation error',
                'data' => $validator->errors()
            ], 422);

        try {
            $user = User::create([
                'email'  => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return response()->json([
                'user' => $user,
                'status' => true,
                'message' => 'User registration successful'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], $e->getCode());
        }
    }
}
