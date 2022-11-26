<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('front_logout', [AuthController::class, 'front_logout'])->name('front_logout');  
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register_submit', [AuthController::class, 'register_submit'])->name('register_submit');
Route::post('login_submit', [AuthController::class, 'login_submit'])->name('login_submit');

Route::group(['middleware'=>['auth']],function () {
    Route::get('event_list', [EventController::class, 'index'])->name('event_list');
    Route::get('/event_detail/{event_id}', [EventController::class, 'event_detail'])->name('event_detail'); 

    Route::get('/event_create', [EventController::class, 'event_create'])->name('event_create'); 
    Route::get('/event_edit/{event_id}', [EventController::class, 'event_edit'])->name('event_edit'); 
    Route::post('/event_save', [EventController::class, 'event_save'])->name('event_save'); 
    Route::post('/event_update/{event_id}', [EventController::class, 'update'])->name('event_update'); 

    Route::get('/event_delete/{event_id}', [EventController::class, 'event_delete'])->name('event_delete'); 
    Route::get('event_call_data', [EventController::class, 'call_data']); 

});


