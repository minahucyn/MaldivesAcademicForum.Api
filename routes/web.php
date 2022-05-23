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



//administrator
Route::get('/login', [UserController::class, 'login']);
Route::get('/admin/dashboard', [DashboardController::class, 'index']);
Route::get('/admin/attendees', [AttendeesController::class, 'index']);
Route::get('/admin/conferences', [ConferencesController::class, 'index']);
Route::get('/admin/registrations', [RegistrationsController::class, 'index']);


Route::get('/admin/topics', [TopicsController::class, 'index']);
Route::get('/admin/users', [UsersController::class, 'index']);


//education levels
Route::get('/admin/education-levels', [EducationLevelsController::class, 'index']);
Route::get('/admin/education-levels/create', [EducationLevelsController::class, 'create']);
Route::get('/admin/education-levels/edit/{id}', [EducationLevelsController::class, 'edit']);
Route::post('/admin/education-levels/store', [EducationLevelsController::class, 'store']);
Route::patch('/admin/education-levels/update/{id}', [EducationLevelsController::class, 'update']);
Route::delete('/admin/education-levels/destroy/{id}', [EducationLevelsController::class, 'destroy']);

//faqs
Route::get('/admin/faqs', [FaqController::class, 'index']);
Route::get('/admin/faqs/create', [FaqController::class, 'create']);
Route::get('/admin/faqs/edit/{id}', [FaqController::class, 'edit']);
Route::post('/admin/faqs/store', [FaqController::class, 'store']);
Route::patch('/admin/faqs/update/{id}', [FaqController::class, 'update']);
Route::delete('/admin/faqs/destroy/{id}', [FaqController::class, 'destroy']);

//speakers
Route::get('/admin/speakers', [SpeakersController::class, 'index']);
Route::get('/admin/speakers/create', [SpeakersController::class, 'create']);
Route::get('/admin/speakers/edit/{id}', [SpeakersController::class, 'edit']);
Route::post('/admin/speakers/store', [SpeakersController::class, 'store']);
Route::patch('/admin/speakers/update/{id}', [SpeakersController::class, 'update']);
Route::delete('/admin/speakers/destroy/{id}', [SpeakersController::class, 'destroy']);

//sponsors
Route::get('/admin/sponsors', [SponsorsController::class, 'index']);
Route::get('/admin/sponsors/create', [SponsorsController::class, 'create']);
Route::get('/admin/sponsors/edit/{id}', [SponsorsController::class, 'edit']);
Route::post('/admin/sponsors/store', [SponsorsController::class, 'store']);
Route::patch('/admin/sponsors/update/{id}', [SponsorsController::class, 'update']);
Route::delete('/admin/sponsors/destroy/{id}', [SponsorsController::class, 'destroy']);
