<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserAuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'api_token' => Str::random(64),
            ]);
            return response()->json([
                'status' => 'User Register',
                'token' => $user->createToken('user')->plainTextToken, // FOR Sanctum
                'user' => $user
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'falid',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6'
        ]);
        if ($user = User::firstWhere('email', $request->email)) {
            if (Hash::check($request->password, $user->password)) {
                $user->update(['api_token' => Str::random(64)]);
                return response()->json([
                    'status' => 'loged',
                    'token' => $user->createToken('user')->plainTextToken, // FOR Sanctum
                    'user_token' =>  $user->api_token
                ]);
            }
        }
        return response()->json([
            'status' => 'falid',
            'message' => 'email or password not valid'
        ], 500);
    }
}
