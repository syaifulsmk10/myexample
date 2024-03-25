<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::get('', function () {
//     return "hello word";
// });
Route::middleware('auth:sanctum')->get('user', [UserController::class, 'getUser']);
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);


// Route::post('/register', function (Request $request) {
    

//     // $validator = Validator::make(
//     //     $request->only('email', 'password'),
//     //     [
//     //         'email' => ['required', 'email'],
//     //         'password' => ['required', 'string'],
//     //     ]
//     // );

//     // if ($validator->fails()) return response()->json($validator->errors()->getMessageBag()->all());

//     // $user = User::create(...$request->all());

//     // return response()->json(['message' => 'User success'], 201);
    
// });


Route::get('/', function(){
    return response()->json([
        'status' => false,
        'message' => 'user unauthorized'
    ]);
})->name('login');
