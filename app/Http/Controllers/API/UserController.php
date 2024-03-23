<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
     public function getUser(Request $request)
    {
        $user = Auth::user();
        if(!$user) {
            return response()->json([
                'status' => 'perlu token'
            ]);
        }
        return response()->json([
            'status' => 'success',
            'data' => $user,
        ]);
    }
}
