<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only('logout');
    }
    public function authenticate(Request $request)
    {
        //Validating and filtering email and password.
        $credentials = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ])->validate();

        //Check Credentials
        if (!Auth::attempt($credentials)) {
            return response()->json(["Invalid Credentials"], 401);
        }
        //After credential check passed, get the user with the email
        $user = User::where('email', $request['email'])->firstOrFail();
        //Create API token
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['token' => $token]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
            "message" => "Logout Successfull: Tokens Revoked"
        ], 200);
    }
}
