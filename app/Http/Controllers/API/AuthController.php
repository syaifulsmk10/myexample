<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Ada kesalahan',
                'success' => false,
                'data' => $validator->errors(),
            ]);
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);

        $success['name'] = $user->name;

        return response()->json([
            'success' => true,
            'message' => 'Sukses register',
            'data' => $success,
        ]);
    }



 public function login(Request $request)
{
   if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
             $token = $user->createToken('authToken')->plainTextToken;

              return response()->json([
            'status' => 'success',
            'message' => 'Login successful',
            'data' => [
            'token' => $token,
            'user' => $user
            ]
        ], 200);
             
   }else{

    return response()->json([
        'status' => 'failed',
        'message' => 'Login failed'
    ], 401);


   }
}



}
