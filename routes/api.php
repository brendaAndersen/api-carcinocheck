<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;

Route::post('/login', [DoctorController::class, 'login'])
->middleware('guest')
->name('login');

Route::post('/register', [DoctorController::class, 'register'])
->middleware('guest')
->name('register');

Route::post("/forgot-password", [DoctorController::class, "forgotPassword"])
->middleware('guest')
->name('login');

Route::middleware('auth:sanctum')->get('/doctors', [DoctorController::class, 'index']);