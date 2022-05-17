<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\PagesController;
use  App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//site pages
Route::get('/', [PagesController::class, 'index']);
Route::get('/speakers', [PagesController::class, 'speakers']);
Route::get('/sponsors', [PagesController::class, 'sponsors']);
Route::get('/faq', [PagesController::class, 'faq']);
Route::get('/about', [PagesController::class, 'about']);


//attendee conference registration
Route::post('/register', [AttendeeController::class, 'registration']);



//administrator login
Route::get('/login', [UserController::class, 'login']);
