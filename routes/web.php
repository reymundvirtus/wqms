<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Profile;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\Calendar;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\Icons;
use App\Http\Controllers\Forms;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\TemperatureController;

//? authorize pages
Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/home', [Dashboard::class, 'index'])->name('dashboard');
Route::get('/profile', [Profile::class, 'index'])->name('profile');
Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics');
Route::get('/reset-password', [ResetPassword::class, 'index'])->name('reset-password');
Route::get('/tables', [Tables::class, 'index'])->name('tables');
Route::get('/icons', [Icons::class, 'index'])->name('icons');
Route::get('/forms', [Forms::class, 'index'])->name('forms');

//? for getting the users drom database
Route::get('/users', [Dashboard::class, 'retrieve_data']); //? for retrieve data to render in profile.blade.php
Route::post('/update_data', [Dashboard::class, 'update_data']); //? for updating data
Route::post('/delete_data', [Dashboard::class, 'delete_data']); //? for deleting data

//? for calendar feature
Route::get('/calendar', [ReminderController::class, 'index'])->name('calendar');
Route::post('/calendar', [ReminderController::class, 'store']);
Route::patch('/calendar/update/{id}', [ReminderController::class, 'update']); //? this will update in calendar itself
Route::delete('/calendar/delete/{id}', [ReminderController::class, 'delete']); //? this will delete in calendar itself
// Route::post('/update_reminder', [ReminderController::class, 'update_reminder']);
Route::post('/delete_reminder', [ReminderController::class, 'delete_reminder']);

//? for reminders data
Route::get('/reminders', [ReminderController::class, 'get_reminders']);

//? Login And register page
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']); //? login the user
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']); //? Storing new users in database

//? for logout
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

//? getting the temperatures
Route::get('/tempc', [TemperatureController::class, 'get_tempc']);
Route::get('/temppH', [TemperatureController::class, 'get_temppH']);