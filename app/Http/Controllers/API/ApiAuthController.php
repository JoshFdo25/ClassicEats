<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ApiAuthController extends Controller
{
    public function login (Request $request) : JsonResponse
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8|max:255',
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json([
                'message' => 'The Provided credentials are incorrect.',
            ], 401);
        }

        $token = $user->createToken($user->email.'Auth-Token')->plainTextToken;

        return response()->json([
            'message' => 'Login Successful',
            'token_type' => 'Bearer',
            'token' => $token,
        ], 200);
    }


    public function register (Request $request) : JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|confirmed|string|min:8|max:255',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($user)
        {
            $token = $user->createToken($user->email.'_Auth-Token')->plainTextToken;

            return response()->json([
                'message' => 'Registration Successful',
                'token_type' => 'Bearer',
                'token' => $token,
            ], 201);
        }
        else
        {
            return response()->json([
                'message' => 'Something went wrong! While registration. ',
            ], 500);
        }
    }

    public function logout(Request $request): JsonResponse
    {
        // Ensure the request is authenticated
        if ($request->user()) {
            // Delete all tokens for the authenticated user
            $request->user()->tokens()->delete();

            return response()->json([
                'message' => 'Logout Successful',
            ], 200);
        }

        return response()->json([
            'message' => 'Not Authenticated',
        ], 401);
    }

    public function profile (Request $request) : JsonResponse
    {
        if($request->user())
        {
            return response()->json([
                'message' => 'Profile Fetched',
                'data' => $request->user(),
            ], 200);
        }
        else
        {
            return response()->json([
                'message' => 'Not Authenticated',
            ], 401);
        }
    }
}
