<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroSliderController;
use App\Http\Controllers\Admin\PalashApplicationController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Site\AuthController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Site Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [SiteController::class, 'home']);
Route::get('/about', [SiteController::class, 'about']);
Route::get('/services', [SiteController::class, 'services']);
Route::get('/services/{slug}', [SiteController::class, 'service']);
Route::get('/projects', [SiteController::class, 'projects']);
Route::get('/projects/{slug}', [SiteController::class, 'project']);
Route::get('/blogs', [SiteController::class, 'blogs']);
Route::get('/blogs/{slug}', [SiteController::class, 'blog']);
Route::get('/contact', [SiteController::class, 'contact']);
Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'store'])->name('contact.submit');
Route::get('/solutions/{type}', [SiteController::class, 'solution'])->where('type', 'capex|opex|bot|comparison');
Route::get('/palash-charging-station', [SiteController::class, 'palash']);

Route::post('/reviews', [\App\Http\Controllers\ReviewController::class, 'store'])->name('reviews.store');

/*
|--------------------------------------------------------------------------
| Admin Session Auth
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Admin Panel
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('services', ServiceController::class)->names('admin.services');
    Route::resource('projects', ProjectController::class)->names('admin.projects');
    Route::resource('team', TeamController::class)->names('admin.team');
    Route::resource('blogs', BlogController::class)->names('admin.blogs');
    Route::resource('hero-slider', HeroSliderController::class)->names('admin.hero-slider');

    Route::resource('contact', ContactController::class)->only(['index', 'edit', 'update', 'destroy'])->names('admin.contact');
    Route::resource('palash-applications', PalashApplicationController::class)->only(['index', 'edit', 'update', 'destroy'])->names('admin.palash-applications');
    Route::resource('reviews', ReviewController::class)->only(['index', 'edit', 'update', 'destroy'])->names('admin.reviews');
    Route::resource('users', UserController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])->names('admin.users');

    Route::get('settings', [SettingController::class, 'edit'])->name('admin.settings.edit');
    Route::post('settings', [SettingController::class, 'update'])->name('admin.settings.update');
});