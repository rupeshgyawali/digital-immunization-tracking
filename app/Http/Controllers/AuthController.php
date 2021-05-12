<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only('logout');
    }
    public function authenticate(Request $request)
    {
        //Check Credentials
        if (!Auth::attempt($request->only(['email', 'password']))) {
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
        return response()->json(["Logout Successfull"]);
    }
}
