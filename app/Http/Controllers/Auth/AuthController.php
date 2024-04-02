<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {   
        $data = $request->validated();

        $user = User::create($data);

        return response()->json([
            "status" => "success",
            'message' => 'User Registered Successfully',
            'user' => $user
        ]);
    }

    public function login(){
        $data = request()->validate([
            'email' => ['required','email'],
            'password' => ['required']	
        ]);

        $is_correct = Auth::attempt($data);

        if($is_correct){
            $user = Auth::user();
            return response()->json([
                "status" => "success",
                'message' => 'User Logged In Successfully',
                'user' => $user
            ]);
        }

        return response()->json([
            'message' => 'User Login Failed'
        ], 401);
    }
}
