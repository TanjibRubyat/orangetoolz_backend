<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\createToken;

class AuthController extends Controller
{
    public function index()
    {
        $user = User::all();
    }
    // public function login(Request $request) {
    //     $fields = $request->validate([
    //         'email' => 'required|string',
    //         'password' => 'required|string'
    //     ]);
    //    // return $request;
    //     $user = User::where('email', $fields['email'])->first();

    //     // Check password
    //     if(!$user || !Hash::check($fields['password'], $user->password)) {
    //         return response([
    //             'message' => 'Invalid Username and Password'
    //         ], 401);
    //     }

    //     $token = $user->createToken('accessToken')->accessToken;

    //     $response = [
    //         'data' => $user,
    //         'token' => $token,
    //         'status'=>'success'
    //     ];

    //     return response($response, 200);
    // }
    public function login(Request $request)
    {
        $user = User::where("email", $request->email)->get();
       
        if ($user[0]['status'] == 0) {
            $validator = Validator::make($request->all(), [
                "email" => "required|email",
                "password" => "required",
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validation error',
                    'data' => $validator->errors()
                ], 422);
            }

            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $user = Auth::user();

                $data['email'] = $user->email;
                $data['access_token'] = $user->createToken('authToken')->accessToken;
                return response()->json([
                    'user' => $user,
                    'status' => 'success',
                    'message' => 'Login successful',
                    'access_token' => $user->createToken('authToken')->accessToken,
                ]);
            } else if($user[0]['status']==1){
                return response()->json([
                    "Error"
                ]);
            }
        }else{
            dd("Here..");
            return response()->json([
                "status" => "failed",
                'message'=> 'You are blocked. Please contact with admin.'
            ]);
        }
    }

    public function updateUser(Request $request){
        dd($request);
        try{
            $user = User::find($id);
            dd($id);
            $user->status = $request->status;
            $user->update();
            return redirect()->json([
                'message'=>'success',
                'user'=>'$user->status',
            ]);
        }catch(Exception $e){
            return redirect()->json([
                'message'=>'failed',
            ]);
        }
    }

    public function getAll(Request $request)
    {
        try {
            $user = User::all();
            return response()->json([
                'user' => $user,
                'message' => 'success'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'fail'
            ]);
        }
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

    // public function logout()
    // {
    //     return auth()->user()->token()->revoke();
    //     return response()->json([
    //         'message' => 'Successfully logged out',
    //     ]);
    // }

    public function show($id)
    {
        $user = User::find($id);
        return response()->json([
            'message' => "success",
            'user' => $user,
        ]);
    }
}
