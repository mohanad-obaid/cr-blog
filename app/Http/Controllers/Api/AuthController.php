<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $field=$request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        $user=User::create([
            'name' => $field['name'],
            'email' => $field['email'],
            'password' => Hash::make($field['password']),
        ]);
        $token=$user->createToken('api-token')->plainTextToken;
        $response=[
            'user'=>$user,
            'token'=>$token
        ];
        return response($response,201);
    }
    /**
     * Handle a login request.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token = $user->createToken('api-token')->plainTextToken;
            return response(['token' => $token], 200);
        }
    
        return response(['message' => 'The provided credentials are incorrect.'], 401);
    }

    /**
     * Log the user out of the application (invalidate the bearer token).
     */
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
