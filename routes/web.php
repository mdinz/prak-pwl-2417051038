<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;


Route::get('/profile/{nama}/{npm}/{kelas}', [ProfileController::class, 'profile']);