<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\HeroSlideController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\PalashApplicationController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\SystemController;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes — mirror the original Next.js /api endpoints
|--------------------------------------------------------------------------
*/

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('me', [AuthController::class, 'me'])->middleware('api.auth');
});

Route::get('blogs', [BlogController::class, 'index']);
Route::post('blogs', [BlogController::class, 'store']);
Route::put('blogs', [BlogController::class, 'update']);
Route::delete('blogs', [BlogController::class, 'destroy']);

Route::get('projects', [ProjectController::class, 'index']);
Route::post('projects', [ProjectController::class, 'store']);
Route::put('projects', [ProjectController::class, 'update']);
Route::delete('projects', [ProjectController::class, 'destroy']);

Route::get('services', [ServiceController::class, 'index']);
Route::post('services', [ServiceController::class, 'store']);
Route::put('services', [ServiceController::class, 'update']);
Route::delete('services', [ServiceController::class, 'destroy']);

Route::get('team', [TeamController::class, 'index']);
Route::post('team', [TeamController::class, 'store']);
Route::put('team', [TeamController::class, 'update']);
Route::delete('team', [TeamController::class, 'destroy']);

Route::get('users', [UserController::class, 'index']);
Route::post('users', [UserController::class, 'store']);
Route::put('users', [UserController::class, 'update']);
Route::delete('users', [UserController::class, 'destroy']);

Route::get('hero-slides', [HeroSlideController::class, 'index']);
Route::post('hero-slides', [HeroSlideController::class, 'store']);
Route::put('hero-slides', [HeroSlideController::class, 'update']);
Route::delete('hero-slides', [HeroSlideController::class, 'destroy']);

Route::get('settings', [SettingController::class, 'index']);
Route::post('settings', [SettingController::class, 'store']);

Route::get('contact', [ContactController::class, 'index']);
Route::post('contact', [ContactController::class, 'store']);
Route::put('contact', [ContactController::class, 'update']);
Route::delete('contact', [ContactController::class, 'destroy']);

Route::get('reviews', [ReviewController::class, 'index']);
Route::post('reviews', [ReviewController::class, 'store']);
Route::delete('reviews', [ReviewController::class, 'destroy']);

Route::get('palash-applications', [PalashApplicationController::class, 'index']);
Route::post('palash-applications', [PalashApplicationController::class, 'store'])->name('palash.submit');
Route::put('palash-applications', [PalashApplicationController::class, 'update']);
Route::delete('palash-applications', [PalashApplicationController::class, 'destroy']);

Route::get('db', [SystemController::class, 'db']);
Route::get('env', [SystemController::class, 'env']);

Route::get('image/{id}', [ImageController::class, 'show'])->where('id', '[0-9]+');