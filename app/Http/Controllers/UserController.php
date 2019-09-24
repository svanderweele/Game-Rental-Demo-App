<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function login()
    {

        $credentials = request(['email', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $response = ['token' => $token, 'expires' => auth('api')->factory()->getTTL() * 60];

        $user = auth('api')->user();
        if ($user) {
            if ($user->hasRole('admin')) {
                $response['message'] = 'You are an admin!';
            }
        }
        
        return response()->json($response, 200);
    }

    public function me(Request $request)
    {
        return auth('api')->user()->defaultResponse();
    }

    public function register(Request $request)
    {
        $credentials = request(['email', 'password']);


        $user = User::where(['email' => $credentials['email']])->first();

        //TODO: Forgot password link
        if ($user != null) {
            return response()->json(['message' => "Email already registered! If you've forgotten your password please click here " . "TODO:(ADD FORGOT PASSWORD LINK)"]);
        }

        $registerUserData = $request->only('email', 'name');
        $registerUserData['password'] = Hash::make($request['password']);


        $user = User::create($registerUserData);
        $user->attachRole(3);
        return $user;
    }
}
