<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('user', [UserController::class, 'getUser']);
Route::post('login', [AuthController::class, 'login']);

Route::get('/', function(){
    return response()->json([
        'status' => false,
        'message' => 'user unauthorized'
    ]);
})->name('login');
