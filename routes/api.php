<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AttendeeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use App\Models\Attendee;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('attendee/registration', [AttendeeController::class, 'registration']);

Route::post('User/login', [UserController::class, 'login']);