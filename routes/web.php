<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\PagesController;

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

Route::get('/', [PagesController::class, 'index']);
Route::get('/speakers', [PagesController::class, 'speakers']);
Route::get('/sponsors', [PagesController::class, 'sponsors']);
Route::get('/faq', [PagesController::class, 'faq']);
Route::get('/about', [PagesController::class, 'about']);



// Route::get('/', function () {
//   return view('index');
// });

// Route::get('/speakers', function () {
//   return view('speakers');
// });

// Route::get('/sponsors', function () {
//   return view('sponsors');
// });

// Route::get('/faq', function () {
//   return view('faq');
// });

// Route::get('/about', function () {
//   return view('about');
// });
