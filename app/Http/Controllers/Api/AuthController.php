<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Otp;
use App\Models\User;
use App\Models\Child;
use Carbon\Carbon;
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
            return response()->json(["message" => "Invalid Credentials"], 401);
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

    public function generateOtp(Request $request)
    {
        $phone_no = Validator::make($request->all(), [
            'phone_no' => 'required',
        ])->validate()['phone_no'];

        if (Child::where('father_phn', $phone_no)->orWhere('mother_phn', $phone_no)->first() == null) {
            return response()->json(["message" => "No registration under this phone number found."], 401);
        }

        $otp = random_int(1000, 9999);

        //Delete all the other previous otps for the number
        Otp::where('phone_no', $phone_no)->delete();

        $otp = Otp::create([
            'phone_no' => $phone_no,
            'otp' => $otp,
        ]);


        error_log($otp);

        return response()->json([
            "message" => "Otp is sent to your number. Expires in 1 minute.",
        ], 201);
    }


    public function loginChild(Request $request)
    {
        $credentials = Validator::make($request->all(), [
            'phone_no' => 'required',
            'otp' => 'required',
        ])->validate();

        $otp = Otp::where('phone_no', $credentials['phone_no'])->where('otp', $credentials['otp'])->first();

        if ($otp == null) {
            return response()->json(["message" => "Invalid Credentials"], 401);
        }

        if (Carbon::now()->subMinute()->gt($otp->created_at)) {
            $otp->delete();
            return response()->json(["message" => "Invalid Credentials"], 401);
        }

        $otp->delete();

        return Child::where('father_phn', $credentials['phone_no'])->orWhere('mother_phn', $credentials['phone_no'])->get();
    }
}
