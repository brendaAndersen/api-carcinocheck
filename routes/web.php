<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::post('/login', function (\Illuminate\Http\Request $request) {
//     $credentials = $request->validate([
//         'email' => 'required|email',
//         'password' => 'required',
//     ]);

//     if (!auth()->attempt($credentials)) {
//         return response()->json(['message' => 'Unauthorized'], 401);
//     }

//     $user = auth()->user();
//     $token = $user->createToken('api-token')->plainTextToken;

//     return response()->json(['token' => $token]);
// });