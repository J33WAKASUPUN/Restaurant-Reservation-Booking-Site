<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ContactMessageController;

// Authentication Routes
Route::get('/signin', [AuthController::class, 'showSignIn'])->name('signin');
Route::get('/signup', [AuthController::class, 'showSignUp'])->name('signup');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Home Page Route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Reservation Routes
Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');

// Contact Message Routes
Route::post('/contact-messages', [ContactMessageController::class, 'store'])->name('contact-messages.store');
