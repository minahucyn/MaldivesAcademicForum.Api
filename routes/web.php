<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\PagesController;
use  App\Http\Controllers\UserController;
use  App\Http\Controllers\AttendeeController;


use  App\Http\Controllers\Administration\DashboardController;
use  App\Http\Controllers\Administration\EducationLevelsController;
use  App\Http\Controllers\Administration\ConferencesController;
use  App\Http\Controllers\Administration\FaqController;
use  App\Http\Controllers\Administration\RegistrationsController;
use  App\Http\Controllers\Administration\AttendeesController;
use  App\Http\Controllers\Administration\SpeakersController;
use  App\Http\Controllers\Administration\SponsorsController;
use  App\Http\Controllers\Administration\TopicsController;
use  App\Http\Controllers\Administration\UsersController;

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
Route::get('/admin/dashboard', [DashboardController::class, 'index']);
Route::get('/admin/education-levels', [EducationLevelsController::class, 'index']);
Route::get('/admin/attendees', [AttendeesController::class, 'index']);
Route::get('/admin/conferences', [ConferencesController::class, 'index']);
Route::get('/admin/faq', [FaqController::class, 'index']);
Route::get('/admin/registrations', [RegistrationsController::class, 'index']);
Route::get('/admin/speakers', [SpeakersController::class, 'index']);
Route::get('/admin/sponsors', [SponsorsController::class, 'index']);
Route::get('/admin/topics', [TopicsController::class, 'index']);
Route::get('/admin/users', [UsersController::class, 'index']);
