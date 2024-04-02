<?php

namespace App\Http\Controllers;

use App\Mail\ForgetPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Forgotpassword extends Controller
{
    public function forgot(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json([
                'status' => 404,
                'message' => 'User not found',
            ], 404);
        }

        // Generate a random 6-digit number
        $otp = rand(100000, 999999);

        $user->push('otps', [
            'otp' => $otp,
            'created_at' => now(),
        ]);

        // Send the OTP to the user's email
        Mail::to($request->email)->send(new ForgetPasswordMail([
            'name' => "$user->first_name $user->last_name",
            'otp' => $otp
        ]));

        return response()->json([
            'status' => "success",
            'message' => 'OTP sent successfully',
        ]);
    }

    public function otpVerify(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json([
                'status' => 404,
                'message' => 'User not found',
            ], 404);
        }

        $otps = collect($user->otps)->map(function ($item) {
            return $item["otp"];
        })->toArray();


        // check if $request->otp in $user->otps array using php 
        if  (in_array($request->otp, $otps)) {
            $user->update([
                'otps' => [],
            ]);
            return response()->json([
                'status' => "success",
                'message' => 'OTP verified successfully',
            ]);
        } else {
            return response()->json([
                'status' => "error",
                'message' => 'Invalid OTP',
            ], 404);
        }
    }

    public function changePassword(Request $request){
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json([
                'status' => 404,
                'message' => 'User not found',
            ], 404);
        }

        $data = request()->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]); 

        $user->update([
            'password' => $data['password'],
        ]);

        return response()->json([
            'status' => "success",
            'message' => 'Password changed successfully',
        ]);

    }
}


