<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        try{

        $user = User::create($request->validated());

        $token = $user->createToken('auth_token')->plainTextToken;
        $user['token'] = $token;
        $respone = [
            'message' => 'resgister success',
            'status_code' => 200,
            'data' => [
                'user' => $user,
            ],
        ];

        return response()->json($respone);

    }catch(Exception $err){
        return response()->json([
            'message' => 'resgister failed',
            'status_code' => 401,
            'error' => $err
        ]);
    }
        
    }

    public function login(LoginRequest $request)
    {

        try{
            if(Auth::attempt($request->validated())){
                $user = User::whereEmail($request->email)->first();
    
                $token = $user->createToken('auth_token')->plainTextToken;

                $user['token'] = $token;
                $respone = [
                    'message' => 'login success',
                    'data' => [
                        'user' => $user,
                    ],
                    'status_code' => 200
                ];
    
                return response()->json($respone);

            }else{
                return response()->json([
                    'message' => 'email atau password salah'
                ], 401);
            }

        }catch(Exception $err){
            if($err != null){
                return response()->json([
            'message' => $err,
        ], 401);
            }

            return response()->json([
            'message' => 'internal server error',
  
        ], 500);
        }
    }

    public function logout(Request $request)
    {
        $token = $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Token Revoked',
            'token' => $token
        ]);
    }
}
